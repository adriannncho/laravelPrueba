<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aportes extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdAporte';
    protected $fillable = ['IdAporte','id','IdProyecto','AporteUnitario','AporteTotal','Fecha'];
}
