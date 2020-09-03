<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $cliente = encontrarCliente($db, $id);
    $ordenes = listarOrdenes($db, $id);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Óptica Eliana Villegas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="icon" type="favicon/x-icon" href="img/logo.png">
</head>

<body>
    <?php require_once('menu.php'); ?>
    <section id="section">
        <div id="usercomplete">
            <button id="editar-cliente"><a href="editar-cliente.php?id=<?= $cliente[0]['id_cliente'] ?>">Editar cliente</a></button>
            <button id="nueva-orden"><a href="nueva-orden.php?id=<?= $cliente[0]['id_cliente'] ?>">Nueva orden</a></button>
            <div id="userdata">
                <img src="img/usuario.png" alt="Usuario">
                <?php foreach ($cliente as $cliente_real){ ?>
                <h2><?= $cliente_real['nombre'] . ' '. $cliente_real['apellido'] ?></h2>
                <h3>Cel: <?= $cliente_real['telefono']?></h3>
                <?php } ?>
            </div>
            <h2 id="titulo-ordenes">Ordenes de Trabajo</h2>
            <?php foreach ($ordenes as $orden){ ?>
            <div class="ordentrabajo">
                <table>
                    <tr>
                        <th>Fecha entrada</th>
                        <th>Fecha salida</th>
                        <th>Monto total</th>
                        <th>Seña</th>
                        <th>Acciones</th>
                    </tr>
                    <tr>
                        <td><?= $orden['fechaEntrada']?></td>
                        <td><?= $orden['fechaSalida']?></td>
                        <td>$<?= $orden['montoTotal']?></td>
                        <td>$<?= $orden['seña']?></td>
                        <td>
                            <a href="orden.php?id=<?= $orden['id'] ?>"><img id="icono-orden" src="img/hecho.png" alt="Seleccionar"></a>
                            <a href="editar-orden.php?id=<?= $orden['id'] ?>"><img id="icono-orden" src="img/editar.png" alt="Editar"></a>
                            <a href="borrar.php?id_orden=<?= $orden['id'] ?>"><img id="icono-orden" src="img/cancelar.png" alt="Eliminar"></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="clearfix"></div>
            <?php } ?>
        </div> 
    </section>
</body>

</html>