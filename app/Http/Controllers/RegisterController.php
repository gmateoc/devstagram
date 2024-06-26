<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:30',
            'username'=>'required|unique:users|min:3|max:30|regex:/^\S*$/',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 30 caracteres.',
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'username.min' => 'El nombre de usuario debe tener al menos 3 caracteres.',
            'username.max' => 'El nombre de usuario no puede tener más de 30 caracteres.',
            'username.regex' => 'El nombre de usuario no debe contener espacios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no puede tener más de 60 caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if($user->save()){
            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect()->route('post_index');
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error, intente mas tarde '
            ],422);
        }
    }
}
