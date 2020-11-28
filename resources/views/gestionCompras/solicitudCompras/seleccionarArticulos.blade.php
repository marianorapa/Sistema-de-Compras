
<x-app-layout>
<x-slot name="header">
  <h2 class="font-bold text-xl text-blue-800 leading-tight">
      {{ __('Seleccion de Articulos a Solicitar') }}
  </h2>
</x-slot>
<form action="{{route('compras.solicitudCompra.cantArticulos')}}" method="POST">
  @csrf
  <div class="w-1/2 h-auto sm:rounded-md mx-auto mt-5">
        <div class="d-flex justify-content-start">
            <a class="btn btn-danger" href="{{route('compras.solicitudCompras')}}" role="button">Atras</a>
        </div>
        <p  class="font-italic font-bold m-3 text-center" >Se puede Seleccionar mas de una fila</p>
      <table id="example" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
               
                <th>ID</th>
                <th>Descripción</th>
                <th>Stock Actual</th>
                <th>Punto de Pedido</th>    
                <th></th>     
            </tr>
        </thead>
        <tbody>
          @foreach ($articulos as $a)
            <tr>
                <td>{{$a->ArticuloID}}</td>
                <td>{{$a->Descripcion}}</td>
                <td>{{$a->Stock_disponible}}</td>
                <td>{{$a->Punto_pedido}}</td>        
                <td class="text-center"><input type="checkbox" id="{{$a->ArticuloID}}" name="Articulos[]" value="{{$a->ArticuloID}}"></td>
            </tr>         
             
            @endforeach         
          </tbody>         
        </table>     
      </div>  
      <div class="d-flex justify-contente-center mt-3">
        <button type="submit" class="btn btn-primary"> Seleccionar Articulos</button>
      </div>
</form>
    
</x-app-layout>

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@livewireScripts
<!--<script>
  $(document).ready(function() {
    $('#example').DataTable({
      //activando seleccionables
      /*select:true,
      select:{
          style:'multi'
      },*/
      //columna de checkboxs
     /*columnDefs: [ {
                orderable: false,
                id:"{{$a->ArticuloID}}",
                class:"select-checkbox",
                name:"Articulos[]", 
                value:"{{$a->ArticuloID}}",
                targets: 0
            } ],
            select: {
                style:    'os multi',
                selector: 'td:first-child'
            },*/
      //avisos
      language: {
                select: {
                     rows: {
                         _: "Ud. seleccionó %d filas", //msj cuando todavia no seleccionó nada
                         0: "Haga clic en una fila para seleccionarla.", //aviso
                         1: "Solo 1 fila seleccionada" //aviso
                     }
                 }
             }
      });
  } );
  
</script>-->