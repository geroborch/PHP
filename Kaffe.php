<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////              Maximal zulässiger Koffein Intake         //////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////// PHP mit MYSQL verbinden
$host = 'localhost';
$db = 'kaffe';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];


try {
    $pdo  = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Verbindung hat leider nicht geklappt: " . $e->getMessage());

}

/////////    Hilfsfunktion zur Benutzereingabe 
function frageGeneral($text) {
    echo $text; 
    return trim(fgets(STDIN));
}

//////////    Hilfsfunktion zur Nutzereingabe der Art des kaffes und der Menge

    function frageKaffeSorte(): string {
        echo "Welche Art Kaffe hast du getrunken? \n";
        echo "1. Filter Kaffe \n";
        echo "2. Instant Kaffe \n";
        echo "3. Espresso \n";
        echo "4. Latte Machiato \n";
        echo "5. Cappuccino \n";
        echo "Bitte gib die Nummer der Kaffeart ein: ";
        
        $wahlKaffe = trim(fgets(STDIN));
    
    }

$Faktor = 6;     
$Filterkaffe = 100;                                                                              // Variablen mit dem Coffeingehalt je Tasse Kaffe
$Instantkaffe = 60;
$Espresso = 80;
$Lattemachiato = 100;
$Cappuccino = 80;                                                                              


/////////////////////////////  wichtige Arrays für die Schleifen  ///////////////////////////////////////
$verneinendeAntworten = ["weis ich nicht", "weiß ich nicht", "weiss ich nicht", "ich weis es nicht", "ich weiß es nicht", "ich weiss es nicht", "nix wissen",  "nein", "ich weis es nicht"];
echo "Hallo, dieses Programm hilft dir dabei einzuschätzen wieviel Kaffe du maximal trinken solltest, um im Grünen Bereich zu bleiben \n";
echo  "Gib dein Körpergewicht in kg ein: ";
$gewicht = trim(fgets(STDIN));
$empfohlenemaximaldosis= $gewicht * $Faktor;

echo "Ihre empfohlene Maximaldosis an Kaffein: ist $empfohlenemaximaldosis mg\n";               // gibt den Maximal empfohlenen Coffein Wert aus!

echo "Hast du heute schon Kaffe getrunken?: ";                                                  // fragt ob der Nutzer heute schon kaffe getrunken hat

$heute = trim(fgets(STDIN));                                                                    // Holt die Informationen die über die Tastatur eingegeben worden sind

