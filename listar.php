<?php
include 'conectar.php';

$sql="select * from sirbho";

$bolsa=$cnx->query($sql);

$datos=array();

while($f=$bolsa->fetchArray(SQLITE3_ASSOC)){
	$datos[]=$f;
}

$cnx->close();

//var_dump($datos);

$jsonpersonas=json_encode($datos);
?>