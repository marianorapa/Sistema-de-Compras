<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Editar Detalles Solicitud de Compras') }}
  </h2>
</x-slot>

<div class="container h-auto mx-auto mt-4">
  <div class="row">
      <div class="col-4">
        <a class="btn btn-danger" href="{{route('compras.solicitudCompras')}}" role="button">Atras</a>
      </div>     
      <div class="col-sm-4 overflow-hidden shadow-md sm:rounded-lg bg-white p-2">  
        <h3 class="text-center">Solicitud de Compra Nº: {{$solicitud}}</h3>
        <br>
        <h5 class="text-grey-500">Estado: {{$estado}}</h5>
        <h5 class="text-grey-500">Fecha de creación: {{$fecha}}</h5>
        </div> 
    </div> 
  </div>

  <form id="frm-example" action="{{route('compras.solicitudCompra.actualizar',$solicitud)}}" method="POST">
    @csrf 
    @method('put')
    <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-4 p-3 bg-white">
        <div class="d-flex justify-content-center"> 
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">         
                  <th>ID</th>                 
                  <th>Descripción</th>                                 
                  <th>Cantidad</th>  
                  <th>Fecha Estamida</th>
                  <th>Nueva Cantidad</th>  
                  <th>Nueva Fecha Estamida</th>  
              </tr>
          </thead>
          <tbody>
          @foreach ($detalle as $d) 
              <tr>     
                  <input type="hidden" name="ids[]" value="{{$d->ArticuloID}}" >       
                  <td>{{$d->ArticuloID}}</td>
                  <td>{{$d->Descripcion}}</td>   
                  <td>{{$d->Cantidad}}</td>                        
                  <td>{{$d->FechaResposicionEstimada}}</td>
                  <td><input type="number" name="cantidades[] " value="{{$d->Cantidad}}"></td>
                  <td><input type="date" name="fechas[]"  value="{{$d->FechaResposicionEstimada}}"></td>
              </tr>                                   
          @endforeach                  
          </tbody>         
      </table>                      
    </div>    
</form>
</div>

</x-app-layout>

