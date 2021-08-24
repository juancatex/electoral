<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title> Sistema Electoral </title> 
    <link rel="apple-touch-icon" sizes="76x76" href="img/icon.png">
    <link rel="icon" type="image/png" href="img/icon.png"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ asset('css/plantillas.css') }}" rel="stylesheet"> 
    <style>
.float{
	position:fixed;
	/* width:60px; 
      font-size:30px;
	height:60px;*/
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center; 
	box-shadow: 2px 2px 3px #999;
  z-index:100;
  padding: 12px;
}
.float:hover {
	text-decoration: none;
	color: #25d366;
  background-color:#fff;
}
 
</style>
</head>
<body class="off-canvas-sidebar">
    <div id="app">
        <div class="wrapper wrapper-full-page">
            <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('img/login.jpg'); background-size: cover; background-position: top center;">
                  @yield('content') 
                <footer class="footer">
                    <div class="container"> 
                    <div class="copyright ">
                        &copy; 2021, Copyright: Sargento x y Sargento y.
                    </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>  
   
        <a href="{{ url('/dowapp') }}" class="float" target="_blank">
        <i class="fa fa-cloud-download "></i> Descarga nuestra aplicación
        </a>
  
    <script src="{{ asset('js/applogin.js') }}" ></script>
    <script src="{{ asset('js/login.js') }}"></script>   
</body>
</html>
