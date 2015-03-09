@extends('layouts.master')

@sdection('head')
	@parent
	<title>Register Page</title>
@stop

@section('content')
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
				<label for="pass1"> Korisnička šifra: </lable>
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
    <div class="container">
        <div class="sentence">
            <h1><span>Y</span><span>a</span><span>y</span><span>!</span><span> </span><span>J</span><span>e</span><span>l</span><span>l</span><span>y</span><span> </span><span>t</span><span>e</span><span>x</span><span>t</span>
            </h1>
            <h2><span>m</span><span>o</span><span>v</span><span>e</span><span> </span><span>y</span><span>o</span><span>u</span><span>r</span><span> </span><span>m</span><span>o</span><span>u</span><span>s</span><span>e</span><span> </span><span>a</span><span>r</span><span>o</span><span>u</span><span>n</span><span>d</span>
            </h2>
        </div>
    </div>

@stop
