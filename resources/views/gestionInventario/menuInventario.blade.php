<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestion de Inventario') }}
        </h2>
    </x-slot>        
        <div class="flex flex-wrap justify-center bg-gray-100 ml-64 mr-64 mt-15 ">

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4">                   
                    <!--Establecer punto de pedido Card's-->                    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="mt-5 rounded mx-auto d-block" src="/img/puntop.png" alt="Establecer Punto de Pedido" >
                        <div class="px-6 py-4">                         
                            {{--<a href="{{route('gestionInventario.puntoPedido')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Establecer punto de pedido</a>--}}
                            <a href="{{route('gestionInventario.puntoPedido','puntoPedido')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Establecer punto de pedido</a>                     
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Ajuste de inventario Card's-->  
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/egreso.png" alt="Ajuste de Inventario" >
                        <div class="px-6 py-4">
                            {{--<a href="{{route('gestionInventario.ajustarInventario')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Ajustar inventario</a>--}}                     
                            <a href="{{route('gestionInventario.ajustarInventario','ajustarInventario')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Ajustar inventario</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Registro de artículos recibídos Card's-->    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/ingreso.png" alt="Registro de Pedidos" >
                        <div class="px-6 py-4">                            
                            <a href="{{route('gestionInventario.registrarRecepcion')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Registrar recepción de artículos</a>
                            {{--<a href="{{route('gestionInventario.registrarRecepcion','registrarRecepcion')}}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Registrar recepción de artículos</a>--}}                     
                        </div>  
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Verificación de inventario Card's-->    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/verificar.png" alt="Verificación de Inventario" >
                        <div class="px-6 py-4">
                            <a href="{{ route('gestionInventario.verificarInventario') }}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Verificar inventario</a>
                            {{--<a href="{{ route('gestionInventario.verificarInventario','verificarInventario') }}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Verificar inventario</a>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Registro de pedido incompleto Card's-->    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/incompleto.png" alt="Pedido incompleto" >
                        <div class="px-6 py-4">
                            <a href="" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Administración de pedidos incompletos</a>
                        </div>
                    </div>
                </div>
            </div>
             
            {{--
            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4"> 
                    <!--Administración de reclamos Card's-->    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/reclamos.png" alt="Reclamos" >
                        <div class="px-6 py-4">
                        <a href="" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Administración de reclamos</a>
                        </div>
                    </div>
                </div>
            </div>
            --}}

        </div>  
</x-app-layout>