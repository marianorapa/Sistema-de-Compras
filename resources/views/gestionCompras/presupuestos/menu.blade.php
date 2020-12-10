<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Presupuestos - Solicitudes de Compra Registradas') }}
  </h2>
</x-slot>
<div class="container h-auto mx-auto mt-2">
  <div class="row">  
    <div class="col-4">
      <a class="btn btn-danger" href="{{route('gestionCompras')}}" role="button">Atras</a>
    </div>    
  </div> 
  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">     
    @if (session('success'))
    <div class="alert alert-success" role="success">
        {{ session('success') }}
    </div> 
    @endif 
      <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">           
                  <th class="text-center w-4" name="id">ID</th>                 
                  <th class="text-center w-48" name="fecha">Fecha de Registro</th>                                 
                  <th class="text-center w-16">Acciones</th>  
              </tr>
          </thead>
          <tbody> 
          @foreach ($solicitudes as $s)            
              <tr>                             
                  <input id="id" name="id" type="hidden" value="{{$s->SolicitudCompraID}}">
                  <td class="text-center" name="id">{{$s->SolicitudCompraID}}</td>
                  <td class="text-center" name="fecha">{{$s->FechaRegistro}}</td>            
                  <td class="text-center">                 
                  <!-- Boton trigger modal eliminar -->
                  <a href="{{route('compras.presupuestos')}}" class="btn btn-outline-success btn-sm">Presupuestos Registrados</a>
                  <a href="{{route('compras.presupuestos.solicitar',$s->SolicitudCompraID)}}" class="btn btn-outline-danger btn-sm">Solicitudes de Presupuesto</a>    
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


<!--Script del datatable-->
<script>
  $(document).ready(function (){ 
    var table = $('#example').DataTable({  
      "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },      
    });  
  });
</script>

<!--Script del modal eliminar -->
<script> 
 $('#modalEliminar').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('descripcion');    
    $(e.currentTarget).find('#id').val(id);
  });
</script>
