<?php
require_once 'conexion.php';
require_once 'controladores/helpers.php';
require_once 'controladores/controladorValidacion.php';


$tiposAnteojos = listarTipoAnteojo($db);
$tiposCristales = listarTipoCristal($db);
$materiales = listarMateriales($db);
$coloresProcesos = listarColoresProcesos($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $anteojo = encontrarAnteojo($db, $id);
}

$erroresEnRegistro = [];

if($_POST){

    $erroresEnRegistro = validarRegistro();
    $id = $_POST['id_anteojo'];
    $idOrden = $_POST['id_orden'];

    if(count($erroresEnRegistro) == 0) {
        $query = $db->prepare("UPDATE anteojos SET cantidad = :cantidad, armazon = :armazon, od_esf = :od_esf, od_cil = :od_cil, od_grados = :od_grados, oi_esf = :oi_esf, oi_cil = :oi_cil, oi_grados = :oi_grados, id_tipo = :id_tipo, id_cristal = :id_cristal, id_material = :id_material, id_cp = :id_cp WHERE id_anteojo = $id");
        $query->bindValue(':cantidad', $_POST['cantidad']);
        $query->bindValue(':armazon', $_POST['armazon']);
        $query->bindValue(':od_esf', $_POST['od-esf']);
        $query->bindValue(':od_cil', $_POST['od-cil']);
        $query->bindValue(':od_grados', $_POST['od-grados']);
        $query->bindValue(':oi_esf', $_POST['oi-esf']);
        $query->bindValue(':oi_cil', $_POST['oi-cil']);
        $query->bindValue(':oi_grados', $_POST['oi-grados']);
        $query->bindValue(':id_tipo', $_POST['tipo-anteojo']);
        $query->bindValue(':id_cristal', $_POST['tipo-cristal']);
        $query->bindValue(':id_material', $_POST['tipo-material']);
        $query->bindValue(':id_cp', $_POST['color-proceso']);
        $query->execute();
        header('Location: orden.php?id='.urlencode($idOrden));
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
        <div id="form-anteojo">
            <form action="editar-anteojo.php" method="POST">
                <h2>EDITAR ANTEOJO</h2>
                <input name="armazon" type="text" placeholder="Armazón" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['armazon'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("armazon", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['armazon'])) {
                    foreach ($erroresEnRegistro['armazon'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>   
                <input name="cantidad" type="text" placeholder="Cantidad" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['cantidad'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("cantidad", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['cantidad'])) {
                    foreach ($erroresEnRegistro['cantidad'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <p>
                <label for="tipo-anteojo">Tipo de anteojo</label>
                <select name="tipo-anteojo" id="tipo-anteojo">
                    <?php foreach($tiposAnteojos as $tipoAnteojo) { ?>
                        <?php if($tipoAnteojo['id_tipo'] == $anteojo[0][id_tipo]): ?>
                            <option selected value="<?= $tipoAnteojo['id_tipo']?>"><?= $tipoAnteojo['nombre'] ?></option>
                        <?php else: ?>
                            <option value="<?= $tipoAnteojo['id_tipo']?>"><?= $tipoAnteojo['nombre'] ?></option>
                        <?php endif; ?>  
                    <?php } ?>
                </select>
                </p>

                <p>
                <label for="tipo-cristal">Tipo de cristal</label>
                <select name="tipo-cristal" id="tipo-cristal">
                    <?php foreach($tiposCristales as $tipoCristal) { ?>
                        <?php if($tipoCristal['id_cristal'] == $anteojo[0][id_cristal]): ?>
                            <option selected value="<?= $tipoCristal['id_cristal']?>"><?= $tipoCristal['nombre'] ?></option>
                        <?php else: ?>
                            <option value="<?= $tipoCristal['id_cristal']?>"><?= $tipoCristal['nombre'] ?></option>
                        <?php endif; ?>
                    <?php } ?>
                </select>
                </p>

                <p>
                <label for="tipo-material">Tipo de material</label>
                <select name="tipo-material" id="tipo-material">
                    <?php foreach($materiales as $material) { ?>
                        <?php if($material['id_material'] == $anteojo[0][id_material]): ?>
                            <option selected value="<?= $material['id_material']?>"><?= $material['nombre'] ?></option>
                        <?php else: ?>
                            <option value="<?= $material['id_material']?>"><?= $material['nombre'] ?></option>
                        <?php endif; ?>
                    <?php } ?>
                </select>
                </p>

                <p>
                <label for="color-proceso">Colores de procesos</label>
                <select name="color-proceso" id="color-proceso">
                    <?php foreach($coloresProcesos as $colorProceso) { ?>
                        <?php if($colorProceso['id_cp'] == $anteojo[0][id_cp]): ?>
                            <option selected value="<?= $colorProceso['id_cp']?>"><?= $colorProceso['nombre'] ?></option>
                        <?php else: ?>
                            <option value="<?= $colorProceso['id_cp']?>"><?= $colorProceso['nombre'] ?></option>
                        <?php endif; ?>
                    <?php } ?>
                </select>
                </p>
                
                <input name="oi-esf" type="text" placeholder="OI. Esf" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['oi_esf'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("oi-esf", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['oi-esf'])) {
                    foreach ($erroresEnRegistro['oi-esf'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <input name="oi-cil" type="text" placeholder="OI. Cil" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['oi_cil'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("oi-cil", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['oi-cil'])) {
                    foreach ($erroresEnRegistro['oi-cil'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <input name="oi-grados" type="text" placeholder="OI. Grados" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['oi_grados'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("oi-grados", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['oi-grados'])) {
                    foreach ($erroresEnRegistro['oi-grados'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <input name="od-esf" type="text" placeholder="OD. Esf" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['od_esf'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("od-esf", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['od-esf'])) {
                    foreach ($erroresEnRegistro['od-esf'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <input name="od-cil" type="text" placeholder="OD. Cil" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['od_cil'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("od-cil", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['od-cil'])) {
                    foreach ($erroresEnRegistro['od-cil'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>

                <input name="od-grados" type="text" placeholder="OD. Grados" 
                <?php if(empty($_POST)): ?>
                    value="<?= $anteojo[0]['od_grados'] ?>">
                <?php else: ?>
                    value="<?= persistirDato("od-grados", $erroresEnRegistro) ?>">
                <?php endif;  ?>
                <?php 
                if (isset($erroresEnRegistro['od-grados'])) {
                    foreach ($erroresEnRegistro['od-grados'] as $error) {
                        echo "<small class='alerta'>" . $error . '</small>';
                    }
                }
                ?>
                <input type="hidden" value="<?= $anteojo[0]['id_anteojo']?>" name="id_anteojo">
                <input type="hidden" value="<?= $anteojo[0]['id_orden']?>" name="id_orden">
                <i class="icon-cancel cancel"></i><a href="javascript:history.back()"><input type="button" value="CANCELAR" class="red"></a>
                <i class="icon-ok ok"></i><input type="submit" class="green" value="GUARDAR">
            </form>
        </div>
    </section>
</body>

</html>