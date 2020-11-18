<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Artículo') }}
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
        <form action="{{route('articulo.store')}}" method="POST">
            <!-- Se agrega @csrf para que se genere un token oculto para este form -->
            @csrf 
            <label>
                Descripcion
                <input type="text" name="descripcion">
            </label>
            <label>
                Tipo de Embalaje
                <input type="text" name="tipo_embalaje">
            </label>
            <label>
                Unidad de medida
                <input type="text" name="unidad_medida">
            </label>
            <label>
                Unidad de bulto
                <input type="text" name="unidad_bulto">
            </label>
            <label>
                Punto de pedido
                <input type="text" name="punto_pedido">
            </label>
            <label>
                Stock Disponible
                <input type="text" name="stock_disponible">
            </label>
        
            <button type="submit">Resgitrar Artículo</button>
        </form>

    </div>



</x-app-layout>