
<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Vincular Articulo a Proveedor') }}
  </h2>
</x-slot>

<div class="w-1/3 h-auto sm:rounded-md mx-auto mt-5 bg-blue-100 shadow-xl">
  <div class="bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg px-5 py-3">  
      <h3 class="text-center">Artículo</h3>
      <label for="">ID Articulo: </label>
      {{$articulo->ArticuloID}}
      <br>
      <label for="">Descripción: </label>
      {{$articulo->Descripcion}}  
  </div>      
</div>

<div class="w-1/2 h-auto sm:rounded-md mx-auto mt-5">
      <table id="example" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>            
            </tr>
        </thead>
        <tbody>
          @foreach ($proveedores as $p)
              
          
            <tr>
                <td>{{$p->ProveedorID}}</td>
                <td>{{$p->Nombre}}</td>
                <td>{{$p->Razon_social}}</td>
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






