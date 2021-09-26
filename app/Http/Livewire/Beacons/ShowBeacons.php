<?php

namespace App\Http\Livewire\Beacons;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Beacon;
use App\Models\Institucione;

class ShowBeacons extends Component
{
    public $open_edit = false;
    
    use WithPagination;

    public $search, $beacon;

    public $sort='id';

    public $direction='desc';

    public $cant = 10;

    public function updatingSearch(){
        $this->resetPage();
    }

    

    protected $rules = [
        'beacon.uuid' => 'required',
        'beacon.nombre' => 'required',
        'beacon.estado' => 'required',
        'beacon.instituciones_id' => 'required',
        
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    protected $listeners = ['render'];

    public function render()
    {

        $beacons = Beacon::where('id', 'like', '%' . $this->search . '%')
        ->orWhere('uuid', 'like', '%' . $this->search . '%')
        ->orWhere('nombre', 'like', '%' . $this->search . '%')
        ->orWhere('instituciones_id', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);

        $instituciones = Institucione::all();

        return view('livewire.beacons.show-beacons', compact('beacons', 'instituciones'));

        
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

    public function edit(Beacon $beacon){
        $this->open_edit = true;
        $this->beacon = $beacon;

       
        
    }

    

    public function update(){
        $this->validate();

        $this->beacon->save();

        $this->reset('open_edit');

        $this->emit('alert', 'Institución editada con éxito');
    }

    
}
