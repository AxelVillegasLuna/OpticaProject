<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';


if(!empty($_GET)){
    if(!empty($_GET['id_orden'])){
        $id = $_GET['id_orden'];
        $orden = encontrarOrden($db, $id);
        $query = $db->prepare("UPDATE ordenes_trabajo SET borrado = 1 WHERE id = $id");
        $query->execute();
        header('Location: cliente.php?id='.urlencode($orden[0]['id_cliente']));
    }
    if(!empty($_GET['id_anteojo'])){
        $id = $_GET['id_anteojo'];
        $anteojo = encontrarAnteojo($db, $id);
        $query = $db->prepare("UPDATE anteojos SET borrado = 1 WHERE id_anteojo = $id");
        $query->execute();
        header('Location: orden.php?id='.urlencode($anteojo[0]['id_orden']));
    }
    
}

?>