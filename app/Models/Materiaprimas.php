<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiaprimas extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdMateriaPrima';
    protected $fillable = ['IdMateriaPrima', 'IdTipoMateriaPrima', 'Codigo', 'Nombre', 'Cantidad', 'Descripcion'];
}
