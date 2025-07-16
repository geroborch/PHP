<?php

$wert = "------"; // ein integer

if (isset($wert))  {
    echo "variable ist gesetzt.<br>";
    echo "Der Datentyp ist: " . gettype($wert); // gibt den Datentyp der Variable aus

} else {
    echo "Die Variable ist nicht gesetzt.";

}

var_dump ($wert);

echo "Der Wert ist: $wert\n";


?>
