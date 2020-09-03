<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Óptica Eliana Villegas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="icon" type="favicon/x-icon" href="img/logo.png">
</head>

<body>
    <?php require_once('menu.php'); ?>

    <section id="section">
        <div id="users">
        <?php
        $clientes = listarClientes($db);
        foreach ($clientes as $cliente){
        ?>
            <div id="user">
                <img src="img/user.png" alt="Usuario">
                <h2> <a href="cliente.php?id=<?= $cliente['id_cliente'] ?>">  <?= $cliente['nombre'] . " " . $cliente['apellido']?> </a></h2>
                <h3> <?= "Cel: " . $cliente['telefono']?> </h3>
            </div>
        <?php } ?>
        </div>  
    </section>
</body>

</html>