<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title> Sistema Electoral </title> 
    <link rel="apple-touch-icon" sizes="76x76" href="img/icon.png">
    <link rel="icon" type="image/png" href="img/icon.png"> 
    <link href="{{ asset('css/plantillas.css') }}" rel="stylesheet"> 
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-firestore.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-auth.js"></script>
  
    <script> 
    var firebaseConfig = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        projectId: "{{ config('services.firebase.project_id') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
        appId: "{{ config('services.firebase.app_id') }}"
    }; 
    firebase.initializeApp(firebaseConfig);
    window.db = firebase.firestore();  
    </script> 
</head>
<body class="off-canvas-sidebar">
    <div id="app">
        <div class="wrapper wrapper-full-page">
            <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('img/login.jpg'); background-size: cover; background-position: top center;">
                  @yield('contenidosms') 
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
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/applogin.js') }}" ></script>
    <script src="{{ asset('js/login.js') }}"></script>   
</body>
</html>
