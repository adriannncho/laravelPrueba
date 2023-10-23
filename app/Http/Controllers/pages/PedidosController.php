<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyectos;
use App\Models\Pedidos;
use App\Models\Conceptos;
use App\Models\DetallePedidos;
use App\Models\Proveedores;
use App\Models\MateriaPrimas;
use App\Models\Medidas;
use App\Models\User;
use DB;
use Iluminate\Support\Facades\Storage;

class PedidosController extends Controller
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
    
        return view('content.pages.pedidos.index-pedidos', ['proyecto' => $proyecto, 'pedidos' => $pedidos]);
    }
    

    public function create(string $id)
    {
        //
        $proyecto = Proyectos::find($id);
        $proveedor = Proveedores::all();
        $concepto = Conceptos::all();
        $user = auth()->user();
        $materia = MateriaPrimas::all();
        $medida = Medidas::all();
        return view('content.pages.pedidos.createpedido', ['proyecto' => $proyecto, 'proveedores' => $proveedor, 'conceptos' => $concepto,
                                             'user' => $user, 'materiaprimas' => $materia, 'medidas' => $medida]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        print_r($data);

        //Codigo para mover archivo
        $file = $request->file('poster');
        $fileName = time().$file->getClientOriginalName();
        //Pasa el archivo a la carpeta pdfpedidos que debe estar creada en la carpeta public
        $file->move(public_path().'/pdfpedidos/',$fileName); 
        // Guarda el nombre del archivo en la base de datos
        $data['poster'] = $fileName;
        print_r('Antes de pedidos');
        //Fin de codigo de mover archivo




        // Crear un nuevo pedido con los datos validados --- TAMBIEN FUNCIONA
        $Pedidos = new Pedidos();
        $Pedidos->id=$data['admin'];
        $Pedidos->IdProveedor=$data['proveedor'];
        $Pedidos->IdProyecto=$data['proyecto'];
        $Pedidos->IdConcepto=$data['concepto'];
        $Pedidos->FechaHora=$data['fecha'];
        $Pedidos->Evidencia=$data['poster'];
        $Pedidos->ValorTotal=$data['valorTotal'];
        $Pedidos->Descripcion=$data['descripcion'];
        $Pedidos->save(); 

        //DETALLE PEDIDO

        $ultimoPedido=Pedidos::select('IdPedido')->orderBy('IdPedido','desc')->first(); //Toma el valor de la llave primaria del último registro creado
        $ultimoid=$ultimoPedido["IdPedido"];
       
        $detalle=json_decode($request->input('detallesPedidos'));
        
        for($i=0;$i<count($detalle);$i++){
            $detallePedidos = new DetallePedidos();
            $detallePedidos->IdPedido=$ultimoid;
            $detallePedidos->IdMateriaPrima=$detalle[$i]->materiaPrima;
            $detallePedidos->IdMedida=$detalle[$i]->medida;
            $detallePedidos->ValorUnitario=$detalle[$i]->valorUnitario;
            $detallePedidos->Cantidad=$detalle[$i]->cantidad;
            $detallePedidos->Total=$detalle[$i]->total;
            $detallePedidos->save();
        }  
        return "Por fin registro";
        //return redirect()->route('index-pedidos'); 
    }
}