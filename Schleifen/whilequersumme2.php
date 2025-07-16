<?php

/********************************************************
                *Eingabe VARIABELN *
*********************************************************/



$zahl = 1;                                                                   
$quersumme = 0;                               //summenspeicher                   


/********************************************************
                *Eingabe*
*********************************************************/


while ($zahl <= 3) {                                     // Die Schleife läuft, solange die Zahl kleiner oder gleich 3 ist
    
    $quersumme = $quesrsumme + $zahl;
    $zahl++;                                            // Erhöhen der Zahl um 1 (Schrittweite 1)
                                           
    }




/********************************************************
                * AUSGABE *
*********************************************************/

echo $quersumme;                                       // Ausgabe der Quersumme der Zahl 123 = 6
?> 