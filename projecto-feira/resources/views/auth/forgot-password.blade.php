@extends('layouts.login_register')
@section('title', 'Entrar')
@section('content')
<div class="login-box" >
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu sua senha? Sem problemas. Apenas informe seu endereço de e-mail que enviaremos um link que permitirá definir uma nova senha.') }}
    </div>
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
      <p class="login-box-msg">Alterar senha</p>

      <form action="{{ route('password.email')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="seu Email" name="email" :value="old('email')" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
          <div class="col-12" >
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #f3ae34; border:red; ">Enviar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->



@endsection