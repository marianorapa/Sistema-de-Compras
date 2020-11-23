<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestion de Inventario') }}
        </h2>
    </x-slot>
        
        <div class="flex flex-wrap justify-center bg-gray-100 ml-64 mr-64 mt-32 ">

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4">                   
                    <!--Establecer Punto de Pedido Card's-->                    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/puntopedido.png" alt="Establecer Punto de Pedido" >
                        <div class="px-6 py-4">
                        <a href="{{ route('inventario.puntopedido') }}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Establecer Punto de Pedido</a>                         
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Ajuste de Inventario Card's-->  
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/ajuste.png" alt="Ajustar Inventario" >
                        <div class="px-6 py-4">
                        <a href="" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Ajustar Inventario</a>                         
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Reclamos Card's-->  
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/reclamos.png" alt="Reclamos" >
                        <div class="px-6 py-4">
                        <a href="" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Reclamos</a>                         
                        </div>
                    </div>
                </div>
            </div>
             
        </div>  
</x-app-layout>