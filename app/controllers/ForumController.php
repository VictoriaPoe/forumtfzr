<?php

class ForumController extends BaseController
{
	public function index()
	{
		$groups = ForumGroup::all();
		$categories = ForumCategory::all();

		return View::make('forum.index')->with('groups', $groups)->with('categories', $categories);
	}

	public function category($id)
	{
		$category = ForumCategory::find($id);
		if ($category == null)
		{
			return Redirect::route('forum-home')->with('fail', "Izabrana kategorija ne postoji.");
		}
		$threads = $category->threads()->get();

		return View::make('forum.category')->with('category', $category)->with('threads', $threads);
	}

	public function thread($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
		{
			return Redirect::route('forum-home')->with('fail', "Izabrana tema ne postoji.");
		}
		$author = $thread->author()->first()->username;

		return View::make('forum.thread')->with('thread', $thread)->with('author', $author);
	}

	public function storeGroup()
	{
		$validator = Validator::make(Input::all(), array(
			'group_name' => 'required|unique:forum_groups,title'
		));
		if ($validator->fails())
		{
			return Redirect::route('forum-home')->withInput()->withErrors($validator)->with('modal', '#group_form');
		}
		else
		{
			$group = new ForumGroup;
			$group->title = Input::get('group_name');
			$group->author_id = Auth::user()->id;

			if($group->save())
			{
				return Redirect::route('forum-home')->with('success', 'Grupa tema je kreirana.');
			}
			else
			{
				return Redirect::route('forum-home')->with('fail', 'Greška u kreiranju grupe tema.');
			}
		}
	}

	public function deleteGroup($id)
	{
		$group = ForumGroup::find($id);
		if($group == null)
		{
			return Redirect::route('forum-home')->with('fail', 'Odabrana grupa tema ne postoji.');
		}

		$categories = $group->categories();
		$threads = $group->threads();
		$comments = $group->comments();

		$delCa = true;
		$delT = true;
		$delCo = true;

		if($categories->count() > 0)
		{
			$delCa = $categories->delete();
		}
		if($threads->count() > 0)
		{
			$delT = $threads->delete();
		}
		if($comments->count() > 0)
		{
			$delCo = $comments->delete();
		}


		if ($delCa && $delT && $delCo && $group->delete())
		{
			return Redirect::route('forum-home')->with('success', 'Grupa tema je obrisana.');
		}
		else
		{
			return Redirect::route('forum-home')->with('fail', 'Greška u brisanju grupa tema.');
		}
	}

	public function deleteCategory($id)
	{
		$category = ForumCategory::find($id);
		if($category == null)
		{
			return Redirect::route('forum-home')->with('fail', 'Odabrana kategorija ne postoji.');
		}

		$threads = $category->threads();
		$comments = $category->comments();

		$delT = true;
		$delCo = true;

		if($threads->count() > 0)
		{
			$delT = $threads->delete();
		}
		if($comments->count() > 0)
		{
			$delCo = $comments->delete();
		}


		if ($delT && $delCo && $category->delete())
		{
			return Redirect::route('forum-home')->with('success', 'Kategorija je obrisana.');
		}
		else
		{
			return Redirect::route('forum-home')->with('fail', 'Greška u brisanju kategorije.');
		}
	}

	public function storeCategory($id)
	{
		$validator = Validator::make(Input::all(), array(
			'category_name' => 'required|unique:forum_categories,title'
		));
		if ($validator->fails())
		{
			return Redirect::route('forum-home')->withInput()->withErrors($validator)->with('category-modal', '#category_modal')->with('group-id', $id);
		}
		else
		{
			$group = ForumGroup::find($id);
			if ($group == null)
			{
				return Redirect::route('forum-home')->with('fail', "Odabrana grupa tema ne postoji.");
			}

			$category = new ForumCategory;
			$category->title = Input::get('category_name');
			$category->author_id = Auth::user()->id;
			$category->group_id = $id;

			if($category->save())
			{
				return Redirect::route('forum-home')->with('success', 'Uspešno ste kreirali kategoriju.');
			}
			else
			{
				return Redirect::route('forum-home')->with('fail', 'Greška u kreiranju nove kategorije.');
			}
		}
	}

	public function newThread($id)
	{
		return View::make('forum.newthread')->with('id', $id);
	}

	public function storeThread($id)
	{
		$category = ForumCategory::find($id);
		if ($category == null)
			Redirect::route('forum-get-new-thread')->with('fail', "Postavili ste neispravnu kategoriju.");

		$validator = Validator::make(Input::all(), array(
			'title' => 'required|min:3|max:255',
			'body'  => 'required|min:10|max:65000'
		));

		if ($validator->fails())
		{
			return Redirect::route('forum-get-new-thread', $id)->withInput()->withErrors($validator)->with('fail', "Vaš unos nije odgovarajući.");
		}
		else
		{
			$thread = new ForumThread;
			$thread->title = Input::get('title');
			$thread->body = Input::get('body');
			$thread->category_id = $id;
			$thread->group_id = $category->group_id;
			$thread->author_id = Auth::user()->id;

			if ($thread->save())
			{
				return Redirect::route('forum-thread', $thread->id)->with('success', "Vaša tema je sačuvana.");
			}
			else
			{
				return Redirect::route('forum-get-new-thread', $id)->with('fail', "Greška u kreiranju teme.")->withInput();
			}
		}
	}

	public function deleteThread($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
			return Redirect::route('forum-home')->with('fail', "Odabrana tema ne postoji.");

		$category_id = $thread->category_id;
		$comments = $thread->comments;
		if ($comments->count() > 0)
		{
			if ($comments->delete() && $thread->delete())
				return Redirect::route('forum-category', $category_id)->with('success', "Tema je obrisana.");
			else
				return Redirect::route('forum-category', $category_id)->with('fail', "Greška u brisanju teme.");
		}
		else
		{
			if ($thread->delete())
				return Redirect::route('forum-category', $category_id)->with('success', "Tema je obrisana.");
			else
				return Redirect::route('forum-category', $category_id)->with('fail', "Greška u brisanju teme.");
		}
	}

	public function storeComment($id)
	{
		$thread = ForumThread::find($id);
		if ($thread == null)
			Redirect::route('forum')->with('fail', "Odabrana tema ne postoji.");

		$validator = Validator::make(Input::all(), array(
			'body' => 'required|min:3'
		));

		if ($validator->fails())
			return Redirect::route('forum-thread', $id)->withInput()->withErrors($validator)->with('fail', "Molimo Vas da popunite formu ispravno.");
		else
		{
			$comment = new ForumComment();
			$comment->body = Input::get('body');
			$comment->author_id = Auth::user()->id;
			$comment->thread_id = $id;
			$comment->category_id = $thread->category->id;
			$comment->group_id = $thread->group->id;

			if ($comment->save())
				return Redirect::route('forum-thread', $id)->with('success', "Komentar je sačuvan.");
			else
				return Redirect::route('forum-thread', $id)->with('fail', "Greška u kreiranju komentara.");
		}
	}

	public function deleteComment($id)
	{
		$comment = ForumComment::find($id);
		if ($comment == null)
			return Redirect::route('forum')->with('fail', "Odabrani komentar ne postoji.");

		$threadid = $comment->thread->id;
		if ($comment->delete())
			return Redirect::route('forum-thread', $threadid)->with('success', "Komentar je obrisan.");
		else
			return Redirect::route('forum-thread', $threadid)->with('fail', "Greška u brisanju komentara.");
	}


}
