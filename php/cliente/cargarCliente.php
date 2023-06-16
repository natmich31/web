<?php
require_once '../config.php';
header("Content-Type: text/html;charset=utf-8");

$valido['success']=array('success'=>false, 
'mensaje'=>"",
'id_cliente'=>"",
'nombre'=>"",
'ap'=>"",
'am'=>"",
'telefono'=>"",
'correo'=>"");

if($_POST){
    $id=$_POST['contactoid'];
    $sql="SELECT * FROM contacto WHERE contactoid=$id";
    $resultado=$cx->query($sql);
    $row=$resultado->fetch_array();
    $valido['success']=true;
    $valido['mensaje']="SE ENCONTRO REGISTRO";
    $valido['nombre']=$row[0];
    $valido['municipio']=$row[1];
    $valido['telefono']=$row[4];
}else{
    $valido['success']=false;
    $valido['mensaje']="ERROR AL CARGAR CONTACTO";
}
$cx->close();
echo json_encode($valido);

?>