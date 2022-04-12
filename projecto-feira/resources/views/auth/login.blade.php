@extends('layouts.login_register')
@section('title', 'Entrar')
@section('content')
<div class="login-box" >
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

  <div class="login-logo" >
    <a href="#"><img src="{{asset('assets/dist/img/logo-feira.png')}}" width="80px" height="80px"><b>A sua Feira</b> online</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Área de Acesso</p>

      <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="seu Email" name="email" :value="old('email')" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Lembrar-me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #f3ae34; border:red;">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
       
    @if (Route::has('password.request'))  
        <p class="mb-1">
            <a href="{{ route('password.request') }}">{{ __('Esqueci minha palavra passe!') }}</a>
        <!--/p>
        <p class="mb-0"--> ||
            <a href="{{route('register')}}" class="text-center">Cadastrar-se</a>
        </p>
    @endif
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->



@endsection