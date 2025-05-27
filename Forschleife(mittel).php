<?php
$summe = 0;

for ($zahl = 1; $zahl <= 10; $zahl++) {
    if ($zahl % 2 == 0) {
        $summe += $zahl;  // gleiche wie: $summe = $summe + $zahl;
    }
}

echo "Die Summe der geraden Zahlen von 1 bis 10 ist: $summe";
?>