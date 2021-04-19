# 03 Datenbankabfragen

Um eine Datenbank-Abfrage auszuführen, können wir nur die instanzierte Datenbankverbindung \(PDO\) nutzen um eine reguläre Abfrage an die Datenbank zu senden.

Aus Gründen der Sicherheit führen wir die Abfrage nie direkt aus, sondern bereiten diese zuerst mit der `prepare`-Methode vor.

```php
$statement = $pdo->prepare('SELECT * FROM users');
```

Erst in einem zweiten Schritt wird der Datenbank-Befehl mit der `execute`-Methode effektiv ausgeführt.

```php
$statement->execute(); // Abfrage wird ausgeführt
```

## Resultate ausgeben

Um die Resultate nicht nur abzufragen, sondern auch auszugeben, bietet die PDO-Klasse verschiedene Möglichkeiten. Im folgenden wird die `fetchAll`-Methode genauer beschrieben.

### fetchAll

Die `fetchAll`-Methode von PDO gibt ein Array zurück mit sämtlichen Reihen aus dem Resultat der Datenbankabfrage. Wiederum werden die einzelnen Reihen als eigenes Array \(verschachtelt im Resultate-Array\) zurückgegeben.

Wurde kein Resultat anhand der Datenbank-Abfrage gefunden, wird ein leeres Array zurückgegeben.

```php
$result = $statement->fetchAll();
var_dump($result);
```

```text
Array // Array von sämtlichen Resultaten
(
    [0] => Array // Verschachteltes Array repräsentiert eine Reihe des Suchresultats
        (
            [name] => Peter
            [0] => Peter
            [role] => admin
            [1] => admin
        )

    [1] => Array // Verschachteltes Array repräsentiert eine Reihe des Suchresultats
        (
            [name] => Petra     // Ausgabe als Wert eines assoziativen Arrays
            [0] => Petra        // Ausgabe als Wert eines regulären Arrays
            [role] => user
            [1] => user
        )
)
```

Betrachtet man die Array-Struktur, sieht man, dass sämtliche Werte doppelt aufgeführt sind. Einmal als reguläres Array und einmal als assoziatives Array.

Der Grund dafür liegt darin, dass die Standard-Einstellung der `fetchAll`-Methode auf `PDO::FETCH_BOTH` ist. Diese gibt die Resultate immer in den beiden Varianten zurück. Möchte man dies ändern, kann die Ausgabe der Resultate mit verschiedenen Einstellungen beeinflusst werden: [PHP-Dokumentation](http://php.net/manual/de/pdostatement.fetchall.php).

## Aufgabe: Tasks auflisten \(Gemeinsam\)

Als nächstes wollen wir sämtliche Tasks in der Tabelle abrufen und auflisten.

Erstelle nun ein Prepare-Statement, welches sämtliche Tasks aus der Datenbank abruft und mit einem `var_dump`-Konstrukt im Controller ausgibt.

## Aufgabe: Tasks ausgeben \(Gemeinsam\)

Anstatt das Array mit dem `var_dump`-Konstrukt auszugeben, möchten wir diese an die View übergeben und in einer ungeordneten Liste angezeigen.

```markup
- Für die Mathe-Prüfung lernen
- PHP repetieren
- JavaScript repetieren
- Einkaufen gehen
...
```

