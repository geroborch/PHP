<?php
// Einfacher PHP-Taschenrechner

// Zwei Zahlen definieren
$a = 10;
$b = 5;

// Operation auswählen
$operation = 'multiply';

// Ergebnis berechnen
$result = 0;

if ($operation == 'add') {
    $result = $a + $b;
} elseif ($operation == 'subtract') {
    $result = $a - $b;
} elseif ($operation == 'multiply') {
    $result = $a * $b;
} elseif ($operation == 'divide') {
    if ($b != 0) {
        $result = $a / $b;
    } else {
        $result = "Fehler: Division durch Null!";
    }
} else {
    $result = "Unbekannte Operation";
}

// Ausgabe
echo "Ergebnis: $result\n";
?>
