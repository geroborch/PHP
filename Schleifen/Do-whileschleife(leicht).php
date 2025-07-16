<?php

$zahl = 0; // Startwert der Schleife

do {
    echo $zahl . "² = " . ($zahl * $zahl) . "<br>";                 // Gib die Quadratzahl von $zahl aus // Ausgabe der Quadratzahl von $zahl
                                                                    // $zahl * $zahl berechnet das Quadrat von $zahl
    $zahl++;                                                                    // Erhöhe den Wert von $zahl um 1
} 

while ($zahl <= 5);                                                             // Abbruchbedingung der Schleife

?> <!-- Ende des PHP-Codes -->

