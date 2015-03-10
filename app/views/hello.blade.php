@extends('layouts.master')

@section('head')
	@parent
	<title>Forum Tehničkog fakulteta "Mihajlo Pupin"</title>

@stop

@section('content')
	@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>

    @elseif (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif



    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://www.hotel-feinschmeck.com/typo3temp/GB/d606188f0b.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="http://www.theologyinsneakers.com/wp-content/uploads/2014/05/humanity.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="http://voyages.vente-privee.com/files/2014/08/iStock_000021884214Large-1100x500.jpg" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>



    <div id="title" class="stitched ">
        <span class="connect ">Forum - Tehnički fakultet "Mihajlo Pupin"</span>
    </div>

    <!-- Example row of columns -->
    <div class="row" style = "width: 1100px; margin: 0 auto; ">
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>


    <div class="container">
        <div class="col-sm-8 col-sm-offset-2 text-center">
            <h2>Beautiful Bootstrap Templates</h2>

            <hr>
            <h4>
                We love templates. We love Bootstrap.
            </h4>
            <p>Get more free templates like this at the <a href="http://bootply.com">Bootstrap Playground</a>, Bootply.</p>
            <hr>

            <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

            <a class="social" href="https://www.facebook.com/tfMihajloPupin?fref=ts" target="_blank">
                <div class="front">
                    <i class="fa fa-facebook"></i>
                </div>
                <div class="back">
                    <i class="fa fa-facebook"></i>
                </div>
            </a>

            <a class="social social-twitter" href="#" target="_blank">
                <div class="front">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="back">
                    <i class="fa fa-twitter"></i>
                </div>
            </a>

            <a class="social social-github" href="https://github.com/VictoriaPoe/forumtfzr" target="_blank">
                <div class="front">
                    <i class="fa fa-github"></i>
                </div>
                <div class="back">
                    <i class="fa fa-github"></i>
                </div>
            </a>

            <a class="social social-googleplus" href="#" target="_blank">
                <div class="front">
                    <i class="fa fa-google-plus"></i>
                </div>
                <div class="back">
                    <i class="fa fa-google-plus"></i>
                </div>
            </a>

        </div>
    </div>


@stop

