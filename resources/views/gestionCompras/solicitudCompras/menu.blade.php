<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Seleccion de Articulos a Solicitar') }}
  </h2>
</x-slot>
<div class="container h-auto mx-auto mt-2">
  <div class="d-flex justify-content-center"> 
      <a class="btn btn-primary" href="{{route('compras.solicitudCompra.selecArticulos')}}" role="button">Alta de Solicitud de Compra</a>
  </div> 

  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">
      <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">           
                  <th class="text-center w-4">ID</th>                 
                  <th class="text-center w-32">Fecha de Registro</th>                                 
                  <th class="text-center w-32">Acciones</th>  
              </tr>
          </thead>
          <tbody>
          @foreach ($solicitudes as $s) 
              <tr>                
                  <td class="text-center">{{$s->SolicitudCompraID}}</td>
                  <td>{{$s->FechaRegistro}}</td>            
                  <td class="text-center">
                    <!-- Boton trigger modal eliminar -->
                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEditar">
                      Editar
                    </button>
                    <!-- Boton trigger modal eliminar -->
                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                        Eliminar
                    </button>
                  </td>                 
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



