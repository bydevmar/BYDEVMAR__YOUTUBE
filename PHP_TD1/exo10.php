<?php
$dictionnaire = 
    array(
        "le" => "the",
        "la" => "the",
        "chat" => "cat",
        "mange" =>"eats",
        "souris" => "mouse",
        "fromage" => "cheese")
    ;

print_r($dictionnaire);

echo"<br><hr>";

foreach ($dictionnaire as $v)
    print($v." "); 

echo"<br><hr>";

?>