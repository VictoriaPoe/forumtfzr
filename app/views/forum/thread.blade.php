@extends('layouts.master')
@extends('forum.pagination')
@section('head')
	@parent
	<title>Forum | {{ $thread->title }}</title>
@stop


@section('content')
	<div class="clearfix">
		<ol class="breadcrumb pull-left">
			<li><a href="{{ URL::route('forum-home') }}">Forum</a></li>
			<li><a href="{{ URL::route('forum-category', $thread->category_id) }}">{{ $thread->category->title }}</a></li>
			<li class="active">{{ $thread->title }}</li>
            <ul class="badge"> Broj komentara: {{ $thread->comments->count() }}</ul>
		</ol>

		@if(Auth::check() && Auth::user()->isAdmin())
			<a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger pull-right">Obriši</a>
		@endif
	</div>
    </br>

    <div class="post">
        <div class="desc by">
		<h1>{{ $thread->title }}</h1>
		<h4>Od: {{ $author }} datum: {{ $thread->created_at }}</h4>
		<hr>
		<p>{{ nl2br(BBCode::parse($thread->body)) }}</p>
        </div>
        </div>
    </br>

	@foreach ($thread->comments()->get() as $comment)
        <div class="post">
        <div class ="desc">
			<h4>Od: {{ $comment->author->username }} datum: {{ $comment->created_at }}</h4>
			<hr>
			<p>{{ nl2br(BBCode::parse($comment->body)) }}</p>

			@if (Auth::check() && Auth::user()->isAdmin())
				<a href="{{ URL::route('forum-delete-comment', $comment->id) }}" class="btn btn-danger">Obriši komentar</a>
			@endif
		</div>
</div>
        </br>
	@endforeach

    <div class="post">
	@if(Auth::check())
		<form action="{{ URL::route('forum-store-comment', $thread->id) }}" method="post">
			<div class="desc">
				<label for="body">Dodaj komentar </label>
				<textarea class="form-control" name="body" id="body"></textarea>
			</div>
			{{ Form::token() }}

            </br>
				<input type="submit" value="Sačuvaj komentar" class="btn-primary">
            </form>
</div>

@endif

@stop
