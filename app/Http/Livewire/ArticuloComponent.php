<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Articulo;
use Livewire\WithPagination;

class ArticuloComponent extends Component
{

    use WithPagination;

    protected $queryString = ['search' => ['except' => '']];

    public $search = '';
    public $perPage = '5';
    public $path;
    public $dir='';

    public function mount($path)
    {
        $this->path = $path;

        switch($this->path){
            case "menu":
                $this->dir = 'gestionArticulos.';
            break;

            case "puntoPedido" || "ajustarInventario" || "registrarArticulo" || "verificarInventario":
                $this->dir='gestionInventario.';
            break;
                     
        } 
        $this->path = $this->dir.$this->path;
    }
   
    public function render()
    {   
        return view($this->path, [
            'articulos'=> Articulo::where('Descripcion', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);

    }   
  
}
