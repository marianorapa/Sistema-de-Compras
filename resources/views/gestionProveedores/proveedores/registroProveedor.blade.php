<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Proveedor') }}
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
        <form action="{{route('proveedor.store')}}" method="POST">
            <!-- Se agrega @csrf para que se genere un token oculto para este form -->
            @csrf 
            <label>
                Nombre
                <input type="text" name="nombre">
            </label>
            <label>
                Razon Social
                <input type="text" name="razon_social">
            </label>
            <label>
                CUIT
                <input type="text" name="cuit">
            </label>
            <label>
                Condición Iva
                <input type="text" name="iva">
            </label>
            <label>
                Teléfono
                <input type="tel" name="telefono">
            </label>
            <label>
                Dirección
                <input type="text" name="direc">
            </label>
            <label>
                Localidad
                <input type="text" name="loc">
            </label>
            <label>
                Provincia
                <input type="text" name="prov">
            </label>
            <label>
                E-mail
                <input type="email" name="mail">
            </label>
            <button type="submit">Resgitrar Proveedor</button>
        </form>

    </div>



</x-app-layout>