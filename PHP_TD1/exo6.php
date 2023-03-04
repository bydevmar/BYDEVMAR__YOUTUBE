<?php


    $nbre = 3;
    $somme = 0;
    for($i = 1; $i <= $nbre ; $i++){
        $somme = $somme + $i;
    }
    echo "la somme avec la boucle for= " .$somme ;


    echo "<br>";

    $i = 1;
    $somme = 0;
    while($i <= $nbre){
        $somme = $somme + $i;

        $i++;
    }
    echo "la somme avec boucle while= " .$somme ;

    
