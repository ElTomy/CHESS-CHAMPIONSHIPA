<?php
include '../../servidor.php';
session_start();
$server= new servidor();
$info = $server->BuscoUsuarioOnline();
$partidos = $server->TraigoPartidos();
$partidoEncontrado = false;
$encontrado = false;

//:BUSCO SI ESTA CONECTADO EL JUGADOR 2
foreach ($partidos as $buscoPartido) {
    if($buscoPartido['usu1'] == $_SESSION['usuario'] || $buscoPartido['usu2'] == $_SESSION['usuario']){
     $partidoEncontrado = true;
     if($buscoPartido['usu1'] == $_SESSION['usuario']){
            $jugador2 = $buscoPartido['usu2'];
     }else{
            $jugador2 = $buscoPartido['usu1'];
     }
    }
}
if($jugador2 == null){
    $encontrado = null;
}else{
    foreach ($info as $jug2) {
        if($jug2['Usuario'] == $jugador2){
         $encontrado = true;
         break;
        }
    }
}
echo json_encode($encontrado); 
?>