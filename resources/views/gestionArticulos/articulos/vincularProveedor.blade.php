<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-blue-800 leading-tight">
        {{ __('Vincular Proveedores') }}
    </h2>
  </x-slot>

  <div class="container h-auto mx-auto mt-4">
    <div class="row">
      <div class="col-4">
        <a class="btn btn-danger" href="{{route('gestionArticulos.menu')}}" role="button">Atras</a>
      </div>       
      <div class="col-sm-4 overflow-hidden shadow-md sm:rounded-lg bg-white">  
          <h3 class="text-center">Artículo</h3>
          <p class="text-center">ID Articulo: {{$articulo->ArticuloID}}</p>    
          <p class="text-center">Descripción: {{$articulo->Descripcion}}</p> 
      </div> 
    </div> 
  </div>

  <form id="frm-example" action={{route('gestionArticulos.asignarProveedor',$articulo->ArticuloID)}} method="POST">
  @csrf 
  <div class="d-flex justify-content-center mt-3"> 
    <button type="submit" class="btn btn-primary">Vincular</button>
  </div> 
  <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-3 bg-white">
    <table id="example" class="table table-hover table-bordered" style="width:100%">
      <p style="text-align:center; color:grey"><i>Seleccione los proveedores a vincular</i></p>
          <thead>         
              <tr class="bg-blue-50">
                <th><input name="select_all" value="1" type="checkbox"></th>  
                <th class="text-center w-10">ID</th>
                <th>Proveedor</th>
                <th>Razón Social</th>                            
              </tr>
          </thead>
          <tbody>
            @foreach ($proveedores as $p) 
              <tr>
                <td></td>
                <td class="text-center">{{$p->ProveedorID}}</td>
                <td>{{$p->Nombre}}</td>
                <td>{{$p->Razon_social}}</td>  
              </tr>                                   
            @endforeach                  
          </tbody>         
        </table>                      
  </div>     
</form> 

</x-app-layout>

@livewireScripts

<script>
  
  function updateDataTableSelectAllCtrl(table){
    var $table             = table.table().node();
    var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
    var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
    var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

    // If none of the checkboxes are checked
    if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
          chkbox_select_all.indeterminate = false;
      }
    }
    // If all of the checkboxes are checked
    else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
        chkbox_select_all.indeterminate = false;
      }
    }
    // If some of the checkboxes are checked
    else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
        chkbox_select_all.indeterminate = true;
      }
    }
  }

  $(document).ready(function (){
    
    // Array holding selected row IDs
    var rows_selected = [];

    var table = $('#example').DataTable({  
      
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
      },

      'columnDefs': [{
        'targets': 0,     
        'searchable':false,
        'orderable':false,
        'width':'2%',
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){
          return '<input type="checkbox">';         
        }
      }],     

      'order': [1, 'asc'],

      'rowCallback': function(row, data, dataIndex){
        // Get row ID
        var rowId = data[1];

        // If row ID is in the list of selected row IDs
        if($.inArray(rowId, rows_selected) !== -1){
          $(row).find('input[type="checkbox"]').prop('checked', true);
          $(row).addClass('selected');
        }
      }

    });

    // Handle click on checkbox
    $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[1];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
        rows_selected.push(rowId);
      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      }else if (!this.checked && index !== -1){
        rows_selected.splice(index, 1);
      }

      if(this.checked){
        $row.addClass('selected');
      }else {
        $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
    });

    // Handle click on table cells with checkboxes
    $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    // Handle click on "Select all" control
    $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
        $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      }else {
        $('#example tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
    });

    // Handle table draw event
    table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
    });
      
    // Handle form submission event 
    $('#frm-example').on('submit', function(e){
      var form = this;

        // Iterate over all selected checkboxes
        $.each(rows_selected, function(index, rowId){
          // Create a hidden element 
          $(form).append(
            $('<input>')
              .attr('type', 'hidden')
              .attr('name', 'id[]')
              .val(rowId)
          );
        });

      });

    });
  
</script>






