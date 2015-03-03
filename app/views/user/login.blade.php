@extends('layouts.master')

@sdection('head')
	@parent
	<title>Register Page</title>
@stop

@section('content')
    </br>
    </br>
    </br>
    </br>

    <div id="login">
	<div class="frames-container">
		<h1>Login</h1>
		<form role="form" method="post" action="{{ URL::route('postLogin') }}">
			<div class="form-group {{ ($errors->has('username')) ? ' has-error' : '' }}">
				<label for="username"> Korisničko ime: </lable>
					<input id="username" name="username" type="text" class="form-control">
					@if($errors->has('username'))
						{{ $errors->first('username') }}
					@endif
			</div>

            <div class="form-group {{ ($errors->has('email')) ? ' has-error' : '' }}">
                <label for="email"> E-mail: </lable>
                    <input id="email" name="email" type="text" class="form-control">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                @endif
            </div>

			<div class="form-group {{ ($errors->has('pass1')) ? ' has-error' : '' }}">
				<label for="pass1"> Šifra: </lable>
					<input id="pass1" name="pass1" type="password" class="form-control">
					@if($errors->has('pass1'))
						{{ $errors->first('pass1') }}
					@endif
			</div>

			<div class="checkbox">
				<label for="remember">
					<input type="checkbox" name="remember" id="remember">
					Zapamti
				</label>
				</div>


			{{ Form::token() }}
			<div class="form-group">
				<input type="submit" value="Login" class="btn btn-primary">
			</div>
        </form>
    </div>
	</div>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>


    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

    <script src="js/app.js"></script>
@stop
