<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';
require_once 'controladores/controladorValidacion.php';

$erroresEnRegistro = [];

if(!empty($_POST)){

    $erroresEnRegistro = validarRegistro();

    if(count($erroresEnRegistro) == 0) {
        $query = $db->prepare("INSERT INTO clientes VALUES(null, :nombre, :apellido, :telefono, 0)");
        $query->bindValue(':nombre', $_POST['nombre']);
        $query->bindValue(':apellido', $_POST['apellido']);
        $query->bindValue(':telefono', $_POST['telefono']);
        $query->execute();

        $query2 = $db->prepare("SELECT MAX(id_cliente) AS id FROM clientes");
        $query2->execute();
        $id = $query2->fetchAll(PDO::FETCH_ASSOC);
        header('Location: cliente.php?id='.urlencode($id[0]['id']));
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
        <div id="form">
            <form action="agregar.php" method="POST">
                <h2>NUEVO CLIENTE</h2>
                <input name="nombre" type="text" placeholder="Nombre" value="<?= persistirDato("nombre", $erroresEnRegistro) ?>">   
                <?php 
                if (isset($erroresEnRegistro['nombre'])) {
                    foreach ($erroresEnRegistro['nombre'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input name="apellido" type="text" placeholder="Apellido" value="<?= persistirDato("apellido", $erroresEnRegistro) ?>">
                <?php 
                if (isset($erroresEnRegistro['apellido'])) {
                    foreach ($erroresEnRegistro['apellido'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input name="telefono" type="text" placeholder="Telefono" value="<?= persistirDato("telefono", $erroresEnRegistro)?>">
                <?php 
                if (isset($erroresEnRegistro['telefono'])) {
                    foreach ($erroresEnRegistro['telefono'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <i class="icon-cancel cancel"></i><a href="javascript:history.back()"><input type="button" value="CANCELAR" class="red"></a>
                <i class="icon-ok ok"></i><input type="submit" class="green" value="REGISTRAR">
            </form>
        </div>
    </section>
</body>

</html>