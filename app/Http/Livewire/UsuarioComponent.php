<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsuarioComponent extends Component
{

    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search = '';
    public $perPage = '5';

    public function render()
    {
        //$usuarios = User::paginate(10);
        //return view('livewire.usuario-component',compact('usuarios'));*/
        
        return view('livewire.usuario-component', [
        'usuarios'=> User::where('name', 'LIKE', "%{$this->search}%")
        ->orWhere('email', 'LIKE', "%{$this->search}%")
        ->paginate($this->perPage)
        ]);

    }
}
