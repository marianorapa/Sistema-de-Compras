<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Ingresar Cantidad de Aritculos Solicitados') }}
    </h2>
  </x-slot>

  <div class="container h-auto mx-auto mt-4">
    <div class="row">
      <div class="col-4">
        <a class="btn btn-danger" href="{{route('compras.solicitudCompra.selecArticulos')}}" role="button">Atras</a>
      </div>       
      <div class="col-sm-4 overflow-hidden shadow-md sm:rounded-lg bg-white">  
          <h3 class="text-center">Solicitud de Compra:</h3>
          {{--<p class="text-center">ID {{$soli->SolicitudCompraID}}</p>--}}  
          <p class="text-center">Fecha: {{date("Y-n-j")}}</p> 
      </div> 
    </div> 
  </div>

  <form id="frm-example" action="{{route('compras.solicitudCompra.registrarSolicitudCompra')}}" method="POST">
    @csrf 
  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-4 p-3 bg-white">
    <div class="d-flex justify-content-center mt-3"> 
      <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>  
    <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">
              <th></th>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Fecha de Reposicion</th>
              </tr>
          </thead>
          <tbody>
            
            @foreach ($articulos as $a) 
            <tr>
                  <td><input type="hidden" name="ids[]" value="{{$a->ArticuloID}}" ></td>
                  <td class="id">{{$a->ArticuloID}}</td>
                  <td>{{$a->Descripcion}}</td>
                  <td><input type="number" name="cantidades[] "></td>
                  <td><input type="date" name="fechas[]" ></td>
              </tr>                                   
            @endforeach                  
          </tbody>         
        </table>                      
  </div>    
</form>
</x-app-layout>

