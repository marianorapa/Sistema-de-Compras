<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestion de Proveedores') }}
        </h2>
    </x-slot>
        
        <div class="flex flex-wrap justify-center bg-gray-100 ml-64 mr-64 mt-20 ">
            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Usuarios Cards-->                    
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/proveedores.png" alt="Administración de Proveedores" >
                        <div class="px-6 py-4">
                            <a href="{{ route('proveedor.registro') }}" class="btn btn-success  bg-gray-300 text-gray-600 font-bold px-2 py-1 rounded-lg  hover:bg-gray-500 hover:text-white">Administración de Proveedores</a>                         
                        </div>
                    </div>
                    </a>
                </div>
            </div>
             
        </div>  
</x-app-layout>