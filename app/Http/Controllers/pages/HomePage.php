<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Proyectos;
use App\Models\Departamentos;
use App\Models\Ciudades;
use Illuminate\Http\Request;
use DB;
use Iluminate\Support\Facades\Storage;

class HomePage extends Controller
{
  public function index()
  {
    $proyectos = Proyectos:: orderBy('Estado', 'ASC')-> get();
    return view('content.pages.pages-home', ['proyectos'=>$proyectos]);
  }

  

    public function create()
    {
        //
        $departamentos = Departamentos::orderBy('Nombre', 'ASC')->get();
        return view('content.pages.createproyecto',  ['departamentos'=>$departamentos]);
        
    }

    public function store(Request $request){

        if ($request->hasFile('file')) {
            $imagen = $request->file('file');
            $foto = time() . $imagen->getClientOriginalName();
            $imagen->move(public_path().'/storage/imagen', $foto);
        }

        Proyectos::create([
            'IdDepartamento' => request('depto'),
            'IdCiudad' => request('ciudad'),
            'Nombre' => request('nombre'),
            'Direccion' => request('dire'), 
            'Imagen' => $foto, // Asigna $nombrefoto solo si tiene un valor
            'Estado' => request('estado'),
            'AporteTotal' => request('presupuesto')
        ]);

        return redirect()->route('pages-home');
    }

    public function edit(string $id)
    {
        //
        $proyecto = Proyectos::findOrFail($id);
        $departamentos = Departamentos::all();
        $ciudades = Ciudades::all();
        return view('content.pages.editarproyecto', compact('proyecto', 'departamentos', 'ciudades'));

    }

    public function update(Request $request, string $id)
    {
        //

        $proyecto = Proyectos::findOrFail($id);

        $nombrefoto = $proyecto->Imagen; // Por defecto, mantén la imagen existente

        if ($request->hasFile('file')) {
            $foto = $request->file('file');
            $nombrefoto = time() . $foto->getClientOriginalName();
            $foto->move(public_path() . '/storage/imagen', $nombrefoto);
        }

        $proyecto->update([
            'IdDepartamento' => $request->input('depto'),
            'IdCiudad' => $request->input('ciudad'),
            'Nombre' => $request->input('nombre'),
            'Direccion' => $request->input('dire'),
            'Imagen' => $nombrefoto,
            'Estado' => $request->input('estado'),
            'AporteTotal' => $request->input('presupuesto')
        ]);

        return redirect()->route('pages-home');

    }

    public function listarCiudades($id)
    {
        $ciudades = Ciudades::where('IdDepartamento', $id)->orderBy('Nombre', 'ASC')->get();
        //$proyectos = Proyecto:: orderBy('Nombre', 'ASC')-> get();
        //$ciudades = Ciudades::orderBy('Nombre', 'ASC')-> get();
        return $ciudades; 
        /* return "xyz"; */
    
    }
}
