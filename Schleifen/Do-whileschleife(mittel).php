<?php                                                // startet den PHP-Code
$a = 0;                                              // erster Startwert der Schleife
$b = 1;                                              // zweiter Startwert der Schleife  

$counter = 0;                                        // Zähler für die Anzahl der Iterationen

do {
    echo $b . "<br>";                                // Ausgabe von $b, da die Folge mit 1 beginnt
    $next = $a + $b;                                 // Berechnung des nächsten Wertes in der Fibonacci-Folge   
    $a = $b;                                         // Aktualisierung von $a auf den vorherigen Wert von $b
    $b = $next;                                      // Aktualisierung von $b auf den neuen Wert
    $counter++;                                      // Erhöhung des Zählers
} while ($counter < 5);                              // Schleife läuft, bis 5 wiederholungne
?>                                                   // Ende des PHP-Codes  