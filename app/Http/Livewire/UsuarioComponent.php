<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Articulo;

use Livewire\WithPagination;

class UsuarioComponent extends Component
{

    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search = '';
    public $perPage = '5';

    public function render()
    {   
        //La búsqueda aplica tanto para el campo nombre como para el campo email.
        return view('livewire.usuario-component', [
        'usuarios'=> User::where('name', 'LIKE', "%{$this->search}%")
        ->orWhere('email', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }

    public function renderArticulos()
    {   
        return view('livewire.articulo-component', [
        'articulos'=> Articulo::where('name', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}
