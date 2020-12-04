<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestión de Artículos') }}
        </h2>
    </x-slot>

    <div class="container h-auto mx-auto mt-2">
        <div class="d-flex justify-content-center"> 
            <a class="btn btn-primary" href="{{route('articulo.alta')}}" role="button">Alta de Artículo</a>
        </div> 

        <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">
            <table id="example" class="table table-hover table-bordered" style="width:100%">
                <thead>         
                    <tr class="bg-blue-50">           
                        <th class="text-center w-4">ID</th>
                        <th>Artículo</th>
                        <th class="text-center w-32">Punto de pedido</th>                            
                        <th class="text-center w-28">Stcok actual</th>  
                        <th class="text-center w-32">Acciones</th>  
                        <th class="text-center w-40">Proveedores</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach ($articulos as $a) 
                    <tr>                
                        <td class="text-center">{{$a->ArticuloID}}</td>
                        <td>{{$a->Descripcion}}</td>
                        <td class="text-center">{{$a->Punto_pedido}}</td>  
                        <td class="text-center">{{$a->Stock_disponible}}</td>  
                        <td class="text-center">
                          <!-- Boton trigger modal eliminar -->
                          <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEditar" data-descripcion="{{$a->Descripcion}}">
                            Editar
                          </button>
                          <!-- Boton trigger modal eliminar -->
                          <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalEliminar" data-descripcion="{{$a->Descripcion}}" data-stock="{{$a->Stock_disponible}}">
                              Eliminar
                          </button>
                        </td>
                        <td class="text-center">
                        <a href="{{route('ruta.prueba2',$a->ArticuloID)}}" class="btn btn-outline-info btn-sm">Vincular</a>
                            <!--<a href="{{route('articulo.vincular',$a->ArticuloID)}}" class="btn btn-outline-info btn-sm">Vincular</a>-->
                            <a href="{{route('articulo.desvincular',$a->ArticuloID)}}" class="btn btn-outline-danger btn-sm">Desvincular</a>
                        </td>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">
          ¿Estás seguro que deseas eliminar el siguiente artículo?
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

<!-- Modal editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="descripcion">Descripcion</label>              
        <input class="form-control" type="text" id="descripcion">
        <label for="stock">Stock disponible</label>      
        <input class="form-control block mt-1 w-36" type="number" name="stock" min="0" max="999" id="stock">     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
</div>

@livewireScripts

<!--Script del datatable-->
<script>
  $(document).ready(function (){
    var table = $('#example').DataTable({  
        
      "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },
  
      'columnDefs': [{        
        'searchable':true,
        'orderable':true,
        'width':'2%',
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){
          return '<input type="checkbox">';
        }
      }],     
      'order': [0, 'asc'],        
    });  
  });
</script>

<!--Script del modal eliminar -->
<script> 
 $('#modalEliminar').on('show.bs.modal', function(e) {
    var descripcion = $(e.relatedTarget).data('descripcion');    
    $(".modal-body h5").text(descripcion);
  });
</script>

<!--Script del modal editar -->
<script> 
  $('#modalEditar').on('show.bs.modal', function(e) {
    var descripcion = $(e.relatedTarget).data('descripcion');    
    var stock = $(e.relatedTarget).data('Stock_disponible');    
    $(e.currentTarget).find('input[id="descripcion"]').val(descripcion);
    $(e.currentTarget).find('input[id="stock"]').val(stock);
  });
</script>