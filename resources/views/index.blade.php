<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>Laravel CRUD</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/modal.css">
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4"><h2>Historial de ventas</h2></div>
                        <div class="col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                      <div class="col-sm-2">
                                <input type="button" data-toggle="modal" href="#myModal" class="btn btn-info" placeholder="Search&hellip;" value="Registrar Venta">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha </th>
                            <th>Mes</th>
                            <th>No. Vendedor </th>
                            <th>Vendedor</th>
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Compra</th>
                            <th>Movimiento</th>
                            <th>Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($data['ventas'] as $venta) 
                            <tr>
                                <td>{{$venta->idVenta}}</td>
                                <td>{{$venta->fechaVenta}}</td>
                                <td>{{$venta->fechaVenta}}</td>
                                <td>{{$venta->idVendedorVenta_id}}</td>
                                <td>{{$venta->vendedor->nombreVendedor}}</td>
                                <td>{{$venta->categoria->nombreCategoria}}</td>
                                <td>{{$venta->producto->nombreProducto}}</td>
                                <td>{{$venta->cantidadVenta}}</td>
                                <td>{{$venta->cantidadTotalVenta}}</td>
                                <td>{{$venta->movimientoVenta}}</td>
                                <td>{{$venta->idClienteVenta_id}}</td>
                                <td>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <button onclick="buttonDelete('{{$venta->idVenta}}')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tr>        
                    </tbody>
                </table>
            </div>
        </div>        
    </div>  
    
    <!-- modal -->
    <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg contact-modal">
		<div class="modal-content">
            <form action="{{route('ventas.create')}}" method="post">
                @csrf
                @method('post')
                <div class="modal-header">				
                    <h4 class="modal-title">Ingresa los datos solicitados</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" class="form-control" id="dateInput" name="dateInput" placeholder="date" /*required*/>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="cantidadInput" name="cantidadInput" placeholder="Cantidad" min="1" vaue="1" /*required*/>
                            </div>
                           <div class="form-group">
                                <input type="text" class="form-control .d-none" id="CantidadProducto" name="CantidadProducto" placeholder="CantidadProducto" value="20" /*required*/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="cantidadTotalInput" name="cantidadTotalInput" placeholder="CantidadTotal" value="1" disabled /*required*/>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="movimientoInput" name="movimientoInput" /*required*/>
                                    <option value="-1" disabled default> Movimiento</option>
                                    <option value="0">Venta Interna</option>
                                    <option value="1">Venta Externa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="categoriaInput" name="categoriaInput" /*required*/>
                                    <option value="-1" disabled default> Categoria</option>
                                    @foreach ($data['categorias'] as $categoria)
                                        <option value = "{{$categoria->idCategoria}}">{{$categoria->nombreCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="productoInput" name="productoInput" /*required*/>
                                    <option value="-1" disabled default> Producto</option>
                                    @foreach ($data['productos'] as $producto)
                                        <option value = "{{$producto->idProducto}}">{{$producto->nombreProducto}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="vendedorInput" name="vendedorInput" /*required*/>
                                    <option value="-1" disabled default> Vendedor</option>
                                    @foreach ($data['vendedores'] as $vendedor)
                                        <option value = "{{$vendedor->idVendedor}}">{{$vendedor->nombreVendedor}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="clienteInput" name="clienteInput" /*required*/>
                                    <option value="-1" disabled default> Cliente</option>
                                    @foreach ($data['clientes'] as $cliente)
                                        <option value = "{{$cliente->idCliente}}">{{$cliente->nombreCliente}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                        <input type="button" class="btn btn-link" data-dismiss="modal" value="Salir">
                    	<input type="submit" class="btn btn-primary" value="Enviar">
                </div>
                <script type="text/javascript">
                    const calculo = document.getElementById('cantidadInput');
                    const precioProducto = document.getElementById('CantidadProducto');
                    const totalVenta = document.getElementById('cantidadTotalInput');
                    let total = 0;
                    calculo.addEventListener("keyup", (e) => {
                        total = e.target.value * precioProducto.value;
                        totalVenta.value = total;
                    });
                    document.getElementById('dateInput').valueAsDate = new Date();
                    const buttonDelete = (id) => {
                        fetch(`/ventas/delete/${id}`,{
                            method:"DELETE",
                            headers:{
                                "X-CSRF-TOKEN": document.querySelector("meta[name=csrf-token]").content
                            }
                        })
                        .then(response => {
                            if(!response.ok){
                                return;
                            }
                            location.reload();
                        });
                    }
                    
                </script>
            </form>
		</div>
	</div>
</div>
</body>
</html>