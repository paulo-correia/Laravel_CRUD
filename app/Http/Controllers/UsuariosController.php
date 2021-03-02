<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuarios;
use Validator;

class UsuariosController extends Controller
{

   public function index()
   {
     $users = Usuarios::all();
     return view('lista_usuarios')->with('users', $users);
   }

    public function create()
    {
	     return view('incluir_usuario');
    }

    public function store(Request $request)
    {

	     $this->validate($request, [
		       'name' => 'required|max:255',
           'email' => 'required',
           'birth_date' => 'nullable|date',
           'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
           ]);

    $user = new Usuarios([
          	'name' => $request->get('name'),
  		    	'email'=> $request->get('email'),
  		      'birth_date' => $request->get('birth_date'),
  		      'password' => bcrypt($request->get('password')),
        	]);

    $user->save();
    return redirect('/usuarios/create')->with('success', 'Usuário inserido com sucesso');
  }

  public function edit($id)
  {
    $users = Usuarios::find($id);
	  return view('edita_usuario')->with('users', $users);
  }

  public function update(Request $request, $id)
  {
    $users = Usuarios::find($id);

  	$this->validate($request, [
  		'name' => 'required|max:255',
      'email' => 'required',
      'birth_date' => 'nullable|date'
  	]);

  	if ( (strlen($request->get('password-confirmation')>1)) || (strlen($request->get('password')>1)) ) {

  		$this->validate($request, [
  			'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
  		]);

  		$users->password=bcrypt($request->get('password'));

  	}

  	$users->save();
  	return redirect('/usuarios/'.$id.'/edit')->with('users', $users)->with('success', 'Usuário alterado com sucesso');
  }

  public function destroy($id)
  {
    $users = Usuarios::find($id);

	   if ( $users->id==1 ) {

		     return redirect('/usuarios')->with('alert', 'Usuário não deletado');

	   }

	   $users->delete();

	   return redirect('/usuarios')->with('success', 'Usuário deletado com sucesso');
  }

}
