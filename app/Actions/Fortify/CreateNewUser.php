<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */


 
     public function create(array $input)
    {
        // Validar los campos del formulario
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'roles_id' => ['required', 'integer', 'exists:roles,id'], // Validar que el campo 'roles_id' sea requerido y exista en la tabla 'roles'.
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
    
        // Crea el usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'roles_id' => $input['roles_id'], // Asigna el ID del rol desde el formulario al campo 'roles_id'
        ]);

        // Asigna el rol al usuario basado en el ID proporcionado en el formulario
        $role = Role::find($input['roles_id']);
        if ($role) {
            $user->assignRole($role->name);
        }

        return $user;
    }
}
