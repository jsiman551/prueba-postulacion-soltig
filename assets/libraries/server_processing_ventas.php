<?php

$table = 'ventas';
 
$primaryKey = 'numero_venta';
 
$columns = array(
    array( 'db' => 'numero_venta', 'dt' => 0 ),
    array( 'db' => 'cod_obra',  'dt' => 1 ),
    array( 'db' => 'comprador',  'dt' => 2 ),
    array( 'db' => 'fecha_compra',     'dt' => 3 )          
);
 

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'teatro',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);