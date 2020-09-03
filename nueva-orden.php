<?php
require_once 'conexion.php';
require_once 'controladores/controladorValidacion.php';

$erroresEnRegistro = [];

if($_POST){

    $erroresEnRegistro = validarRegistro();
    $id = $_POST['id_cliente'];

    if(count($erroresEnRegistro) == 0) {
        $query = $db->prepare("INSERT INTO ordenes_trabajo VALUES(null, :sena, :montoTotal, :fechaEntrada, :fechaSalida, :id_cliente, 0)");
        $query->bindValue(':sena', $_POST['sena']);
        $query->bindValue(':montoTotal', $_POST['monto-total']);
        $query->bindValue(':fechaEntrada', $_POST['fechaEntrada']);
        $query->bindValue(':fechaSalida', $_POST['fechaSalida']);
        $query->bindValue(':id_cliente', $_POST['id_cliente']);
        $query->execute();
        header('Location: cliente.php?id='.urlencode($id));
    }
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
            <form action="nueva-orden.php" method="POST">
                <h2>NUEVA ORDEN</h2>
                <label class="label-orden">Fecha de entrada</label>
                <input type="date" name="fechaEntrada" value="<?= persistirDato("fechaEntrada", $erroresEnRegistro) ?>">
                <label class="label-orden">Fecha de salida</label>
                <input type="date" name="fechaSalida" value="<?= persistirDato("fechaSalida", $erroresEnRegistro) ?>">
                <input name="monto-total" type="text" placeholder="Monto total" value="<?= persistirDato("monto-total", $erroresEnRegistro) ?>">
                <?php 
                if (isset($erroresEnRegistro['monto-total'])) {
                    foreach ($erroresEnRegistro['monto-total'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input name="sena" type="text" placeholder="Seña" value="<?= persistirDato("sena", $erroresEnRegistro) ?>">
                <?php 
                if (isset($erroresEnRegistro['sena'])) {
                    foreach ($erroresEnRegistro['sena'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id_cliente">
                <i class="icon-cancel cancel"></i><a href="javascript:history.back()"><input type="button" value="CANCELAR" class="red"></a>
                <i class="icon-ok ok"></i><input type="submit" class="green" value="REGISTRAR">
            </form>
        </div>
    </section>
</body>

</html>