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

    public function render()
    {   

        return view('gestionProveedores.menu', [
        'proveedores'=> Proveedor::where('Telefono', 'LIKE', "%{$this->search}%")
        ->orWhere('Razon_social', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}

