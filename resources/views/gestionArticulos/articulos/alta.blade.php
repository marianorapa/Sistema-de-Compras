<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Artículo') }}
        </h2>
    </x-slot>

    <div class="w-1/3 h-auto sm:rounded-md mx-auto mt-20 bg-blue-100 shadow-xl">
        <div class="  bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-10 py-5">
            <!-- Formulario de Alta-->
            <div class="container">
                <form action="{{route('articulo.store')}}" method="POST">
                    <!-- Se agrega @csrf para que se genere un token oculto para este form -->
                    @csrf 

                    
                    <div class="mt-4">
                        <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                        <x-jet-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" required/>
                    </div>                    
                    {{--
                    <label>
                        Descripcion
                        <input type="text" name="descripcion">
                    </label>
                    --}}

                    
                    <div class="mt-4">
                        <x-jet-label for="tipo_embalaje" value="{{ __('Tipo de Embalaje') }}" />
                        <x-jet-input id="tip_embalaje" class="block mt-1 w-full" type="text" name="tipo_embalaje" required/>
                    </div>                    
                    {{--
                    <label>
                        Tipo de Embalaje
                        <input type="text" name="tipo_embalaje">
                    </label>
                    --}}
                    
            
                    <div class="mt-4">
                        <x-jet-label for="unidad_medida" value="{{ __('Unidad de medida') }}" />
                        <x-jet-input id="unidad_medida" class="block mt-1 w-full" type="text" name="unidad_medida" required/>
                    </div>                    
                    {{--
                    <label>
                        Unidad de medida
                        <input type="text" name="unidad_medida">
                    </label>
                    --}}
                    
                    
                    <div class="mt-4">
                        <x-jet-label for="unidad_bulto" value="{{ __('Unidad por bulto') }}" />
                        <x-jet-input id="unidad_bulto" class="block mt-1 w-full" type="number" name="unidad_bulto" required/>
                    </div>
                    {{--
                    <label>
                        Unidad de bulto
                        <input type="text" name="unidad_bulto">
                    </label>
                    --}}
                    
                    <div class="mt-4">
                        <x-jet-label for="punto_pedido" value="{{ __('Punto de Pedido') }}" />
                        <x-jet-input id="punto_pedido" class="block mt-1 w-full" type="number" name="punto_pedido" required/>
                    </div>                    
                    {{--
                    <label>
                        Punto de pedido
                        <input type="text" name="punto_pedido">
                    </label>
                    --}}
                                        
                    <div class="mt-4">
                        <x-jet-label for="stock_disponible" value="{{ __('Stock disponible') }}" />
                        <x-jet-input id="stock_disponible" class="block mt-1 w-full" type="number" name="stock_disponible" required/>
                    </div>                    
                    {{--
                    <label>
                        Stock Disponible
                        <input type="text" name="stock_disponible">
                    </label>
                    --}}
                
                    <div class="flex items-center justify-end py-4">
                        <x-jet-button class="block mt-1 w-full">
                            {{ __('Registrar') }}
                        </x-jet-button>
                    </div>
                    {{--
                    <button type="submit">Resgitrar Artículo</button>
                    --}}
                </form>

            </div>
        </div>
    </div>
</x-app-layout>