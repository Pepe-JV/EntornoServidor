/*EJERCICIO 1: Crea una funcion que obtenga el numero maximo de un array de números*/

<?php
Function obtenerNumeroMaximo($arrayNumeros) {

    //comprobaciones
    //vacio
    if (empty($arrayNumeros) || count($arrayNumeros) == 0 || $arrayNumeros[0] == "") {
        echo "ERROR: el array esta vacio";
        return; // Retorna null si el array está vacío
    }
    //letras
    foreach ($arrayNumeros as $numero) {
        if (!is_numeric($numero)) {
            echo "ERROR: hay un numero que no es valido";
            return; // Retorna null si encuentra un valor no numérico
        }
    }

    $maximo = $arrayNumeros[0]; // Asume que el primer número es el máximo
    foreach ($arrayNumeros as $numero) {
        if ($numero > $maximo) {
            $maximo = $numero; // Actualiza el máximo si encuentra un número mayor
        }
    }
    echo "El numero maximo es: " . $maximo;
    return $maximo; // Retorna el número máximo encontrado
}

//pedir numeros al usuario
$entrada = readline("introduce los numeros entre comas:");
$numeros = explode(',', $entrada); // Convierte la entrada en un array de enteros


$maximo = obtenerNumeroMaximo($numeros);

?>