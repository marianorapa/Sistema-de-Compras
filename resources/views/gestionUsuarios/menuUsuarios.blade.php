<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestion de Usuarios') }}
        </h2>
    </x-slot>
        
        <div class="flex flex-wrap bg-gray-100 ml-64 mr-64 mt-20">

            <div class="w-1/3 p-4 bg-gray-100">                
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Usuarios Cards-->                    
                    <a href="{{ route('usuario.consulta') }}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">                        
                        <img class="rounded mx-auto d-block" src="/img/usuario.png" alt="Administración de Usuarios" >
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Usuarios</div>                              
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <div class="w-1/3 p-4">
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Personas Cards-->
                <a href="{{ route('persona.registro') }}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">
                        <img class="rounded mx-auto d-block pt-4" src="/img/persona.png" alt="Administración de Personas">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Personas</div>
                        </div>
                    </div>
                </a>
                </div>
            </div>

            <div class="w-1/3 p-4">
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Sectores Cards-->
                <a href="{{route('sector.registro')}}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">
                        <img class="rounded mx-auto d-block pt-4" src="/img/sectores.png" alt="Administración de Sectores">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Sectores</div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>    

            <div class="w-1/3 ml-48">
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Roles Cards-->
                <a href="{{route('rol.registro')}}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">
                        <img class="rounded mx-auto d-block" src="/img/rol.png" alt="Administración de Roles">
                        <div class="px-4 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Roles</div>
                        </div>
                        <div class="pb-6"></div>
                    </div>
                    </a>
                </div>
            </div> 

            <div class="w-1/3 ml-32">
                <div class="text-gray-700 text-center bg-gray-100 p-4">
                    <!--Admnistración de Permisos Cards-->
                <a href="{{route('permiso.registro')}}" class="card-link underline hover:text-blue-500">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg pb-10">
                        <img class="rounded mx-auto d-block" src="/img/permisos.png" alt="Administración de Permisos">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Administración de Permisos</div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
             
        </div>  
</x-app-layout>