@extends('layouts.master')

@section('head')
	@parent
	<title>Forum | {{ $category->title }}</title>

@stop

@section('content')

<ol class="breadcrumb">
	<li><a href="{{ URL::route('forum-home') }}">Forum</a></li>
	<li class="active">{{ $category->title }}</li>
    <ul class="badge"> Broj tema: {{ $category->threads->count() }}</ul>
</ol>

@if(Auth::check())
	<a href="{{ URL::route('forum-get-new-thread', $category->id) }}" data-text="Dodaj temu" class="button-hover">Dodaj temu</a>

@endif
    </br>
    </br>
    </br>
<div class="panel panel-primary">
	<div class="panel-heading">
		@if(Auth::check() && Auth::user()->isAdmin())
		<div class="clearfix">
			<h3 class="panel-title pull-left">{{ $category->title }} </h3>
			<a id="{{ $category->id }}"  data-toggle="modal" data-target="#category_delete" class="btn btn-danger btn-xs pull-right delete_category">Obriši</a>
		</div>
		@else
		<div class="clearfix">
			<h3 class="panel-title pull-left">{{ $category->title }}</h3>
            <span class="glyphicons glyphicons-pencil"></span>
		</div>
		@endif
	</div>
	<div class="panel-body panel-list-group">

		<div class="list-group">
			@foreach($threads as $thread)
                <a href="{{ URL::route('forum-thread', $thread->id) }}" class="list-group-item">{{ $thread->title }}</a>
			@endforeach

		</div>
	</div>
</div>

@if(Auth::check() && Auth::user()->isAdmin())
<div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-dissen="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Obriši kategoriju</h4>
			</div>
			<div class="modal-body">
				<h3>Da li ste sigurni da želite da obrišete ovu kategoriju?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Otkaži</button>
                <a href="{{ URL::route('forum-delete-category', $category->id)}}" type="button" class="btn btn-primary" id="btn_delete_category">Obriši</a>
			</div>

		</div>
	</div>
</div>
@endif

@stop

@section('javascript')
	@parent
	<script type="text/javascript" src="/js/app.js"></script>
@stop


