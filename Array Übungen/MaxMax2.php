<?php
function MaxMax2() {
    // Array CPULoad definieren und mit Testdaten füllen
     $CPULoad = [12, 10, 40, 73, 33, 60];
    
    // Initialisierung der Variablen für max und max2
      $max = 0;
      $max2 = 0;

    // Schleife zum Ermitteln von max und max2
    for ($i = 0; $i < count($CPULoad); $i++) {
        if ($CPULoad[$i] > $max) {
            // Aktualisiere beide Werte
            $max2 = $max;
            $max = $CPULoad[$i];
            echo $i . "\t";
            echo $CPULoad[$i] . "\t";
            echo $max . "\t";
            echo $max2 . "\n";
        } elseif ($CPULoad[$i] > $max2) {
            // Aktualisiere nur den zweiten Maximalwert
            $max = $CPULoad[$i];
            echo $i . "\t";
            echo $CPULoad[$i] . "\t";
            echo $max . "\t";
            echo $max2 . "\n";
        }
    }
}

// Funktionsaufruf
MaxMax2();
?>