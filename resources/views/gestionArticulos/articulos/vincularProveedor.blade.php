<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Vincular Articulo a Proveedor') }}
    </h2>
  </x-slot>

  <div class="container h-auto mx-auto mt-4">
    <div class="row">
      <div class="col-4">
        <a class="btn btn-danger" href="" role="button">Atras</a>
      </div>       
      <div class="col-sm-4 overflow-hidden shadow-md sm:rounded-lg bg-white">  
          <h3 class="text-center">Artículo</h3>
          <p class="text-center">ID Articulo: {{$articulo->ArticuloID}}</p>    
          <p class="text-center">Descripción: {{$articulo->Descripcion}}</p> 
      </div> 
    </div> 
  </div>

  <form action={{route('articulo.asignarProveedor',$articulo->ArticuloID)}} method="POST">
    @csrf 
  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-4 p-3 bg-white">
    <table id="example" class="table table-hover table-bordered" style="width:100%">
          <thead>         
              <tr class="bg-blue-50">
                  <th>ID Proveedor</th>
                  <th>Proveedor</th>
                  <th>Razón Social</th>
                  <th class="text-center">Seleccionar</th>            
              </tr>
          </thead>
          <tbody>
            @foreach ($proveedores as $p) 
              <tr>
                  <td>{{$p->ProveedorID}}</td>
                  <td>{{$p->Nombre}}</td>
                  <td>{{$p->Razon_social}}</td>
                  <td class="text-center"><input type="checkbox" id="{{$p->ProveedorID}}" name="ProveedorID[]" value="{{$p->ProveedorID}}"></td>            
              </tr>                                   
            @endforeach                  
          </tbody>         
        </table>                      
  </div>    
  <div class="d-flex justify-content-center mt-3"> 
    <button type="submit" class="btn btn-primary">Vincular</button>
  </div>  
</form> 

</x-app-layout>

@livewireScripts
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>






