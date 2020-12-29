<?php 
// conexion a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'teatro');

/*variables, datos desde el formulario de compra*/
$nombre_usuario = $_POST['nombre_completo'];
$fecha_de_compra = date("Y/m/d");
$id_obra = $_POST['id_obra'];
$nro_entradas_disponibles = $_POST['nro_entradas_disponibles'];

$queryUpdate = "UPDATE obra SET disponibles='$nro_entradas_disponibles' WHERE cod_obra=$id_obra";
mysqli_query($db, $queryUpdate);

/*validar que la actualizacion haya sido existosa*/
 if($queryUpdate) {
	/*inserción a base de datos, tabla ventas*/
	$query = "INSERT INTO ventas (cod_obra, comprador, fecha_compra) 
	  			  VALUES('$id_obra', '$nombre_usuario', '$fecha_de_compra')";
	mysqli_query($db, $query);

	/*validación y volver al index*/
	 if($query) {
	 	$url = '/prueba_tecnica_jose_simancas';
	 	$last_id = mysqli_insert_id($db);
	 	$message = 'Su número de Venta es: '. $last_id; /*mostrar número de venta al usuario*/
  		echo "<script>
	        alert('$message')
	        window.location.replace('$url');
	    </script>";
	 } else {
	 	print "Algo no está funcionando bien.";
	 }
 } else {
 	print "Algo no está funcionando bien.";
 }
?>