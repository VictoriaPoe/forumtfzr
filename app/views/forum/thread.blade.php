@extends('layouts.master')

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
		</ol>

		@if(Auth::check() && Auth::user()->isAdmin())
			<a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger pull-right">Obriši</a>
		@endif
	</div>

	<div class="well">
		<h1>{{ $thread->title }}</h1>
		<h4>Od: {{ $author }} on {{ $thread->created_at }}</h4>
		<hr>
		<p>{{ nl2br(BBCode::parse($thread->body)) }}</p>
	</div>

	@foreach ($thread->comments()->get() as $comment)
		<div class="well">
			<h4>Od: {{ $comment->author->username }} on {{ $comment->created_at }}</h4>
			<hr>
			<p>{{ nl2br(BBCode::parse($comment->body)) }}</p>
			@if (Auth::check() && Auth::user()->isAdmin())
				<a href="{{ URL::route('forum-delete-comment', $comment->id) }}" class="btn btn-danger">Obriši komentar</a>
			@endif
		</div>
	@endforeach

	@if(Auth::check())
		<form action="{{ URL::route('forum-store-comment', $thread->id) }}" method="post">
			<div class="form-group">
				<label for="body">: </label>
				<textarea class="form-control" name="body" id="body"></textarea>
			</div>
			{{ Form::token() }}
			<div class="form-group">
				<input type="submit" value="Sačuvaj komentar" class="btn btn-primary">
			</div>
</form>
	@endif


@stop
