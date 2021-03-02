@extends('layouts.app')

@php( $users = \App\Usuarios::all()->toArray() )

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Editar Usuários</div>
                <div class="panel-body">
			               <form class="form-horizontal" role="form" method="POST" action="{{ action('UsuariosController@update', $users[0]['id']) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $users[0]['name'] }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>Este campo é obrigatório</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <label for="birth_date" class="col-md-4 control-label">Data de Nascimento</label>
                        <div class="col-md-6">
                            <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ $users[0]['birth_date'] }}">
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $users[0]['email'] }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>Este campo é obrigatório</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Senha</label>
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirmation" class="col-md-4 control-label">Digite a Senha Novamente</label>
                      <div class="col-md-6">
                        <input id="password-confirmation" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                      </div>
              </div>

              <p><strong>Obs:</strong> As senhas devem tem no mínimo 8 caracteres, tendo ao menos: uma letra maiúscula, uma minúscula, um caractere especial (#?!@$%^&*-) e um número.</p>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-success">
                   Salvar
                  </button>
                  <button type="reset" class="btn btn-danger">
                    Cancelar
                  </button>
              </div>
            </div>
      </form>
  </div>
 </div>
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br />
@endif
</div>
