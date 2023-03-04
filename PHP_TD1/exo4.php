
<?php

    $prix_table = 150;
    $prix_armoire = 50;
    $nombre = 10;

    $ht_10_armoires = $prix_armoire * $nombre;

    if($prix_table > $prix_armoire){
        echo "prix table est le plus eleve!";
    }else{
        echo "prix armoire est le plus eleve!";
    }

?>