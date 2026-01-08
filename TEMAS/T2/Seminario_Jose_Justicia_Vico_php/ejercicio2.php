<?php
//crea una funcion que obtenga la sumatoria de una array de números

Function obtenerSumatoria($arrayNumeros) {

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

    $sumatoria = 0; // Inicializa la sumatoria en 0
    foreach ($arrayNumeros as $numero) {
        $sumatoria += $numero; // Suma cada número al total
    }
    echo "La sumatoria es: " . $sumatoria;
    return $sumatoria; // Retorna la sumatoria encontrada

}

$numeros = [];

//pedir al usuario tantas veces hasta que pulse enter sin escribir nada
do {
    $entrada = readline("introduce los numeros de uno en uno y cuando quieras terminar pulsa enter sin escribir nada : ");
    if ($entrada != "") {
        //comprobar si es un numero
        if (!is_numeric($entrada)) {
            echo "ERROR: el valor introducido no es un numero valido\n";
            continue; //si no es un numero vuelve a pedir el numero
        }
        $numeros[] = $entrada; //separa los numeros por comas
    }
} while ($entrada != "");

obtenerSumatoria($numeros);

?>