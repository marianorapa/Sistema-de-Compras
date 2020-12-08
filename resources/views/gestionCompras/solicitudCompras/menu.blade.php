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
                  <th>ID</th>                 
                  <th>Fecha de Registro</th>                                 
                  <th>Acciones</th>  
              </tr>
          </thead>
          <tbody>
          @foreach ($solicitudes as $s) 
              <tr>
                <form id="frm-example" action="{{route('compras.solicitudCompra.editarSolicitudCompra')}}" method="POST">
                  @csrf 
                  <input type="hidden" name="solicitudID" value="{{$s->SolicitudCompraID}}">                
                  <td>{{$s->SolicitudCompraID}}</td>
                  <td>{{$s->FechaRegistro}}</td>            
                  <td>
                    <!-- Boton trigger modal eliminar -->
                    <button type="submit" class="btn btn-outline-info btn-sm">
                      Editar
                    </button>
                    <!-- Boton trigger modal eliminar -->
                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                        Eliminar
                    </button>
                  </td> 
                </form>                 
              </tr>                                   
          @endforeach                  
          </tbody>         
      </table>                      
      </div>    

</div>

</x-app-layout>

<!-- Modal eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Solicitud de Compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">
          ¿Estás seguro que deseas eliminar la siguiente Solicitud de Compra?
        </p>
        <h5 class="text-center"></h5>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@livewireScripts
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  
</script>

<!--Script del modal eliminar -->
<script> 
 $('#modalEliminar').on('show.bs.modal', function(e) {
    var descripcion = $(e.relatedTarget).data('descripcion');    
    $(".modal-body h5").text(descripcion);
  });
</script>



