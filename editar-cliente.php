<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';
require_once 'controladores/controladorValidacion.php';

$erroresEnRegistro = [];

if(!empty($_POST)){
    $id = $_POST['id_cliente'];

    $erroresEnRegistro = validarRegistro();
    if(count($erroresEnRegistro) == 0) {
    $query = $db->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, telefono = :telefono WHERE id_cliente = $id");
    $query->bindValue(':nombre', $_POST['nombre']);
    $query->bindValue(':apellido', $_POST['apellido']);
    $query->bindValue(':telefono', $_POST['telefono']);
    $query->execute();
    header('Location: cliente.php?id='.urlencode($id));
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $cliente = encontrarCliente($db, $id);
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
        <div id="form">
            <form action="editar-cliente.php" method="POST">
                <h2>EDITAR CLIENTE</h2>
                <input name="nombre" type="text" placeholder="Nombre"
                <?php if(empty($_POST)): ?>
                    value="<?= $cliente[0]['nombre'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("nombre", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['nombre'])) {
                    foreach ($erroresEnRegistro['nombre'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?> 
                <input name="apellido" type="text" placeholder="Apellido"
                <?php if(empty($_POST)): ?>
                    value="<?= $cliente[0]['apellido'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("apellido", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['apellido'])) {
                    foreach ($erroresEnRegistro['apellido'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?> 
                <input name="telefono" type="text" placeholder="Telefono" 
                <?php if(empty($_POST)): ?>
                    value="<?= $cliente[0]['telefono'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("telefono", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['telefono'])) {
                    foreach ($erroresEnRegistro['telefono'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?> 
                <input type="hidden" name="id_cliente" value="<?= $cliente[0]['id_cliente']?>">
                <i class="icon-cancel cancel"></i><a href="javascript:history.back()"><input type="button" value="CANCELAR" class="red"></a>
                <i class="icon-ok ok"></i><input type="submit" class="green" value="GUARDAR">
            </form>
        </div>
    </section>
</body>

</html>