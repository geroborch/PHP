<?php
// Zahlen-Pyramide erstellen
// Dieses Programm erstellt eine Zahlen-Pyramide mit einer bestimmten Anzahl von Zeilen

// Anzahl der Zeilen in der Pyramide festlegen
$anzahlZeilen = 5;

// Wir erstellen ein leeres zweidimensionales Array für unsere Pyramide
$pyramide = [];

// Schritt 1: Pyramiden-Struktur aufbauen
// Erste Schleife: Geht durch jede Zeile
for ($zeile = 1; $zeile <= $anzahlZeilen; $zeile++) {
    // Neues leeres Array für jede Zeile
    $aktuelleZeile = [];
    
    // Zweite Schleife: Befüllt jede Zeile mit den Zahlen 1 bis zur aktuellen Zeilennummer
    for ($zahl = 1; $zahl <= $zeile; $zahl++) {
        // Füge die aktuelle Zahl zur Zeile hinzu
        $aktuelleZeile[] = $zahl;
    }
    
    // Füge die fertige Zeile zur Pyramide hinzu
    $pyramide[] = $aktuelleZeile;
}

// Schritt 2: Pyramide ausgeben
echo "Zahlen-Pyramide mit {$anzahlZeilen} Zeilen:\n\n";

// Wir durchlaufen jede Zeile in unserer Pyramide
foreach ($pyramide as $zeilenIndex => $zeile) {
    // Berechne die Anzahl der Leerzeichen vor der Zeile für die Pyramidenform
    $leerzeichen = $anzahlZeilen - $zeilenIndex - 1;
    
    // Gib die Leerzeichen aus
    echo str_repeat(" ", $leerzeichen);
    
    // Gib die Zahlen der aktuellen Zeile aus, mit Leerzeichen getrennt
    echo implode(" ", $zeile);
    
    // Neue Zeile nach jeder Pyramidenzeile
    echo "\n";
}
?>