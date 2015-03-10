@extends('layouts.master')

@sdection('head')
	@parent
	<title>Registracija</title>
@stop

@section('content')

    </br>
    </br>

    <div id="login">
	<div class="frames-container">
		<h1>Registracija</h1>

		<form role="form" method="post" action="{{ URL::route('postCreate') }}">
			<div class="form-group {{ ($errors->has('username')) ? ' has-error' : '' }}">
				<label for="username"> Korisničko ime: </label>
					<input id="username" name="username" type="text" class="form-control">
					@if($errors->has('username'))
						{{ $errors->first('username') }}
					@endif
			</div>

            <div class="form-group {{ ($errors->has('email')) ? ' has-error' : '' }}">
                <label for="email">E-mail: </label>
                <input id="email" name="email" type="text" class="form-control">
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>

			<div class="form-group {{ ($errors->has('pass1')) ? ' has-error' : '' }}">
				<label for="pass1">Korisnička šifra: </label>
					<input id="pass1" name="pass1" type="password" class="form-control">
					@if($errors->has('pass1'))
						{{ $errors->first('pass1') }}
					@endif
			</div>
			<div class="form-group {{ ($errors->has('pass2')) ? ' has-error' : '' }}">
				<label for="pass2">Potvrdite šifru: </label>
					<input id="pass2" name="pass2" type="password" class="form-control">
					@if($errors->has('pass2'))
						{{ $errors->first('pass2') }}
					@endif

			</div>

			{{ Form::token() }}
			<div class="form-group">
				<input type="submit" value="Registrujte se" class="btn btn-primary ">
			</div>
        </form>
</div>
</div>

</br>
</br>
</br>
</br>
</br>

    <div class="container">
        <div class="sentence">
            <h1><span>D</span><span>o</span><span>b</span><span>r</span><span>o</span><span> </span><span>d</span><span>o</span><span>š</span><span>l</span><span>i</span><span> </span><span>n</span><span>a</span><span> </span>
            </h1>
            <h2><span>T</span><span>F</span><span>Z</span><span>R</span><span> </span><span>f</span><span>o</span><span>r</span><span>u</span><span>m</span>
            </h2>
        </div>
    </div>

@stop

