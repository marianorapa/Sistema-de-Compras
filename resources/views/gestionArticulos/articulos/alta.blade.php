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
                        <x-jet-input  id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" required/>                                                 
                    </div>                                  
                    
                    <div class="mt-4">
                        <x-jet-label for="tipo_embalaje" value="{{ __('Tipo de Embalaje') }}" />
                        <select name="tipo_embalaje" class="form-select rounded-md shadow-sm mt-1" required>
                            <option value="Bolsa">Bolsa</option> 
                            <option value="Caja">Caja</option> 
                            <option value="Sin embalaje">Sin embalaje</option>                            
                        </select>                                   
                    </div>                                                        
            
                    <div class="mt-4">
                        <x-jet-label for="unidad_medida" value="{{ __('Unidad de medida') }}" />
                        <select name="unidad_medida" class="form-select rounded-md shadow-sm mt-1 w-36" required>
                            <option value="Unidad">Unidad</option> 
                            <option value="Metro">Metro</option> 
                            <option value="Kilogramo">Kilogramo</option>
                            <option value="Litro">Litro</option>                                                        
                            <option value="Sin unidad">Sin unidad</option>
                        </select>
                    </div>                                      
                                   
                    <div class="mt-4">
                        <x-jet-label for="unidad_bulto" value="{{ __('Unidad por bulto') }}" />
                        <x-jet-input id="unidad_bulto" class="block mt-1 w-36" type="number" name="unidad_bulto"  min="0" max="100"/>
                    </div>                 
                    
                    <div class="mt-4">
                        <x-jet-label for="punto_pedido" value="{{ __('Punto de Pedido') }}" />
                        <x-jet-input id="punto_pedido" class="block mt-1 w-36" type="number" name="punto_pedido" min="0" max="100" required/>
                    </div>                    
                                  
                    <div class="mt-4">
                        <x-jet-label for="stock_disponible" value="{{ __('Stock disponible') }}" />
                        <x-jet-input id="stock_disponible" class="block mt-1 w-36" type="number" name="stock_disponible" min="0" max="999" required/>
                    </div>                    
              
                    <div class="flex items-center justify-end py-4">
                        <x-jet-button class="block mt-1 w-full">
                            {{('Registrar')}}
                        </x-jet-button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</x-app-layout>