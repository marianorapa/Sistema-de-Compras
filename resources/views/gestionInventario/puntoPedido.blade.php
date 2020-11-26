
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Establecer punto pedido') }}
        </h2>
    </x-slot>
<div class="container mx-auto mt-3">
    <div class="d-flex justify-content-start">
        <a class="btn btn-danger" href="{{route('gestionInventario')}}" role="button">Atras</a>
    </div>
    <div class="container mx-auto mt-3">
        <div class=" bg-white rounded-lg shadow overflow-hidden mx-auto mb-2">
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
            @if ($articulos->count())
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead class="bg-blue-50">
                            <tr class="text-xs font-medium text-gray-500 uppercase text-left">
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Descripcion</th>                                
                                <th scope="col" class="text-center">Punto de Pedido</th>                                                        
                                <th scope="col" class="text-center">Acción</th>
                            </tr>
                        </thead>         
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($articulos as $articulo)
                                <tr> 
                                    <th scope="row" class="text-center">
                                        {{$articulo->ArticuloID}}
                                    </th>                                                                                
                                    <td class="text-center">
                                        {{$articulo->Descripcion}}
                                    </td>                                      
                                    <td class="text-center">
                                        {{$articulo->Punto_pedido}}                                        
                                    </td>                                                            
                                    <td>
                                        <div class="d-flex justify-content-center">                                                                             
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$articulo->ArticuloID}}">
                                                Mostrar
                                            </button>                                                                
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal{{$articulo->ArticuloID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Establecer Punto de Pedido</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mt-2 mb-2">
                                                            <form action="{{route('articulo.establecer', $articulo->ArticuloID)}}" method="POST">
                                                                @csrf  
                                                                {{--Directiva Laravel para indicarle que se quiere enviar un formulario por el metodo POST haciendo uso de PATCH --}}
                                                                @method('put')
                                                    
                                                                <div class="form-group text-center">                        
                                                                    {{$articulo->Descripcion}}
                                                                </div>

                                                                <table class="table mb-5">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col" class="text-center">Punto de Pedido Actual</th>
                                                                            <th scope="col" class="text-center">Punto de Pedido Nuevo</th>                                                               
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="text-center"><p class="mt-2">{{$articulo->Punto_pedido}}</p></th>
                                                                            <td>
                                                                                <div class="d-flex justify-content-center">                                                                                
                                                                                    <x-jet-input class="text-center" id="punto_pedido_nuevo"  type="number" name="punto_pedido_nuevo" autocomplete="off" min="0" max="100" value="0" autofocus required></x-jet-input>
                                                                                </div> 
                                                                            </td>                                                                 
                                                                      </tr>                                                                                                                       
                                                                    </tbody>
                                                                </table>                                                                                                                                                                 
                                                                <div class="d-flex justify-content-center">                                                                   
                                                                    <button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Cancelar</button>                                                                                                                  
                                                                    <button type="submit" class="btn btn-primary">Establecer</button>
                                                                </div>
                                                            </form>
                                                        </div>                                                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                                            
                                    </td>                                                              
                                </tr>                    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-white px-4 py-3 border-t border-gray-100 sm:px-6">
                    No se encontraron coincidencias.
                </div>
            @endif
            <div class="bg-white px-4 border-t border-gray-200">
                {{$articulos->links()}}
            </div>
        </div>
    </div>  
</div>

@livewireStyles
<!-- CSS --> 
<!-- Source: https://getbootstrap.com/-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@livewireScripts
<!-- jQuery and JS bundle w/ Popper.js Boot-->
<!-- Source: https://getbootstrap.com/-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>










 