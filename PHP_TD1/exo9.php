<?php
$semestre = array
    (
        1 => "Janvier",
        "Février", 
        "Mars", 
        "Avril", 
        "Mai", 
        "Juin"
    );

echo "Parcours du tableau \$semestre<BR>";

$nb = count($semestre);

for ($i = 1; $i <= $nb; $i++)
    echo "\$semestre[$i] = $semestre[$i] <BR>";

echo "Liste des mois du semestre<BR>";

foreach ($semestre as $mois)
    echo "$mois <BR>";

echo "Liste des associations (clé, valeur)<BR>";

reset($semestre);
foreach ($semestre as $cle => $valeur)
    echo "$cle ‐‐‐> $valeur <BR>";
