<?php

$table = 'obra';

$primaryKey = 'cod_obra';
 
$columns = array(
    array( 'db' => 'cod_obra', 'dt' => 0 ),
    array( 'db' => 'nombre',  'dt' => 1 ),
    array( 'db' => 'fecha_obra',  'dt' => 2 ),
    array( 'db' => 'aforo',     'dt' => 3 ),
    array( 'db' => 'disponibles',     'dt' => 4 ),
    array( 'db' => 'sala',     'dt' => 5 )             
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