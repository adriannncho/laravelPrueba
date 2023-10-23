<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RegisterBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    $roles = Role::all();
    return view('content.authentications.auth-register-basic', ['pageConfigs' => $pageConfigs, 'roles' => $roles]);
  }
}
