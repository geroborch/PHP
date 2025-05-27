
<!DOCTYPE html>                                     // HTML5-Deklaration
<html>                                              // Beginn des HTML-Dokuments
<html lang="de">                                    // Beginn des HTML-Dokuments mit Angabe der Sprache  
<head>                                              // Kopfbereich des HTML-Dokuments
    <title>PHP Tabelle</title>                      // Titel des Dokuments
    <style>                                         // CSS-Style
        table, td {                                 // Style für die Tabelle und die Zellen
            border: 1px black;                // Schwarzer Rand um die Tabelle und die Zellen
            border-collapse: collapse;              // Ränder der Zellen zusammenführen
            padding: 4px;                           // Innenabstand der Zellen
            text-align: center;                     // Text in den Zellen zentrieren
        }
    </style>                                        // Ende der CSS-Stile
</head>                                             // Ende des Kopfbereichs
<body>                                              // Beginn des Body-Bereichs
    <table>                                         // Beginn der Tabelle
        <tr>                                        // Beginn der ersten Zeile
            <th>Zahl</th>                           // Kopfzeile mit dem Titel "Zahl"
        </tr>                                       // Ende der ersten Zeile
        <tr>                                        // Beginn der zweiten Zeile


<?php

for ($zahl = 1; $zahl <= 20; $zahl++) {             //Schleife von 1 bis 20
  echo "<td>$zahl</td>";

  if ($zahl % 5 == 0 && $zahl != 20) {              // % ist der Modulo-Operator, der den Rest einer Division berechnet
    echo "</tr><tr>";                               // Wenn die Zahl durch 5 teilbar ist und nicht 20, wird eine neue Zeile begonnen
  }
}



?>                                              // Ende des PHP-Codes

                                              