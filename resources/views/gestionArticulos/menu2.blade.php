<x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Gestión de Artículos') }}
    </h2>
</x-slot>

<div class="container mx-auto py-2 mt-3">
    <div class="flex items-center justify-center mb-3">
        <a href="{{route('articulo.alta')}}" class="btn btn-success bg-blue-500 text-white font-bold px-2 py-1 rounded-lg  hover:bg-blue-700">Alta de Artículo</a>
    </div>
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
            <table class="min-w-full divide-y divide-gray-200">                    
                <thead class="bg-blue-50 border-b border-gray-200">
                    <tr class="text-xs font-medium text-gray-500 uppercase text-left">
                        <th class="px-20 py-3">ID</th>
                        <th class="px-20 py-3">Descripción</th>                                                                                       
                        <th class="px-20 py-3">Punto de Pedido</th> 
                        <th class="px-20 py-3">Stock</th> 
                        <th class="px-20 py-3 text-center">Acciones</th> 
                    </tr>
                </thead>             
                <tbody class="divide-y divide-gray-200">                           
                    @foreach ($articulos as $a)                                                                           
                            <tr>
                                <td class="px-20">
                                    {{$a->ArticuloID}}                                    
                                </td>
                                <td class="px-20">
                                    {{$a->Descripcion}}                                    
                                </td> 
                                <td class="px-20">
                                    {{$a->Punto_pedido}}                                    
                                </td>
                                <td class="px-20">
                                    {{$a->Stock_disponible}}                                    
                                </td>                                                                                                             
                                <td class="px-20 py-2">                                   
                                    <div class="flex items-center justify-end">
                                        <button class="bg-green-500 text-white font-bold px-2 py-1 rounded-lg  hover:bg-green-700">Editar</button>                                            
                                        {{--<form action="{{route('usuario.baja',$usuario)}}" id="for-eli" class="for-eli" method="POST">                                          --}}
                                            <button type="submit" class="bg-red-500 text-white font-bold ml-2 px-2 py-1 rounded-lg hover:bg-red-700">Eliminar</button>
                                            {{--@csrf      --}}
                                            {{--LLamada al metodo delete para que ejecute el POST--}}                                      
                                            {{--@method('delete') --}}
                                        {{--</form>--}}
                                        <a href="{{route('articulo.vincular',$a->ArticuloID)}}" class="btn btn-success ml-2 bg-blue-500 text-white font-bold px-2 py-1 rounded-lg  hover:bg-blue-700">vincular</a>
                                    </div>
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
        <div class="bg-white mt-2 px-4 py-2 border-t border-gray-200">
            {{$articulos->links()}}
        </div>        
    </div>
</div>
