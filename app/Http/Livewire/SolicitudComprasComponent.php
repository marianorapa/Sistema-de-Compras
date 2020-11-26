<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Solicitud_Compras;
use Livewire\WithPagination;

class SolicitudComprasComponent extends Component
{
    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search ='';
    public $perPage ='5';

    public function render()
    {   

        return view('gestionCompras.solicitudCompras.menu', [
        'solicitudesCompras'=> Solicitud_Compras::where('SolicitudCompraID', 'LIKE', "%{$this->search}%")
        ->orWhere('FechaRegistro', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}

