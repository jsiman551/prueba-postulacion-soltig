<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="assets/libraries/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/custom.css">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/ico" href="assets/favicon.ico"/>

    <!-- Jura fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Obras Teatrales!</title>
  </head>
  <body>
    <div class="text-center p-5">
      <h2>Adquiere tu entrada para participar en obras teatrales!</h2>
    </div>

    <ul class="nav nav-tabs justify-content-center" id="buttom-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="disponibles-tab" data-bs-toggle="tab" href="#disponibles" role="tab" aria-controls="disponibles" aria-selected="true">OBRAS CON ENTRADAS DISPONIBLES</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="realizadas-tab" data-bs-toggle="tab" href="#realizadas" role="tab" aria-controls="realizadas" aria-selected="false">VENTAS HECHAS</a>
      </li>
    </ul>
    <div class="tab-content" id="buttom-tabs-content">
      <div class="tab-pane fade show active mb-4 mt-4" id="disponibles" role="tabpanel" aria-labelledby="disponibles-tab">
        <table id="disponibles_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Aforo</th>
                    <th>Disponibles</th>
                    <th>Sala</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Aforo</th>
                    <th>Disponibles</th>
                    <th>Sala</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
      </div>
      <div class="tab-pane fade mb-4 mt-4" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab">
        <table id="ventas_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Número de Venta</th>
                    <th>Código de la Obra</th>
                    <th>Comprador</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Número de Venta</th>
                    <th>Código de la Obra</th>
                    <th>Comprador</th>
                    <th>Fecha</th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>

    <!-- Adquirir Obras Modal -->
    <div class="modal fade" id="disponibles_modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adquirir una entrada</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="assets/scripts/registrar_venta.php">
              <div>
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" name="nombre_completo">
              </div>
              <input type="hidden" class="form-control" id="id_obra" name="id_obra">
              <input type="hidden" class="form-control" id="nro_entradas_disponibles" name="nro_entradas_disponibles">
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-dark mx-auto">Adquirir</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!--js libraries-->
    <script src="assets/libraries/js/jquery-3.5.1.min.js"></script>
    <script src="assets/libraries/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!--renderización de las tablas-->
    <script type="text/javascript">
      /*BACKEND QUE TRAE LA DATA DE OBRAS*/
      $(document).ready(function() {
          $('#disponibles_table').DataTable( {
              "processing": true,
              "serverSide": true,
              "ajax": "assets/libraries/server_processing_obras.php",
              "columnDefs": [
                {  "targets": 6,
                   render: function (data, type, row, meta) {
                      return '<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#disponibles_modal" id="button-modal" name="button-modal" onClick="onClick(' + row[0] + ', ' + row[4] + ')">Adquirir Entrada</button>';
                   }

                }
              ],
              "createdRow": function ( row, data, index ) {
                  var ToDate = new Date(data[2]);
                  var Today = new Date();
                  if ( data[4] == 0 || Today.getTime() > ToDate.getTime()) {
                      $('td', row).addClass('d-none');
                  }
              },
              "language": {
                  "url": 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
              }
          });
          /*BACKEND QUE TRAE LA DATA DE VENTAS*/
          $('#ventas_table').DataTable( {
              "processing": true,
              "serverSide": true,
              "ajax": "assets/libraries/server_processing_ventas.php",
              "language": {
                  "url": 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
              }
          });
      });
      /*captura row id, y la cantidad disponible de la tabla de obras*/
      function onClick(id, disponibles){
        var new_disponibles = disponibles - 1; /*resta 1 entrada*/
        document.getElementById("nro_entradas_disponibles").value = new_disponibles;
        document.getElementById("id_obra").value = id; /*setear el campo oculto de id_obra en el modal, con el id del row de la tabla*/
      }
    </script>
  </body>
</html>