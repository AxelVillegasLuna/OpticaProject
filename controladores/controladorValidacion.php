<?php

function validarRegistro() {
    $errores = [];

    //Validamos los datos del nombre
    if(isset($_POST['nombre'])){
        if(empty($_POST['nombre'])) {
            $errores['nombre'][] = "El nombre no debe estar vacio";
        }
        if(strlen($_POST['nombre']) < 2) {
            $errores['nombre'][] = "Tu nombre debe tener por lo menos 2 letras.";
        }
        if(preg_match('/[0-9]/', $_POST['nombre'])) {
            $errores['nombre'][] = "El nombre no debe tener números";
        }
    }

    //Validamos los datos del apellido
    if(isset($_POST['apellido'])){
        if(empty($_POST['apellido'])) {
            $errores['apellido'][] = "El apellido no debe estar vacio";
        }
        if(strlen($_POST['apellido']) < 2) {           
            $errores['apellido'][] = "El apellido debe tener al menos dos caracteres";
        }
        if(preg_match('/[0-9]/', $_POST['apellido'])) {
            $errores['apellido'][] = "El apellido no debe tener números";
        }
    }

    //Validamos los datos del teléfono
    if(isset($_POST['telefono'])){
        if(strlen($_POST['telefono']) < 6){
            $errores['telefono'][] = "El teléfono debe tener al menos 6 dígitos";
        }
    }


    //Validamos la seña de la orden
    if(isset($_POST['sena'])){
        if(preg_match('/[a-z]/', $_POST['sena'])){
            $errores['sena'][] = "La seña no debe contener letras";
        }
    }

    //Validamos el monto total de la orden
    if(isset($_POST['monto-total'])){
        if(preg_match('/[a-z]/', $_POST['monto-total'])){
            $errores['monto-total'][] = "El monto total no debe contener letras";
        }
        if(empty($_POST['monto-total'])) {
            $errores['monto-total'][] = "El monto total no debe estar vacio";
        }
    }

    //Validamos el od-esf
    if(isset($_POST['od-esf'])){
        if(preg_match('/[a-z]/', $_POST['od-esf'])){
            $errores['od-esf'][] = "Este campo no permite letras";
        }
    }

    //Validamos el od-cil
    if(isset($_POST['od-cil'])){
        if(preg_match('/[a-z]/', $_POST['od-cil'])){
            $errores['od-cil'][] = "Este campo no permite letras";
        }
    }

    //Validamos el od-esf
    if(isset($_POST['od-grados'])){
        if(preg_match('/[a-z]/', $_POST['od-grados'])){
            $errores['od-grados'][] = "Este campo no permite letras";
        }
    }

    //Validamos el od-esf
    if(isset($_POST['oi-esf'])){
        if(preg_match('/[a-z]/', $_POST['oi-esf'])){
            $errores['oi-esf'][] = "Este campo no permite letras";
        }
    }

    //Validamos el od-esf
    if(isset($_POST['oi-cil'])){
        if(preg_match('/[a-z]/', $_POST['oi-cil'])){
            $errores['oi-cil'][] = "Este campo no permite letras";
        }
    }

    //Validamos el od-esf
    if(isset($_POST['oi-grados'])){
        if(preg_match('/[a-z]/', $_POST['oi-grados'])){
            $errores['oi-grados'][] = "Este campo no debe contener letras";
        }
    }

    //Validamos la cantidad de anteojos
    if(isset($_POST['cantidad'])){
        if(preg_match('/[a-z]/', $_POST['cantidad'])){
            $errores['cantidad'][] = "Este campo no debe contener letras";
        }
        if(empty($_POST['cantidad'])) {
            $errores['cantidad'][] = "La cantidad no debe estar vacia";
        }
    }

    //Validamos el armazon
    if(isset($_POST['armazon'])){
        if(empty($_POST['armazon'])) {
            $errores['armazon'][] = "El armazon no debe estar vacio";
        }
    }

    return $errores;
}


function persistirDato($dato, $arrayDeErrores) {
    if(isset($arrayDeErrores[$dato])) {
        return "";
    } else {
        if(isset($_POST[$dato])) {
            return $_POST[$dato];
        }
    }
}
?>