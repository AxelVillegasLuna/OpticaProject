<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';

if(!empty($_POST)){
    $resultados = busqueda($db, $_POST['busqueda']);
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
        <div id="users">
        <?php if(count($resultados) >= 1): ?>
            <?php foreach ($resultados as $resultado){ ?>
            <div id="user">
                <img src="img/user.png" alt="Usuario">
                <h2> <a href="cliente.php?id=<?= $resultado['id_cliente'] ?>">  <?= $resultado['nombre'] . " " . $resultado['apellido']?> </a></h2>
                <h3> <?= "Cel: " . $resultado['telefono']?> </h3>
            </div>
            <?php } ?>
        <?php else: ?>
            <h2 class="error_busqueda">No se encontraron clientes</h2>
        <?php endif; ?>
        </div> 
    </section>
</body>

</html>