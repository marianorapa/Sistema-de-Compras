
<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Seleccion de Articulos a Solicitar') }}
  </h2>
</x-slot>

<div class="w-1/2 h-auto sm:rounded-md mx-auto mt-5">
        <div class="d-flex justify-content-start">
            <a class="btn btn-danger" href="{{route('gestionCompras')}}" role="button">Atras</a>
        </div>
        <div class="flex items-center justify-center mb-3">
            <a href="{{route('compras.solicitudCompra.selecArticulos')}}" class="btn btn-success bg-blue-500 text-white font-bold px-2 py-1 rounded-lg  hover:bg-blue-700">Alta Solicitud de Compras</a>
        </div>
        <table id="example" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
         
            </tr>
        </thead>
        <tbody>
          @foreach ($solicitudes as $s)
            <tr>
                <td>{{$s->SolicitudCompraID}}</td>
                <td>{{$s->FechaRegistro}}</td>
                <td>accion</td>            
            </tr>         
            @endforeach         
          </tbody>         
        </table>     
  </div>      
</div>
</x-app-layout>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@livewireScripts
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  
</script>



