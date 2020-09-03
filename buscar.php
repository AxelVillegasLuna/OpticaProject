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
        <div id="buscar">
            <form action="resultadosBusqueda.php" method="POST">
                <input type="text" name="busqueda" placeholder="Ingrese el nombre del usuario">
                <input type="submit" value="BUSCAR">
            </form>
        </div>
    </section>
</body>

</html>