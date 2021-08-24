@extends('layouts.applogin')

@section('content')
  
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto"> 
            <div class="card card-login text-center card-hidden">
                <div class="card-header " style="margin-bottom: 0px;">
                    <div class="card-avatar">
                        <img class="img" style="width: 40%;" src="img/icon.png">
                    </div>
                </div>
                <h3 class="card-title" style="margin: 0px;"> <span style="font-weight: 100;">Sistema Electoral</span>
                </h3>
                <h4 class="card-title" style="margin: 0px;">ASCINALSS</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;" role="alert">
                                @foreach ($errors->all() as $error)
                                <p style="margin: 0;padding: 0;">{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @if (session('status'))
                              <div class="alert alert-success" style="border-radius: 11px;border-radius: 11px;margin:15px 15px;" role="alert"> 
                                    <p style="margin: 0;padding: 0;"> {{ session('status') }}</p>
                                </div>
                            @endif

                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body ">
                        <span class="bmd-form-group">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">pin</i>
                                        </span>
                                    </div>
                                    <label for="papeleta" class="bmd-label-floating"
                                        style="margin: 17px 0 0 55px;">Numero de papeleta</label>
                                    <input type="text" class="form-control" id="papeleta" name="papeleta" required  autofocus>
                                </div>
                            </div>
                        </span>

                        <span class="bmd-form-group">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <label for="password" class="bmd-label-floating"
                                        style="margin: 17px 0 0 55px;">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                        </span>

                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit" style="    background: linear-gradient(to right,#03279e,#03a9f5,#d800b1);"
                            class="btn btn-primary btn-blue btn-round mt-4">Ingresar</button>
                    </div>
                </form>
              
                <div class="col-md-12"> 
                      <a class="btn btn-link btn-github" href="{{ url('/registro') }}">
                        <i class="material-icons">groups</i> Registrate aqui!!
                        </a>
                </div>
            </div> 
        </div> 
    </div>
</div>
@endsection
