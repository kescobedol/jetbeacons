<?php

namespace App\Http\Livewire\Beacons;

use Livewire\Component;
use App\Models\Beacon;
use App\Models\Institucione;

class CreateBeacons extends Component
{
    public $open = false;

   

    public $uuid, $nombre, $estado=1, $instituciones_id;

    protected $rules =[
        'uuid' => 'required',
        'nombre' => 'required',
        'estado' => 'required',
        'instituciones_id' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        Beacon::create([
            'uuid' => $this->uuid,
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'instituciones_id' => $this->instituciones_id
        ]);

        $this->reset(['open', 'uuid', 'nombre', 'estado', 'instituciones_id']);

        $this->emit('render');
        $this->emit('alert', 'Beacon creado con éxito');


    }

    public function render()
    {
        $instituciones = Institucione::all();

        return view('livewire.beacons.create-beacons', compact('instituciones'));
    }
}
