<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>

    <!-- Formulario de Alta-->
    <div class="container">
        <form action="{{route('rol.store')}}" method="POST">
            <!-- Se agrega @csrf para que se genere un token oculto para este form -->
            @csrf 
            <label>
                RolID
                <input type="text" name="rolID">
            </lable>    
            <button type="submit">Resgitrar Rol</button>
        </form>
</x-app-layout>
