<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdProveedor';
    protected $fillable = ['IdProveedor','Nombre','Direccion','Telefono','CorreoElectronico'];
}
