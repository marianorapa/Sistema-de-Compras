<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Vincular Articulo a Proveedor') }}
        </h2>
    </x-slot>

    <div class="w-1/3 h-auto sm:rounded-md mx-auto mt-5 bg-blue-100 shadow-xl">
        <div class="bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-5 py-3">  
            <h3 class="text-center">Artículo</h3>
            <label for="">ID Articulo: </label>
            {{$articulo->ArticuloID}}
            <br>
            <label for="">Descripción: </label>
            {{$articulo->Descripcion}}         
        </div>      
    </div>

    <div class="w-1/2 h-auto sm:rounded-md mx-auto mt-5 bg-blue-100 shadow-xl">
        <div class="  bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-5 py-3">                        
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">
                Buscar Proveedor
            </button>
            <div class="flex bg-white px-4 py-3 border-t border-gray-100 sm:px-6">
              <input wire:model="search" class="form-input rounded-md shadow-sm block w-full mt-3 mb-3"  type="text" placeholder="Buscar Usuario...">
            <div wire:model="perPage" class="form-input rounded-md shadow-sm mt-3 mb-3 ml-3 block">
              <select class="outline-none text-gray-500 text-sm">
                  <option value="5">5 por página</option>
                  <option value="10">10 por página</option>
                  <option value="15">15 por página</option>
                  <option value="20">20 por página</option>
              </select>
            </div>
            </div>
            @if ($proveedores->count())
            <table class="table table-hover bg-white mt-4">
                <caption>Proveedores seleccionados</caption>
                <thead>
                  <tr>
                    <th scope="col">ID Proveedor</th>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Razon social</th>
                    <th scope="col">Seleccionar</th>
                  </tr>
                </thead>
                <tbody>          
                    @foreach ($proveedores as $proveedor)
                        <tr>                        
                            <td class="px-5 ">
                                {{$proveedor->ProveedorID}}
                            </td>
                            <td class="px-10">
                                {{$proveedor->Nombre}}
                            </td>
                            <td class="px-10">
                                {{$proveedor->Razon_social}}
                            </td>   
                        </tr>
                      @endforeach
                </tbody> 
              </table>                          
                @else
                 <div class="bg-white px-4 py-3 border-t border-gray-100 sm:px-6">
                  No se encontraron coincidencias
                </div>
                @endif
                <div class="bg-gray-50 mt-2 px-4 py-2 border-t border-gray-200">
                   {{$proveedores->links()}}
                </div>
              
        </div>      
    </div>
</x-app-layout>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Selección de Proveedores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Seleccionar</button>
        </div>
      </div>
    </div>
  </div>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

