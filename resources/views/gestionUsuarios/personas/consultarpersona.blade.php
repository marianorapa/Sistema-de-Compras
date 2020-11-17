<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Consulta de Persona') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>
    <!-- Lista de las Persona que estan en la BD-->
    <ul>
        @foreach($personas as $persona)
            <li>
               {{$persona->Legajo}}
            </li>
        @endforeach
    </ul>
    <!-- Mostrar botone sde paginación-->
    {{$personas->links()}}


</x-app-layout>