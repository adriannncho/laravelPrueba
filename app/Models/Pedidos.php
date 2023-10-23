<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdPedido';
    protected $fillable = ['IdPedido', 'id','IdProveedor', 'IdProyecto', 'IdConcepto', 'FechaHora', 
                            'Evidencia', 'ValorTotal', 'Descripcion'];
}
