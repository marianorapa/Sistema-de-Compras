<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Gestión de Artículos') }}
        </h2>
    </x-slot>

    <div class="container-lg mx-auto mt-2">
        <div class="d-flex justify-content-center"> 
            <a class="btn btn-primary" href="{{route('articulo.alta')}}" role="button">Alta de Artículo</a>
        </div> 

        <div class="container-lg sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">
            <table id="example" class="table table-hover table-bordered" style="width:100%">
                <thead>         
                    <tr class="bg-blue-50">           
                        <th class="text-center w-2">ID</th>
                        <th class="w-40">Artículo</th>
                        <th class="text-center w-20">Embalaje</th> 
                        <th class="text-center w-12">U. de medida</th> 
                        <th class="text-center w-12">U. por bulto</th>
                        <th class="text-center w-12">Punto pedido</th>                            
                        <th class="text-center w-10">Stcok</th>  
                        <th class="text-center w-32">Acciones</th>  
                        <th class="text-center w-40">Proveedores</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach ($articulos as $a) 
                    <tr>                
                        <td class="text-center">{{$a->ArticuloID}}</td>                        
                        <td>{{$a->Descripcion}}</td>
                        <td>{{$a->Tipo_embalaje}}</td>
                        <td>{{$a->Unidad_medida}}</td>
                        <td class="text-center">{{$a->Unidad_bulto}}</td>
                        <td class="text-center">{{$a->Punto_pedido}}</td>  
                        <td class="text-center">{{$a->Stock_disponible}}</td>  
                        <td class="text-center">
                          <!-- Boton trigger modal eliminar -->
                          <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalEditar">
                            Editar
                          </button>
                          <!-- Boton trigger modal eliminar -->
                          <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalEliminar" data-descripcion="{{$a->Descripcion}}" data-stock="{{$a->Stock_disponible}}">
                              Eliminar
                          </button>
                        </td>
                        <td class="text-center">
                            <a href="{{route('articulo.vincular',$a->ArticuloID)}}" class="btn btn-outline-info btn-sm">Vincular</a>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Editar artículo </h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action={{route('articulo.editar',$a->ArticuloID)}} method="POST">
        @csrf 
      <div class="modal-body">            
        <div class="form-group row">
          <div class="col-xs-4 ml-3">
            <label for="#id">ID Artículo</label>  
          <h3 class="form-control" id="Articulo">{{$a->ArticuloID}}</h3>                          
          </div>
          <div class="col">
            <label for="#descripcion">Descripcion</label>              
            <input class="form-control" type="text" id="descripcion" name="descripcion" size="50" required>              
          </div>
        </div>   
        <div class="form-group row">
          <div class="col">
            <label for="#tipo_embalaje">Tipo de embalaje</label>
              <select name="tipo_embalaje" class="form-select rounded-md shadow-sm mt-2" required>                       
                <option value="Bolsa">Bolsa</option> 
                <option value="Caja">Caja</option> 
                <option value="Sin embalaje">Sin embalaje</option>                            
              </select> 
          </div>                   
          <div class="col">            
            <label for="#unidad_medida">Unidad de Medida</label>
              <select name="unidad_medida" class="form-select rounded-md shadow-sm mt-1 w-36" required>
                <option value="Unidad">Unidad</option> 
                <option value="Metro">Metro</option> 
                <option value="Kilogramo">Kilogramo</option>
                <option value="Litro">Litro</option>                                                        
                <option value="Sin unidad">Sin unidad</option>
              </select>
          </div>         
        </div>      
        <div class="form-group row">     
          <div class="col">
            <label for="#stock">Stock</label>
            <input class="form-control" type="number" id="stock" name="stock" min="0" max="100">  
          </div>
          <div class="col">
            <label for="#punto_pedido">Punto de pedido</label>
            <input class="form-control" type="number" id="punto_pedido" name="punto_pedido" min="0" max="100">  
          </div>            
        </div> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>        
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
    </form>
    </div>
  </div>
</div>

 

@livewireStyles

<style type="text/css">
#stock,#punto_pedido {
  width: 5em;
}
</style>

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
    var id = $(e.relatedTarget).data('id');  
    var descripcion = $(e.relatedTarget).data('descripcion');      
    var stock = $(e.relatedTarget).data('stock');    
    var punto_pedido =   $(e.relatedTarget).data('punto_pedido');  
    //$(".modal-body h3").text(id);
    $(e.currentTarget).find('#descripcion').val(descripcion);
    $(e.currentTarget).find('#stock').val(stock);
    $(e.currentTarget).find('#punto_pedido').val(punto_pedido);
  });
</script>


