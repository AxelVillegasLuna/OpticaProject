<?php

function listarClientes($db){
    $query = $db->prepare("SELECT * FROM clientes WHERE borrado != 1 ORDER BY nombre ASC");
    $query->execute();
    $clientes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $clientes;
}

function encontrarCliente($db, $id){
    $query = $db->prepare("SELECT * FROM clientes WHERE id_cliente = $id");
    $query->execute();
    $cliente = $query->fetchAll(PDO::FETCH_ASSOC);
    return $cliente;
}

function listarOrdenes($db, $id){
    $query = $db->prepare("SELECT id, seña, montoTotal, id_cliente, DATE_FORMAT(fechaEntrada, '%d/%m/%Y') AS fechaEntrada, DATE_FORMAT(fechaSalida, '%d/%m/%Y') AS fechaSalida FROM ordenes_trabajo WHERE id_cliente = $id AND borrado != 1");
    $query->execute();
    $ordenes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $ordenes;
}

function encontrarOrden($db, $id){
    $query = $db->prepare("SELECT id, seña, montoTotal, id_cliente, DATE_FORMAT(fechaEntrada, '%d/%m/%Y') AS fechaEntrada, DATE_FORMAT(fechaSalida, '%d/%m/%Y') AS fechaSalida FROM ordenes_trabajo WHERE id = $id");
    $query->execute();
    $orden = $query->fetchAll(PDO::FETCH_ASSOC);
    return $orden;
}

function encontrarOrdenEditar($db, $id){
    $query = $db->prepare("SELECT * FROM ordenes_trabajo WHERE id = $id");
    $query->execute();
    $orden = $query->fetchAll(PDO::FETCH_ASSOC);
    return $orden;
}

function listarAnteojos($db, $id){
    $query = $db->prepare(
    "SELECT a.id_anteojo, a.cantidad, a.armazon, a.od_esf, a.od_cil, a.od_grados, a.oi_esf, a.oi_cil, a.oi_grados, a.id_orden, 
    ta.nombre AS tipo_anteojo, tc.nombre AS tipo_cristal, m.nombre AS material, cp.nombre AS color_proceso
    FROM anteojos a 
    INNER JOIN tipo_anteojo ta ON a.id_tipo = ta.id_tipo
    INNER JOIN tipo_cristal tc ON a.id_cristal = tc.id_cristal
    INNER JOIN materiales m ON a.id_material = m.id_material
    INNER JOIN colores_procesos cp ON a.id_cp = cp.id_cp
    WHERE a.id_orden = $id AND borrado != 1");
    $query->execute();
    $anteojos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $anteojos;
}

function encontrarAnteojo($db, $id){
    $query = $db->prepare("SELECT * FROM anteojos WHERE id_anteojo = $id");
    $query->execute();
    $anteojo = $query->fetchAll(PDO::FETCH_ASSOC);
    return $anteojo;
}

function listarTipoAnteojo($db){
    $query = $db->prepare("SELECT * FROM tipo_anteojo");
    $query->execute();
    $tiposAnteojos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $tiposAnteojos;
}

function listarTipoCristal($db){
    $query = $db->prepare("SELECT * FROM tipo_cristal");
    $query->execute();
    $tiposCristales = $query->fetchAll(PDO::FETCH_ASSOC);
    return $tiposCristales;
}

function listarMateriales($db){
    $query = $db->prepare("SELECT * FROM materiales");
    $query->execute();
    $materiales = $query->fetchAll(PDO::FETCH_ASSOC);
    return $materiales;
}

function listarColoresProcesos($db){
    $query = $db->prepare("SELECT * FROM colores_procesos");
    $query->execute();
    $coloresProcesos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $coloresProcesos;
}

function busqueda($db, $nombreCompleto){
    $query = $db->prepare("SELECT * FROM clientes WHERE CONCAT(nombre, ' ', apellido) LIKE '%$nombreCompleto%'");
    $query->execute();
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}

?>