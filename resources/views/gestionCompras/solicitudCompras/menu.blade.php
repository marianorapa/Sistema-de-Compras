<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            {{ __('Solicitudes de Compra') }}
        </h2>
    </x-slot>

    <div class="container h-auto mx-auto mt-2">
        <div class="d-flex justify-content-center"> 
            <a class="btn btn-primary" href="{{route('compras.solicitudCompra.selecArticulos')}}" role="button">Alta de Solicitud de Compra</a>
        </div> 

        <div class="container h-auto sm:rounded-md shadow-md mx-auto mt-2 p-2 bg-white">
            <table id="example" class="table table-hover table-bordered" style="width:100%">
                <thead>         
                    <tr class="bg-blue-50">           
                        <th class="text-center w-4">ID</th>
                        <th class="text-center w-32">Fecha de Registro</th>                            
                        <th class="text-center w-28">Acciones</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach ($solicitudes as $s) 
                    <tr>                
                        <td class="text-center">{{$s->SolicitudCompraID}}</td>
                        <td>{{$s->FechaRegistro}}</td>
                        <td></td>
                    </tr>                                   
                @endforeach                  
                </tbody>         
            </table>                      
        </div>   
    </div>

</x-app-layout>



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