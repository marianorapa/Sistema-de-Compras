<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedor;

use Livewire\WithPagination;

class ProveedorComponent extends Component
{

    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search = '';
    public $perPage = '8';

    public function render()
    {   
        return view('livewire.proveedor-component', [
        'proveedores'=> Proveedor::where('Nombre', 'LIKE', "%{$this->search}%")
        ->orWhere('Razon_social', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}

