<?php

namespace App\Http\Livewire\Contenidos;

use App\Models\Beacon;
use App\Models\Contenido;
use App\Models\Institucione;
use Livewire\Component;

class CreateContenidos extends Component
{
    public $open = false;

    public $imagen_url, $url, $estado=1, $beacons_id;

    protected $rules =[
        'imagen_url' => 'required',
        'url' => 'required',
        'estado' => 'required',
        'beacons_id' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        Contenido::create([
            'imagen_url' => $this->imagen_url,
            'url' => $this->url,
            'estado' => $this->estado,
            'beacons_id' => $this->beacons_id
        ]);

        $this->reset(['open', 'imagen_url', 'url', 'estado', 'beacons_id']);

        $this->emit('render');
        $this->emit('alert', 'Contenido creado con éxito');

    }

    public function render()
    {
        $beacons = Beacon::all();

        $instituciones = Institucione::all();

        return view('livewire.contenidos.create-contenidos', compact('beacons', 'instituciones'));
    }
}
