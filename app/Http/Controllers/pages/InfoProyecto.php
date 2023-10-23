<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyectos;
use App\Models\Aportes;
use App\Models\Pedidos;
use DB;
use Iluminate\Support\Facades\Storage;

class InfoProyecto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $pedidos = DB::table('pedidos')
            ->join('proyectos', 'proyectos.IdProyecto', '=', 'pedidos.IdProyecto')
            ->where('proyectos.IdProyecto', '=', $id)
            ->select('pedidos.IdPedido','pedidos.FechaHora', 'pedidos.Evidencia', 'pedidos.ValorTotal', 'pedidos.Descripcion')
            ->orderBy('pedidos.FechaHora', 'ASC')
            ->get();
    
        // Obtén el proyecto correspondiente para mostrar su información si es necesario
        $proyecto = Proyectos::find($id);

        return view('content.pages.info-proyecto.info-proy', ['proyecto' => $proyecto , 'pedidos' => $pedidos]);
    }
}