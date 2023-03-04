<?php


    $t_dt = [5,8,20,40];

    function convert_dt_en_euro($td){
        $somme = 0;

        for($i = 0 ; $i< count($td); $i++){
            $valeur = round( $td[$i] / 1.8 , 2) ; 
            $somme = $somme + ( $valeur) ;
            echo "$valeur Euro <br>";
        }
        echo "la somme en euro = ".$somme ." euro";
    }

    convert_dt_en_euro($t_dt);