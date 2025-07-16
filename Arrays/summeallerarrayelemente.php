<?php

$zahlen = [5, 2, 9, 1, 7];

$summe = 0;

for ($i = 0; $i < count($zahlen); $i++) {
  $summe += $zahlen[$i];
}

echo "Die Summe aller Array-Elemente ist: $summe\n";
