<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Vincular Articulo a Proveedor') }}
        </h2>
    </x-slot>

    <div class="w-1/3 h-auto sm:rounded-md mx-auto mt-20 bg-blue-100 shadow-xl">
        <div class="  bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-10 py-5">
            <!-- Formulario de Alta de Articulo_Proveedor-->
            <div class="container">
                <form action="{{route('articulo.asignarProveedor')}}" method="POST">
                    <!-- Se agrega @csrf para que se genere un token oculto para este form -->
                    @csrf 
                    <div class="mt-4">
                        <x-jet-label for="art_id" value="{{ __('ID Artículo') }}" />
                        <x-jet-input id="art_id" class="block mt-1 w-full" type="text" name="art_id" required/>
                    </div>                    
                    {{--
                    <label>
                        ID Artículo
                        <input type="number" name="art_id">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="prov_id" value="{{ __('ID Proveedor') }}" />
                        <x-jet-input id="prov_id" class="block mt-1 w-full" type="text" name="prov_id" required/>
                    </div>                    
                    {{--
                    <label>
                        ID Proveedor
                        <input type="text" name="tipo_embalaje">
                    </label>
                    --}}
                    
                    <div class="flex items-center justify-end py-4">
                        <x-jet-button class="block mt-1 w-full">
                            {{ __('Vincular Proveedor') }}
                        </x-jet-button>
                    </div>
                    {{--
                    <button type="submit">Vincular Proveedor</button>
                    --}}
                </form>

            </div>
        </div>
    </div>
</x-app-layout>