<?php

namespace App\Http\Livewire\Instituciones;

use App\Models\Institucione;
use Livewire\Component;
use Livewire\WithPagination;


class ShowInstituciones extends Component
{
    public $open_edit = false;
    
    use WithPagination;

    public $search, $institucion;

    public $sort='id';

    public $direction='desc';

    public $cant = 10;

    public function updatingSearch(){
        $this->resetPage();
    }

    

    protected $rules = [
        'institucion.nombre' => 'required',
        'institucion.descripcion' => 'required',
        'institucion.estado' => 'required'
    ];

    protected $listeners = ['render'];

    public function render()
    {
        $instituciones = Institucione::where('id', 'like', '%' . $this->search . '%')
        ->orWhere('nombre', 'like', '%' . $this->search . '%')
        ->orWhere('descripcion', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);

        return view('livewire.instituciones.show-instituciones', compact('instituciones'));
    }

    public function order($sort){
        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction='asc';
            } else {
                $this->direction='desc';
            }
            
        } else {
            $this->sort=$sort;
            $this->direction='asc';
        }
    }

    public function edit(Institucione $institucion){
        $this->open_edit = true;
        $this->institucion = $institucion;
        
    }

    public function update(){
        $this->validate();

        $this->institucion->save();

        $this->reset('open_edit');

        $this->emit('alert', 'Institución editada con éxito');
    }
    
}
