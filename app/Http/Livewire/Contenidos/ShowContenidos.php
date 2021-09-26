<?php

namespace App\Http\Livewire\Contenidos;

use App\Models\Beacon;
use App\Models\Contenido;
use App\Models\Institucione;
use Livewire\Component;
use Livewire\WithPagination;



class ShowContenidos extends Component
{
    public $open_edit = false;

    public $beacon;


    protected $rules = [
        'contenido.imagen_url' => 'required',
        'contenido.url' => 'required',
        'contenido.estado' => 'required',
        'contenido.beacons_id' => 'required',
        
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    protected $listeners = ['render'];


    public function render()
    {
        $contenidos = Contenido::all()->sortBy('id', SORT_REGULAR, true);

        $beacons = Beacon::all();

        $instituciones = Institucione::all();

        return view('livewire.contenidos.show-contenidos', compact('contenidos', 'beacons', 'instituciones'));
    }

    public function edit(Contenido $contenido){
        $this->open_edit = true;
        $this->contenido = $contenido;
  
    }

    public function update(){
        $this->validate();

        $this->contenido->save();

        $this->reset('open_edit');

        $this->emit('alert', 'Contenido editado con éxito');
    }

}
