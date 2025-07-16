<?php
// Beispiel-Array
$zahlen = [3, 1, 8, 5, 4, 9, 1111111,99999999, 3, 2, 7];

// 1. Prüfen, ob das Array nicht leer ist
if (count($zahlen) === 0) {
    echo "Das Array ist leer.";
    exit;
}

// 2. Erstes Element als vorläufigen Maximalwert merken
$maximusWert = $zahlen[0];

// 3. Ab dem zweiten Element (Index 1) bis zum Ende gehen
for ($i = 1; $i < count($zahlen); $i++) {
    // 4. Vergleichen: Ist das aktuelle Element größer?
    if ($zahlen[$i] > $maximusWert) {
        // 5. Falls ja, maxWert aktualisieren
        $maximusWert = $zahlen[$i];
    }
}

// 6. Ergebnis ausgeben
echo "Größter Wert: " . $maximusWert;
?>