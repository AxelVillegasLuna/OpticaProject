<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $orden = encontrarOrden($db, $id);
    $anteojos = listarAnteojos($db, $id);
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
            <button id="editar-orden"><a href="editar-orden.php?id= <?= $orden[0]['id']?>">Editar orden</a></button>
            <button id="nuevo-anteojo"><a href="nuevo-anteojo.php?id= <?= $orden[0]['id']?>">Nuevo anteojo</a></button>
            <div id="ordendata">
                <img src="img/factura.png" alt="Usuario">
                <?php foreach ($orden as $orden_real){ ?>
                <h2 id="primero">Fecha entrada: <?= $orden_real['fechaEntrada'] ?></h2>
                <h2 id="segundo">Total: $<?= $orden_real['montoTotal'] ?></h3>
                <h2>Fecha salida: <?= $orden_real['fechaSalida'] ?></h2>
                <h2>Seña: $<?= $orden_real['seña'] ?></h3>
                <?php } ?>
            </div>
            <h2 id="anteojo-orden">Anteojos</h2>
            <?php foreach ($anteojos as $anteojo){ ?>
            <div class="anteojo">
                <table>
                    <tr>
                        <th>Armazón</th>
                        <th>Cantidad</th>
                        <th>Tipo</th>
                        <th>Cristal</th>
                        <th>Material</th>
                        <th>Colores Procesos</th>
                    </tr>
                    <tr>
                        <td><?= $anteojo['armazon']?></td>
                        <td><?= $anteojo['cantidad']?></td>
                        <td><?= $anteojo['tipo_anteojo']?></td>
                        <td><?= $anteojo['tipo_cristal']?></td>
                        <td><?= $anteojo['material']?></td>
                        <td><?= $anteojo['color_proceso']?></td>
                    </tr>
                    <tr>
                        <th>OI. Esf</th>
                        <th>OI. Cil</th>
                        <th>OI. Grados</th>
                        <th>OD. Esf</th>
                        <th>OD. Cil</th>
                        <th>OD. Grados</th>
                    </tr>
                    <tr>
                        <td><?= $anteojo['oi_esf']?></td>
                        <td><?= $anteojo['oi_cil']?></td>
                        <td><?= $anteojo['oi_grados']?></td>
                        <td><?= $anteojo['od_esf']?></td>
                        <td><?= $anteojo['od_cil']?></td>
                        <td><?= $anteojo['od_grados']?></td>
                    </tr>
                </table>   
            </div>
            <a href="editar-anteojo.php?id= <?= $anteojo['id_anteojo']?>"><img id="icono-editar" src="img/editar.png" alt="Editar"></a>
            <a href="borrar.php?id_anteojo= <?= $anteojo['id_anteojo']?>"><img id="icono-eliminar" src="img/cancelar.png" alt="Eliminar"></a>
            <div class="clearfix"></div>
            <?php } ?>
        </div> 
    </section>
</body>

</html>