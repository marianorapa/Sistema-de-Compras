<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestion Proveedores') }}
        </h2>
    </x-slot>
        
        <div class="flex flex-wrap bg-gray-100 ml-64 mr-64 mt-20">

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Usuarios Cards-->                    
                    <a href="{{ route('proveedor.registro') }}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/usuario.png" alt="Administración de Usuarios" >
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Proveedores</div>                              
                        </div>
                    </div>
                    </a>
                </div>
            </div>
             
        </div>  
</x-app-layout>