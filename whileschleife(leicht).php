<?php                               // startet die PHP- Datei
$zahl = 456;                        // die Zahl, deren Quersumme (alle zahlen zusammengerechnet) berechnet werden soll
$quersumme = 0;                     // Variable für die Quersumme initialisieren // 0 ist der Startwert! 

while ($zahl > 0) {                    // solange die Zahl größer als 0 ist //wenn sie 0 ist dann : Abruchbedingun
    $letzteZiffer = $zahl % 10;      // "Gib mir die letzte Ziffer der Zahl" Modulo-Operator % dividiert die zahl durch 10 und somit wissen wir den rest)
    $quersumme += $letzteZiffer;     // zur Quersumme hinzufügen // += ist eine Abkürzung für $quersumme = $quersumme + $letzteZiffer
    $zahl = intval($zahl / 10);      // letzte Ziffer entfernen // Ganzzahldivision, um die letzte Ziffer zu entfernen
                                     // Beispiel: 123 / 10 = 12.3, intval(12.3) = 12
}

echo "Die Quersumme ist: " . $quersumme; // Ausgabe der Quersumme // . ist der Verkettungsoperator in PHP, um Strings zu verbinden

?>                                  // Ende der PHP-Datei
