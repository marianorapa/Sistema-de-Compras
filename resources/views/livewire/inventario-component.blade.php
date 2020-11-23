<x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Establecer Punto de Pedido') }}
    </h2>
</x-slot>

<div class="container mx-auto py-2 mt-2">
    <div class="flex">
        <a href="{{route('inventario')}}" class="btn bg-red-500 text-white font-bold px-4 py-1 rounded-lg  hover:bg-red-700">Atras</a>
    </div>
    <div class="container mx-auto py-2 mt-2">
        <div class=" bg-white rounded-lg shadow overflow-hidden mx-auto mb-4">
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
                <table class="table-responsive table-auto min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-50 border-b border-gray-200">
                        <tr class="text-xs font-medium text-gray-500 uppercase text-left">
                            <th class="px-5 py-3 text-center">ID de Articulo</th>
                            <th class="px-20 py-3">Descripcion</th>                                
                            <th class="px-20 py-3 text-center">Punto de Pedido</th>                                                        
                            <th class="px-20 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>         
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($articulos as $articulo)
                            <tr>                                                
                                <td class="px-5 text-center">
                                    {{$articulo->ArticuloID}}
                                </td>
                                <td class="px-20">
                                    {{$articulo->Descripcion}}
                                </td>                                      
                                <td class="px-20 text-center">
                                    {{$articulo->Punto_pedido}}                                        
                                </td>                                                            
                            <td class="px-10 py-2">
                            <div class="flex items-center justify-center">                                                                             
                            <!-- Button trigger modal -->
                            <x-jet-button type="button" data-toggle="modal" data-target="#myModal{{$articulo->ArticuloID}}">
                                Mostrar
                            </x-jet-button>                                       
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
                                                            <div class="form-group">
                                                                <label for="">Articulo</label>
                                                                {{$articulo->ArticuloID}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Descripcion</label>
                                                                {{$articulo->Descripcion}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Punto de pedido actual</label>
                                                                {{$articulo->Punto_pedido}}
                                                            </div>   
                                                            <div class="form-group">
                                                                <label for="">Punto de pedido nuevo</label>
                                                                <input id="punto_pedido_nuevo"  type="number" name="punto_pedido_nuevo" required/>
                                                            </div> 
                                                            <button type="submit" class="btn btn-primary">Guardar</button>                                                                                                                     
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
                                                        <!--<button class="btn btn-primary" type="submit">Guardar</button> -->
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
            @else
                <div class="bg-white px-4 py-3 border-t border-gray-100 sm:px-6">
                    No se encontraron coincidencias.
                </div>
            @endif
            <div class="bg-gray-50 mt-2 px-4 py-2 border-t border-gray-200">
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










 