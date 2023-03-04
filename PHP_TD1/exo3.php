<!DOCTYPE html>
<html lang="en">
<head>
    <title>EXERCICE 3</title>
</head>
<body>
    <H3>CALCUL SUR LES VARIABLES</H3>
    <?php 
        $tva = 0.2;
        $prix = 5 ;
        $nombre = 10;

        $ht = $prix * $nombre;
        $ttc = $ht + ($ht * $tva);

        echo "$ht";
        echo "<br>";
        echo "$ttc";
        echo "<br>";

        echo gettype($ht);
        echo "<br>";
        echo gettype($ttc);

    ?>
</body>
</html>