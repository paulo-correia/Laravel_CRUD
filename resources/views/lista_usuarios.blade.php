@extends('layouts.app')

@php( $users = \App\Usuarios::all()->toArray())
@if (empty($users))
<script type="text/javascript">
    window.location = "{{ url('/usuarios/create') }}";
</script>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listar Usuários</div>
                <div class="panel-body">

                  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
                  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
                  <div id="dialog-confirm" title="Excluir?"></div>

		                <div style="overflow-x:auto;">
		                    <table class="table table-striped table-bordered">
			                       <thead>
       				                    <tr>
					                               <td>Nome</td>
				                                  <td>E-mail</td>
					                                <td>Data de Nascimento</td>
					                                <td colspan="2"></td>
				                          </tr>
			                       </thead>
		                         <tbody>

                             @foreach($users as $key => $value)
			                          <tr>
			                          <td>{{ $value["name"] }}</td>
                                <td>{{ $value["email"] }}</td>
                                <td>{{ \Carbon\Carbon::parse($value["birth_date"])->format('d/m/Y') }}</td>
                                <td>
                                  <div class="text-center">
                                    <a class="btn btn-small btn-info" href="{{ URL::to('usuarios/' . $value["id"] . '/edit') }}">Editar</a>
                                  </div>
                                </td>
                                <td>
                                  <div class="text-center">
                                    <form id="user-{{ $value['id'] }}"  action="{{action('UsuariosController@destroy', $value['id'] )}}" method="post" onsubmit="return false;">
			                                   {{ csrf_field() }}
			                                   <input name="_method" type="hidden" value="DELETE">
            		                         <button class="btn btn-danger" onclick="apagar('user-'+{{ $value['id'] }});" type="submit">Excluir</button>
                                         <div id="dialog-confirm" title="Excluir?"></div>
			                              </form>
                                  </div>
                                </td>
                              </tr>
                           @endforeach
		                       </tbody>

		                    </table>
		              </div>

		        </div>
		     </div>
     </div>
  </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  @if(session()->get('alert'))
   <div class="alert alert-danger">
      {{ session()->get('alert') }}
    </div><br />
  @endif
</div>
