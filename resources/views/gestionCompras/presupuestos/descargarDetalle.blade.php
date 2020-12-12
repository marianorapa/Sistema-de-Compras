<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Presupuesto</title>
    
    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center font-italic">Solicitud de Presupuesto Nº</h3>
        </div> 
        <div class="row">
            <div class="col-8">.col-md-8</div>
            <div class="col-4">.col-md-4</div>
        </div>
            {{--<div class="col-5">
                <h6>Cooperativa de Agua Potable</h6>
                <h6>y OSP Suipacha Ltda.</h6>
                <h6>Belgrano Nº 318</h6>
                <h6>Suipacha</h6>
                <h6>Tel.: 02324-480406/480600</h6>
                <h6>Email: compras@coopaguasuipacha.com.ar</h6>

            </div>     
            --}}
        
    
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr class="bg-blue-50">      
                        <th class="text-center w-4" >ID</th>
                        <th class="text-center w-20" >Descripción</th>   
                        <th class="text-center w-4" >Cantidad</th>                                                                                                   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $d)            
                    <tr>                            
                    <td class="text-center" name="">{{$d->ArticuloID}}</td>
                    <td class="text-center" name="">{{$d->Descripcion}}</td>
                    <td class="text-center" name="">{{$d->Cantidad}}</td>                                  
                    </tr>                                                 
                @endforeach  
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>



