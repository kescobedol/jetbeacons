<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucione extends Model
{
    use HasFactory;

    //Indica que campos pueden ser escritos por medio de formulario
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    //O se pueden incluir los campos que deben ser protegidos en asignación masiva para optimizar código
    //protected $guarded = [];

    //Se sobreescribe el método para poder determinar las uls con el campo slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    

    //Relación uno a muchos con Beacons
    public function beacons(){
        return $this->hasMany(Beacon::class);
    }
}
