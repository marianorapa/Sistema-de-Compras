<x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Establecer Punto de Pedido') }}
    </h2>
</x-slot>

<div class="container mx-auto py-2 mt-5">
    <div class="flex">
        <a href="{{route('inventario')}}" class="btn btn-success bg-red-500 text-white font-bold px-4 py-1 rounded-lg  hover:bg-red-700">Atras</a>
    </div>
    <div class="container mx-auto py-2 mt-5">
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
                            <th class="px-20 py-3 text-center">Nuevo Punto de Pedido</th>   
                            <th class="px-20 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>         
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($articulos as $articulo)
                            <tr>                    
                                <form action="{{route('articulo.establecer', $articulo->ArticuloID)}}" method="POST">
                                    @csrf  
                                    {{--Directiva Laravel para indicarle que se quiere enviar un formulario por el metodo POST haciendo uso de PATCH --}}
                                    @method('put')
                                    <td class="px-5 text-center">
                                        {{$articulo->ArticuloID}}
                                    </td>
                                    <td class="px-20">
                                        {{$articulo->Descripcion}}
                                    </td>   
                                    <td class="px-20 text-center">
                                        {{$articulo->Punto_pedido}}
                                    </td>      
                                    <td class="px-20 text-center">
                                        <x-jet-input id="punto_pedido_nuevo" class="block mt-1 w-full" type="number" name="punto_pedido_nuevo" required/>
                                    </td>                      
                                    <td class="px-10 py-2">
                                        <div class="flex items-center justify-center">                                    
                                            {{--<a href="{{route('articulo.establecer', $articulo->ArticuloID)}}" class="btn btn-success bg-green-500 text-white font-bold px-2 py-1 rounded-lg  hover:bg-green-700">Establecer</a>--}}
                                            <button class="btn btn-primary" type="submit">Establecer</button>                                                                                                                                                                                                                                     
                                            <x-jet-button class="modal-open">
                                                {{__('Abrir')}}
                                            </x-jet-button>
                                        </div>
                                       
                                     
                                    </td>                               
                                </form>
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

<!--Modal--> 
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Establecer Punto de Pedido</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <table class="table-responsive table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase text-left">
                    <th class="px-5 py-3 text-center">ID de Articulo</th>
                    <th class="px-20 py-3">Descripcion</th>    
                    <th class="px-20 py-3 text-center">Punto de Pedido</th>   
                    <th class="px-20 py-3 text-center">Nuevo Punto de Pedido</th>                       
                </tr>
            </thead> 
                <tbody class="divide-y divide-gray-200">
                    <td class="px-5 text-center">
                        {{$articulo->ArticuloID}}
                    </td>
                    <td class="px-20">
                        {{$articulo->Descripcion}}
                    </td>   
                    <td class="px-20 text-center">
                        {{$articulo->Punto_pedido}}
                    </td>      
                    <td class="px-20 text-center">
                        <x-jet-input id="punto_pedido_nuevo" class="block mt-1 w-full" type="number" name="punto_pedido_nuevo" required/>
                    </td>                      
                </tbody>            
        </table>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Guardar</button>
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>

    
<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    
  </script>







 