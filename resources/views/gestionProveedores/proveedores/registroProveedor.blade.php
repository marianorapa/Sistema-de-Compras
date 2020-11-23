<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Alta de Proveedor') }}
        </h2>
    </x-slot>
    
    <!-- Formulario de Alta-->
    <div class="w-1/3 h-auto sm:rounded-md mx-auto mt-5 bg-blue-100 shadow-xl">
        <div class="  bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-10 py-5">
            <div class="container">
                <form action="{{route('proveedor.store')}}" method="POST">
                    <!-- Se agrega @csrf para que se genere un token oculto para este form -->
                    @csrf 

                    <div class="mt-4">
                        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required/>
                    </div>   
                    {{--
                    <label>
                        Nombre
                        <input type="text" name="nombre">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="razon_social" value="{{ __('Razon social') }}" />
                        <x-jet-input id="razon_social" class="block mt-1 w-full" type="text" name="razon_social" required/>
                    </div> 
                    {{--
                    <label>
                        Razon Social
                        <input type="text" name="razon_social">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="cuit" value="{{ __('CUIT') }}" />
                        <x-jet-input id="cuit" class="block mt-1 w-full" type="text" name="cuit" required/>
                    </div> 
                    {{--
                    <label>
                        CUIT
                        <input type="text" name="cuit">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="iva" value="{{ __('Condición IVA') }}" />
                        <x-jet-input id="iva" class="block mt-1 w-full" type="text" name="iva" required/>
                    </div>
                    {{--
                    <label>
                        Condición Iva
                        <input type="text" name="iva">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="telefono" value="{{ __('Telefono') }}" />
                        <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" required/>
                    </div> 
                    {{--
                    <label>
                        Teléfono
                        <input type="tel" name="telefono">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="direc" value="{{ __('Dirección') }}" />
                        <x-jet-input id="direc" class="block mt-1 w-full" type="text" name="direc" required/>
                    </div> 
                    {{--
                    <label>
                        Dirección
                        <input type="text" name="direc">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="loc" value="{{ __('Localidad') }}" />
                        <x-jet-input id="loc" class="block mt-1 w-full" type="text" name="loc" required/>
                    </div> 
                    {{--
                    <label>
                        Localidad
                        <input type="text" name="loc">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="prov" value="{{ __('Provincia') }}" />
                        <x-jet-input id="prov" class="block mt-1 w-full" type="text" name="prov" required/>
                    </div> 
                    {{--
                    <label>
                        Provincia
                        <input type="text" name="prov">
                    </label>
                    --}}

                    <div class="mt-4">
                        <x-jet-label for="mail" value="{{ __('Email') }}" />
                        <x-jet-input id="mail" class="block mt-1 w-full" type="text" name="mail" required/>
                    </div> 
                    {{--
                    <label>
                        E-mail
                        <input type="email" name="mail">
                    </label>
                    --}}

                   <div class="flex items-center justify-end py-4">
                        <x-jet-button class="block mt-1 w-full">
                            {{ __('Registrar') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>