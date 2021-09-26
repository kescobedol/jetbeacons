<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beacon extends Model
{
    use HasFactory;

    //Indica que campos pueden ser escritos por medio de formulario
    protected $fillable = ['uuid', 'nombre', 'estado', 'instituciones_id'];

    //Relación uno a Muchos con Contenidos
    public function contenidos(){
        return $this->hasMany(Contenido::class);
    }

    //Relación uno a Muchos Inversa con Instituciones
    public function institucione(){
        return $this->belongsTo(Institucione::class);
    }
}
