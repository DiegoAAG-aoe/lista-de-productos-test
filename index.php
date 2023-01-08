<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="formatos_css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <title>Start up</title>
</head>
<br></br>
<body>
    <div class=text-center>
        <h4 class="h4t">Listado de Productos</h4>
    </div>
    <div class="container" style="margin-top: 10px;padding: 5px">

	<table id="DAAG" style="width:100%; border-color: transparent;">
	
		<!-- The tables header -->
		<thead>
                <tr>
                    <th style="border-color: transparent; text-align: center; border-radius: 2px;">ID</th>
                    <th style="border-color: transparent; text-align: center;">Nombre</th>
                    <th style="border-color: transparent; text-align: center;">Descripción</th>
                    <th style="border-color: transparent; text-align: center;">Imagen</th>
                    <th style="border-color: transparent; text-align: center;">Precio</th>
                    <th style="border-color: transparent; text-align: center;">Fecha Creación</th>
                    <th style="border-color: transparent; text-align: center; border-radius: 2px;">Última Actualización</th>
                </tr>
            </thead>
		<?php
		$json_data = file_get_contents("products.json");
		$products = json_decode($json_data, true);

		if(count($products) != 0 ){
			foreach($products as $product){
				if ($product['status'] == 'visible') {
					?>
				<tr>
                <td> <?php echo $product['id'] ?> </td>
				<td> <?php echo $product['name'] ?> </td>
				<td> <?php echo $product['description'] ?> </td>
				<td> <img src="<?php echo $product['image'] ?>" alt=""> </td>
				<td> <?php echo $product['price'] ?> </td>
				<td> <?php echo $product['created_at'] ?> </td>
				<td> <?php echo $product['updated_at'] ?> </td>
			</tr>
				
				<?php
				}
			}
		}
		?>
	</table>
	<br></br>
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <script src="jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#DAAG').DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de  _MENU_  items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }

                },

                scrollY: 700,
                lengthMenu: [
                    [12, 24, -1],
                    [12, 24, "All"]
                ],
                searchPanes: {
                    cascadePanes: true,
                    dtOpts: {
                        dom: 'tp',
                        paging: 'true',
                        pagingType: 'simple',
                        searching: false
                    }
                },
                dom: 'Pfrtip',
                columnDefs: [{
                    searchPanes: {
                        show: true
                    },
                    targets: [0]
                }]
            });
        });
    </script>
</body>

</html>