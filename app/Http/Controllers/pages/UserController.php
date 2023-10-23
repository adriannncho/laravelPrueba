<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Rules\Password;
use Illuminate\Validation\Rule;


class UserController extends Controller
{



    
  public function index()
  {
    $users = User::all();
    $roles = Role::all();
    return view('content.pages.roles.pages-page2', compact('users', 'roles'));
  }


    public function create(){
      $roles = Role::all();
       return view('content.pages.roles.create-user', compact('roles'));
    }

    
    public function store(Request $request)
    {
        // Validar los campos del formulario usando $request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'roles_id' => ['required', 'integer', 'exists:roles,id'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'apellido' => $request->input('apellido'),
            'numdocumento' => $request->input('documento'),
            'fechanacimiento' => $request->input('fechanacimiento'),
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
            'roles_id' => $request->input('roles_id'),
        ]);

        // Asignar el rol al usuario basado en el ID proporcionado en el formulario
        $role = Role::find($request->input('roles_id'));
        if ($role) {
            $user->assignRole($role->name);
        }

        return redirect()->route('pages-page-2');
    }


    public function edit(User $user)
    {
     
        $roles = Role::all();
        return view('content.pages.roles.users-edit-form', compact('user', 'roles'));
    }
  
      public function update(Request $request, User $user)
      {

        $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
          'apellido' => ['required', 'string', 'max:255'],
          'numdocumento' => ['required', 'string', 'max:10'],
          'telefono' => ['required', 'string', 'max:10'],
          'roles_id' => ['required', 'integer', 'exists:roles,id'],
        ]);
      
          
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'apellido' => $request->input('apellido'),
            'numdocumento' => $request->input('documento'),
            'fechanacimiento' => $request->input('fechanacimiento'),
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
            'roles_id' => $request->input('roles_id'),
        ]);
          return redirect()->route('pages-page-2', $user);
      }
  

      public function destroy(User $user)
    {
        //
        
    }
    
}
