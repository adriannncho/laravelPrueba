<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Proyectos;
use App\Models\Departamentos;
use App\Models\Ciudades;
use Illuminate\Http\Request;
use DB;
use Iluminate\Support\Facades\Storage;

class Projects extends Controller
{
  public function index(Request $request)
    {
        $status = $request->input('status');
        $proyecto= [];

        if ($status === 'En ejecucion' || $status === 'En planeacion' || $status === 'Finalizado') {
            $proyectos = Proyectos::where('estado', $status)->get();
        } else {
            $proyectos = Proyectos::all();
        }

        return view('content.pages.projects', compact('proyectos'));
    }
}
