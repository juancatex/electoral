<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title> Sistema Electoral </title> 
    <link rel="apple-touch-icon" sizes="76x76" href="img/icon.png">
    <link rel="icon" type="image/png" href="img/icon.png"> 
    <link href="{{ asset('css/plantillas.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/echarts.js') }}"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-firestore.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.6.7/firebase-storage.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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
    window.storage = firebase.storage(); 
    window.unsubscribe=null;
    window.notificaciones=null;
    window.unsubscribesocios=null;
    window.unsubscribevotos=null;
    window.unsubscribeinitvotos=null;
    window.intervalcount=null;
    window.fechaacumulada='00:00:00';
    window.dejar=function(){ 
        if(typeof window.unsubscribe === 'function') {  
                window.unsubscribe();
            }
        if(typeof window.unsubscribesocios === 'function') {  
                window.unsubscribesocios();
            }
        if(typeof window.unsubscribevotos === 'function') {  
                window.unsubscribevotos();
            }
        if(typeof window.notificaciones === 'function') {  
                window.notificaciones();
            }
    }
    </script>
</head>
<body>
<div id="app">
    <form id="logout-form-out" action="{{ route('logout') }}" method="POST" class="d-none">  @csrf  </form>
        <div class="wrapper ">
    <div class="sidebar" data-color="danger" style="z-index: 11;" data-background-color="black" data-image="img/sidebar-1.jpg"> 
      <div class="logo"><a  class="simple-text logo-mini">
          SE
        </a>
        <a  class="simple-text logo-normal">
          Sistema Electoral
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="img/default-avatar.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                {{ Auth::user()->papeleta }}
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav"> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form-out').submit();">
                           <span class="sidebar-mini"> CC </span>
                           <span class="sidebar-normal"> Cerrar sesion </span>
                    </a>  
                </li>
              </ul>
            </div>
            
          </div>
        </div> 
        @yield('roles') 
      </div>
    </div>


    <div class="main-panel">  
      <nav class="navbar navbar-expand-lg position-sticky navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div> 
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
          <div class="collapse navbar-collapse justify-content-end"> 
            <ul class="navbar-nav"> <strong>Usuario </strong>  :  {{ Auth::user()->user }}</ul> 
              @yield('vistanotificaciones') 
          </div>
        </div>
      </nav>  
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                @yield('contenidoMenus')
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" style="bottom: 0;
    position: absolute;
    width: 100%;bottom: 0px;
    position: fixed;
    width: 100%;
    left: 0;
    padding: 0px;
    background-color: white;
    box-shadow: 0 4px 18px 0px rgb(0 0 0 / 12%), 0 7px 10px -5px rgb(0 0 0 / 15%);z-index: 7;">
        <div class="container-fluid" style="margin-right: auto;
    margin-left: auto;"> 
          <div class="copyright float-right">
            &copy;2021, Realizado por: Sargento 1 y sargento 2
          </div>
        </div>
      </footer> 
    </div>
  </div>
    </div> 
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/dashboard.js') }}"></script> 
    <script src="{{ asset('js/chartsinput.js') }}"></script> 
   

</body>
</html>
