<?php                                   //Start des PHP-Codes
$summe = 0;                             // Variable zum Speichern der Summe initialisieren  

for ($zahl = 1; $zahl <= 10; $zahl++) { // Schleife von 1 bis 10 (Anfangswert 1, Abbruchbedingung 10, Schrittweite 1)
    if ($zahl % 2 == 0) {               // // Dieser Code wird nur ausgeführt, wenn $zahl eine gerade Zahl ist. //Überprüfen, ob die Zahl gerade ist (Modulo-Operator % gibt den Rest der Division zurück) 
        $summe += $zahl;                // gleiche wie: $summe = $summe + $zahl;
    }
}

echo "Die Summe der geraden Zahlen von 1 bis 10 ist: $summe";
?>