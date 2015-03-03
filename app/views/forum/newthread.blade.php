@extends('layouts.master')

@section('head')
	@parent
	<title>Nova tema</title>
@stop

@section('content')
	<h1>Nova tema</h1>

	<form action="{{ URL::route('forum-store-thread', $id) }}" method="post">
		<div class="form-group">
			<label for="title">Naslov: </label>
			<input type="text" class="form-control" name="title" id="title">
		</div>

		<div class="form-group">
			<label for="body">Opis: </label>
			<textarea class="form-control" name="body" id="body"></textarea>
		</div>
		{{ Form::token() }}
		<div class="form-group">
			<input type="submit" value="Sačuvaj temu" class="btn btn-primary">
		</div>
	</form>

@stop