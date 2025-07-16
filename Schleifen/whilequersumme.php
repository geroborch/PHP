<?php

/********************************************************
                *Eingabe VARIABELN *
*********************************************************/



$zahl = 73685398724363;                                                                                         // Eingabe Zahl $zahl = 123                 //$zahl = 123;           
$quersumme = 0;                                                                                                 // Summenspeicher $quersumme = 0;         // Summenspeicher für die Quersumme 


/********************************************************
                *Eingabe*
*********************************************************/


while ($zahl > 0) {                                     // Die Schleife läuft, solange die Zahl größer als 0 ist
    $ziffer = $zahl % 10;                               // Die letzte Ziffer der Zahl wird ermittelt
    $quersumme = $quersumme + $ziffer;                  // kummulieren der Ziffern (3 + 2+ 1 )
    $zahl = $zahl / 10;                                 // 1 DL => 12, 2. DL => 1, 3. DL => 0 
    $zahl = (int) $zahl;



}


/********************************************************
                * AUSGABE *
*********************************************************/

echo $quersumme;                                       // Ausgabe der Quersumme der Zahl 123 = 6
?> 