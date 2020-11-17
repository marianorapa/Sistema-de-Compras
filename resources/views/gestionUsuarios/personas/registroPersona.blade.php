<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Persona') }}
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
        <form action="{{route('persona.store')}}" method="POST">
            <!-- Se agrega @csrf para que se genere un token oculto para este form -->
            @csrf 
            <label>
                Legajo
                <input type="text" name="legajo">
            </label>
            <label>
                Nombre
                <input type="text" name="nombre">
            </label>
            <label>
                Apellido
                <input type="text" name="apellido">
            </label>
            <label>
                DNI
                <input type="text" name="dni">
            </label>
            <label>
                Cuil
                <input type="text" name="cuil">
            </label>
            <label>
                Teléfono
                <input type="tel" name="telefono">
            </label>
            <label>
                E-mail
                <input type="email" name="mail">
            </label>
            <label>
                Dirección
                <input type="text" name="dir">
            </label>
            <button type="submit">Resgitrar Persona</button>
        </form>

    </div>



</x-app-layout>