if (strtolower($heute) == "nein") {       
    echo "gut du kannst heute noch $empfohlenemaximaldosis mg zu dir nehmen";                   // Wenn du heute noch keinen Kaffe getrunken hast
    echo "OK! Dann kannst du heute noch $empfohlenemaximaldosis mg trinken. \n";                             // Dann darfst du die oben ausgerechnete Maximalempfohlene Tages dosis zu dir nehmen
} else {                                                                                        // Wenn die Eingabe was anderes ist als "nein", also der User heute schon kaffe getrunken hat
    echo "Wieviel Koffein hast du heute schon zu dir genommen?: ";                              // Dann Fragt das Skript wieviel Koffein du schon zu dir genommen hast. 
    $heutegenommen = trim(fgets(STDIN));     
    
    if (in_array(strtolower($heutegenommen), $verneinendeAntworten)) {
        $sollichausrechnen = frageGeneral("soll ich dir deinen bissherigen Koffeinkonsum ausrechnen? ");   // Erste Verwendung einer Funktion in dem Code 

        if(strtolower($sollichausrechnen) == "ja") {
        $stmt = $pdo->query('SELECT id, name FROM produkte');                                   // Hier wird die Abfrage der Kaffeart aus der DATENBANK gestartet
        $kaffees = $stmt->fetchAll();

        echo "Hier sind die verfügbaren Kaffearten: \n";
        foreach ($kaffees as $kaffee) {
            echo "{$kaffee['id']}. {$kaffee['name']} \n";                                    // Datenbank ausgabe
        }

        echo "Bitte gib die ID deiner gewählen Kaffeesorte ein: ";
        $wahl_id = trim(fgets(STDIN));                                                         // Hier wird die ID der gewählten Kaffeesorte abgefragt

        $auswahl = null; 
        foreach ($kaffees as $kaffee) {
            if ($kaffee['id'] == $wahl_id) {
                $auswahl = $kaffee;                                                            // Hier wird die gewählte Kaffeesorte in der Variable $auswahl gespeichert
                break;

            }

        }

        if (!$auswahl) {
            echo "Ungültige Auswahl. Bitte starte das Programm neu !!! \n"; // Wenn die Eingabe nicht in der Datenbank vorhanden ist, wird eine Fehlermeldung ausgegeben
            exit;
        }
                

        $stmt = $pdo->prepare("SELECT id, bezeichnung, ml, koffein_mg FROM portionen WHERE produkt_id = ?");   // Hier werden die Portionen aus der Portionen Tabelle der Datenbank abgefragt
        $stmt->execute([$wahl_id]);
        $portionen = $stmt->fetchAll();

        if (count($portionen) === 0) {
        echo "Für dieses Produkt sind keine Portionen hinterlegt.\n";
        exit;
        
    }
        echo "Wähle eine Portion: \n";

        foreach ($portionen as $portion) {
            echo "{$portion['id']}: {$portion['bezeichnung']} ({$portion['ml']}ml, {$portion['koffein_mg']}mg)\n";
        }


        echo "Bitte gib die ID der Portion ein, die du konsumiert hast: ";
        $portion_id = trim(fgets(STDIN));                                  
        
        echo "Wieviele Portionen hast du davon getrunken?: ";   
        $menge = (int) trim(fgets(STDIN));                                            // Hier wird die Menge der Portionen abgefragt    
        

        $stmt = $pdo->prepare("INSERT INTO konsum(portionen_id, menge, konsumiert_am) VALUES (?, ?, CURDATE())");
        $stmt->execute([$portion_id, $menge]);                                                   // Hier wird die Menge der Portionen in die Datenbank geschrieben
        
        echo "Dein Kaffekonsum wurde erfolgreich gespeichert.\n";

       $stmt = $pdo->query("
       SELECT portionen.koffein_mg, konsum.menge
       FROM konsum
       JOIN portionen ON konsum.portionen_id = portionen.id
       WHERE konsum.konsumiert_am = CURDATE()
       ");

       $eintraege = $stmt->fetchAll();
       $gesamtKoffein = 0;

       foreach ($eintraege as $eintrag) {
            $gesamtKoffein += $eintrag['koffein_mg'] * $eintrag['menge']; 
       } 

       $nochMoeglich = $empfohlenemaximaldosis - $gesamtKoffein; // Hier wird die noch mögliche Menge an Koffein berechnet
         echo "Du hast heute bereits $gesamtKoffein mg Koffein konsumiert. \n";

         if ($nochMoeglich > 0) {
            echo "Du kannst heute noch $nochMoeglich mg Koffein konsumieren.\n"; // Hier wird die noch mögliche Menge an Koffein ausgegeben
         } else {
            echo "ACHTUNG!!!!: Du hast dein Tageslimit erreicht! \n"; 
         }

        } else{
            echo "ok! Dann kannst du die volle Maximaldoses von $empfohlenemaximaldosis mg trinken, starte das Programm neu um deinen jetzigen Verbrauch weiter zu berechnen";
        }
        

    
        
        if (!$auswahl) {
            echo "Ungültige Auswahl. Bitte starte das Programm neu und wähle eine gültige Kaffeesorte.\n";        // Wenn die Eingabe nicht in der Datenbank vorhanden ist, wird eine Fehlermeldung ausgegeben
            exit;

        
        }
        
    } else {
        $nochzunehmen = $empfohlenemaximaldosis - $heutegenommen;
        echo "Du kannst heute noch $nochzunehmen mg trinken. /";
    }

}


?>