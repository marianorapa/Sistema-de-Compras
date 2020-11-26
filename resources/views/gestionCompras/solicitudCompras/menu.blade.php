<x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Solicitudes de Compra') }}
    </h2>
</x-slot>

<div class="container mx-auto mt-3">
    <div class="d-flex justify-content-start">
        <a class="btn btn-danger" href="{{route('gestionCompras')}}" role="button">Atras</a>
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
            @if ($solicitudesCompras->count())
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead class="bg-blue-50">
                            <tr class="text-xs font-medium text-gray-500 uppercase text-left">
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Fecha de Registro</th>                                
                            </tr>
                        </thead>         
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($solicitudesCompras as $s)
                                <tr> 
                                    <th scope="row" class="text-center">
                                        {{$s->SolicitudCompraID}}
                                    </th>                                                                                
                                    <td class="text-center">
                                        {{$s->FechaRegistro}}
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
                {{$solicitudesCompras->links()}}
            </div>
        </div>
    </div>  
</div>
    




