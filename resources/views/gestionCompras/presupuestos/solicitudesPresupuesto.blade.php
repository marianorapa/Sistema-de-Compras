<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Solicitudes de Presupuestos') }}
  </h2>
</x-slot>
<div class="container h-auto mx-auto mt-2">
  <div class="row">
      <div class="col-4">
        <a class="btn btn-danger" href="{{route('compras.presupuestos')}}" role="button">Atras</a>
      </div>     
      <div class="col-sm-4 overflow-hidden shadow-md sm:rounded-lg bg-white p-2">  
        <h3 class="text-center">Solicitud de Compra Nº: {{$solicitud}}</h3>
        <br>
        <h5 class="text-grey-500">Estado: {{$estado}}</h5>
        <h5 class="text-grey-500">Fecha de creación: {{$fecha}}</h5>
        </div> 
    </div> 


  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">     
    @if (session('success'))
    <div class="alert alert-success" role="success">
        {{ session('success') }}
    </div> 
    @endif 
        <div class="d-flex justify-content-center"> 
            <a href="{{route('compras.presupuestos.solicitar',$solicitud)}}" class="btn btn-primary btn-sm">Solicitar Presupuesto</a>  
        </div>
      <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">           
                  <th class="text-center w-4" name="id">ID</th>                 
                  <th class="text-center w-48" name="fecha">ID Solicitud Compra</th>                                 
                  <th class="text-center w-16">Fecha de Registro</th>  
                  <th class="text-center w-16">Acciones</th>  
              </tr>
          </thead>
          <tbody> 
          @foreach ($solpresupuestos as $s)            
              <tr>                             
                  <td class="text-center" name="idsp">{{$s->SolicitudPresupuestoID}}</td>
                  <td class="text-center" name="id">{{$s->SolicitudCompraID}}</td>
                  <td class="text-center" name="fecha">{{$s->FechaRegistro}}</td>            
                  <td class="text-center">                                 
                    <a href="{{route('compras.presupuestos')}}" class="btn btn-outline-success btn-sm">Registrar Presupuesto</a>  
                    <a href="{{route('compras.presupuestos.verDetalle',$s->SolicitudPresupuestoID)}}" class="btn btn-outline-danger btn-sm">Ver detalle</a>                      
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
