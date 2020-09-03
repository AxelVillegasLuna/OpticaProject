<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';
require_once 'controladores/controladorValidacion.php';

$erroresEnRegistro = [];

if(!empty($_POST)){
    $idOrden = $_POST['id'];

    $erroresEnRegistro = validarRegistro();
    if(count($erroresEnRegistro) == 0) {
    $query = $db->prepare("UPDATE ordenes_trabajo SET seña = :sena, montoTotal = :montoTotal, fechaEntrada = :fechaEntrada, fechaSalida = :fechaSalida WHERE id = $idOrden");
    $query->bindValue(':sena', $_POST['sena']);
    $query->bindValue(':montoTotal', $_POST['monto-total']);
    $query->bindValue(':fechaEntrada', $_POST['fechaEntrada']);
    $query->bindValue(':fechaSalida', $_POST['fechaSalida']);
    $query->execute();
    header('Location: orden.php?id='.urlencode($idOrden));
    }
}

if(!empty($_GET)){
    $id = $_GET['id'];
    $orden = encontrarOrdenEditar($db, $id);
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
        <div class="form-orden">
            <form action="editar-orden.php" method="POST">
                <h2>EDITAR ORDEN</h2>
                <label class="label-orden">Fecha de entrada</label>
                <input type="date" name="fechaEntrada" 
                <?php if(empty($_POST)): ?>
                    value="<?= $orden[0]['fechaEntrada'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("fechaEntrada", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <label class="label-orden">Fecha de salida</label>
                <input type="date" name="fechaSalida" 
                <?php if(empty($_POST)): ?>
                    value="<?= $orden[0]['fechaSalida'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("fechaSalida", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <input name="monto-total" type="text" placeholder="Monto total" 
                <?php if(empty($_POST)): ?>
                    value="<?= $orden[0]['montoTotal'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("monto-total", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['monto-total'])) {
                    foreach ($erroresEnRegistro['monto-total'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input name="sena" type="text" placeholder="Seña" 
                <?php if(empty($_POST)): ?>
                    value="<?= $orden[0]['seña'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("sena", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['sena'])) {
                    foreach ($erroresEnRegistro['sena'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                <i class="icon-cancel cancel"></i><a href="javascript:history.back()"><input type="button" value="CANCELAR" class="red"></a>
                <i class="icon-ok ok"></i><input type="submit" class="green" value="GUARDAR">
            </form>
        </div>
    </section>
</body>

</html>