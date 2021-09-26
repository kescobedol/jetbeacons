<?php

namespace App\Http\Livewire\Instituciones;

use Livewire\Component;
use App\Models\Institucione;

class CreateInstituciones extends Component
{   
    public $open = false;

    public $nombre, $descripcion, $estado = 1;

    protected $rules =[
        'nombre' => 'required',
        'descripcion' => 'required',
        'estado' => 'required'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        Institucione::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado
        ]);

        $this->reset(['open', 'nombre', 'descripcion', 'estado']);

        $this->emit('render');
        $this->emit('alert', 'Institución creada con éxito');


    }

    public function render()
    {
        return view('livewire.instituciones.create-instituciones');
    }
}
