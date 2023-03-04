<?php

    //question 1
    $tab_nombres = [ 5 , 6 , 10 , 2 ];
    $somme = 0;
    for($i = 0 ; $i < count($tab_nombres) ; $i++){
        $somme = $somme  + $tab_nombres[$i];
    }
    echo $somme."<br>";

    //question 2
    function somme($tableau){
        $somme = 0;
        foreach($tableau as $element){
            $somme = $somme + $element;
        }
        return $somme;
    }


    echo somme($tab_nombres)."<br>";;

    //question 3
    include("outils.php");
    $tab_nombres1 = [ 8 , 5 , 10 , 2 ];
    echo somme_externe($tab_nombres1);
