<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedidos extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdDetallePedido';
    protected $fillable = ['IdDetallePedido','IdPedido', 'IdMateriaPrima','IdMedida','ValorUnitario','Cantidad','Total'];
}
