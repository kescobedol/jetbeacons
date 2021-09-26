<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;

    //Indica que campos pueden ser escritos por medio de formulario
    protected $fillable = ['imagen_url', 'url', 'estado', 'beacons_id'];

    //Relación uno a Muchos Inversa con Beacons
    public function beacon(){
        return $this->belongsTo(Beacon::class);
    }
}
