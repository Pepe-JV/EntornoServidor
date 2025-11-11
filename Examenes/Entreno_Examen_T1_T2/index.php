<?php

/*
echo "Hola, este es el index del examen de entrenamiento T1 T2."; 


//variables
$nombre = "Juan";
$edad = 25;
echo "Mi nombre es " . $nombre . "  y tengo " . $edad . " años.";
*/




/*

//ejercicio 1; funcion que devuelva numero maximo de un array
function obtenerNumeroMaximo($arrayNumeros){

    $maximo = $arrayNumeros[0];
    foreach ($arrayNumeros as $numero){
        if ($numero > $maximo){
            $maximo = $numero;
        }
    }

    return $maximo;

}


$arrayNumeros = [3, 5, 6, 70, 11];
$maximo = obtenerNumeroMaximo($arrayNumeros);

echo " el numero maximo es: $maximo";
*/


/*
//ejercicio 2: sumatoria array pero se lo pedimos

function obtenerSumatoria($arrayNumeros){

    $sumatoria = 0;

    foreach($arrayNumeros as $numero){
        $sumatoria += $numero;
    }

    return $sumatoria;

}


$numeros = [];


do{
    $entrada = readline("introduce, pulse enter para salir:");
    if ($entrada != ""){
        if(!is_numeric($entrada)){
            echo "no es un valor valido";
            continue;
        }

        $numeros[] = $entrada;
    }


}while($entrada != "");


echo "la sumatoria del array es: " . obtenerSumatoria($numeros);

*/


/*
//ejercicio 3: millas a kilometros
//1 milla = 1.60 km

function obtenerMillas($entrada){
    $conversion = $entrada * 1.60;

    return $conversion;
}

$numero = null;

do{

    $entrada = readline("introduce millas (enter para salir): ");

    if ($entrada === ""){
        break; // Salir del bucle si presiona enter
    }

    if (!is_numeric($entrada)){
        echo "No es un valor válido. Intenta de nuevo.\n";
        continue; // Volver a pedir la entrada
    }

    $numero = $entrada;
    break; // Salir después de obtener un número válido

}while(true);

if ($numero !== null){
    echo $numero . " millas son " . obtenerMillas($numero) . " km\n";
} else {
    echo "No se ingresó ningún valor.\n";
} 
*/

/*

//ejercicio 4: palindromo

function comprobarPalindromo ($string){


    $textoInvertido = strrev($string);

    echo "". $textoInvertido;

    if ( $string === $textoInvertido){
        echo "es un palindromo";
    }else{
        echo "no es palindromo";
    }

    

}




do{

 $string = readline("introduce la palabra o frase: ");

 if ($string = "" ){
    echo "no valido";
    continue;
 }else if (is_numeric($string)){
    echo "no valido";
    continue;
 }

 break;


}while(true);

comprobarPalindromo($string);

*/




//comprobacion de numeros y strings*********************************************************
/*
//comprobar unico numero
do{

    $numero = readline("numero: ");

    if (!is_numeric($numero)){
        echo "no valido";
        continue;
    }

    break;

}while(true);

echo "el numero es {$numero}";
*/



//comrpobar numeros de un string

/*
$string = [];


do{
   $entrada = readline("numero, pulsa enter para salir:");

   if ($entrada !=""){
         if (!is_numeric($entrada)){
        echo "no valido";
        continue;
         }
   }
   
  

   $string[] = $entrada;

}while($entrada != "");


echo "el string es " . implode(",", $string); 

/*
o 

echo "el string es ";
print_r($string);



*/


//comprobacion de string
/*
do{

    $nombre = readline("frase:");

    if ($nombre == ""){
        echo "no valido";
        continue;
    }

    break;



}while(true);

echo "la frase es " . $nombre;


********************************************************************************************************
*/

//ejercicio 5, funcion que cuenta una letra en un texto
/*

function contarLetra ($texto, $letra){

    $cont = 0;


    for ($i = 0; $i<strlen($texto); $i++){
        if ($texto[$i] == $letra){
            $cont++;
        }
    }
    

    return $cont;

}

do{
    $texto = readline("texto: ");

    if ($texto == ""){
        echo "no valido, ";
        continue;
    };


    break;


}while(true);


do{

    $letra = readline("letra para contar: ");

    if (is_numeric($letra)){
        echo "no valida ";
        continue;
    }

    if ($letra == ""){
        echo "no valida ";
        continue;
    }

    break;


}while(true);


echo "la frase " . $texto . " tiene la letra " . $letra . " " .  contarLetra($texto, $letra) . " veces.";
*/

/*
//ejercicio numero 6: cuenta subcadenas en un texto


function obtenerSubcadenas($texto1, $texto2){
    $cont = 0;
    


    while(true){

        if (str_contains($texto1, $texto2)){

            $cont++;
            continue;

        }else{
           
            break;
        }

    }
        
    return $cont;

}

do{

    $texto1 = readline("texto:");
    if ($texto1 == ""){
        echo "error ";
        continue;
    }

    break;

}while(true);


do{

    $texto2 = readline("texto:");
    if ($texto2 == ""){
        echo "error ";
        continue;
    }

    break;

}while(true);


echo " la subcandea se encuenta " . obtenerSubcadenas($texto1, $texto2);



*/


//ejercicio 7















?>
