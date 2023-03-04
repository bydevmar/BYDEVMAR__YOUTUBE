<?php


function somme_externe($tableau){
    $somme = 0;
    foreach($tableau as $element){
        $somme = $somme + $element;
    }
    return $somme;
}