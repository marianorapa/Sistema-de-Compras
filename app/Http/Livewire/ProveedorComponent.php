<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class ProveedorComponent extends Component
{
    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search ='';
    public $perPage ='5';
    public $path;
    public $dir='';

    public function mount($path)
    {
        $this->path = $path;

        switch($this->path){
            case "menu":
                $this->dir = 'gestionProveedores.';
            break;
        } 
        $this->path = $this->dir.$this->path;
    }

    public function render()
    {   
        return view($this->path, [
        'proveedores'=> Proveedor::where('Telefono', 'LIKE', "%{$this->search}%")
        ->orWhere('Razon_social', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}

