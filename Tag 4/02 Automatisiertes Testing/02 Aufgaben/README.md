# String-Rechner

## Aufgabenstellung

Erstelle eine Funktion, die aus einem Zahlenstring die Summe berechnet. 

```
Input :  "1,4,2"
Output:  7
```

Erarbeite immer zuerst ein Testcase, der eine Funktionalität überprüft, bevor du sie implementierst!

### Zielumgebung

Die Ausgabe aller Scripts soll in der Konsole erfolgen.

### Lösungsschritte

Ändere das Script immer nur so weit, bis einer dieser Schritte erfüllt wird. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Erstelle einen Ordner `src` und einen Ordner `tests`.

Erstelle im `src` Ordner eine `StringCalculator.php`-Datei. In diesem File soll die `calculateSum`-Funktion erstellt werden.

```php
/**
 * Errechnet die Summe aller Zahlen in einem String
 *
 * @param  string  $input
 * @return int
 */
function calculateSum(string $input)
{
    // ...
}
```

Erstelle im `tests` Ordner eine `StringCalculatorTest.php`-Datei. Kopiere den folgenden Code in diese Datei. Die `test()` Funktion wurde für dich erstellt. Ein Anwendungsbeispiel ist ebenfalls vorhanden. Nimm dir einen Augenblick Zeit und versuche den Code zu verstehen!

Du kannst die Tests ausführen, indem du auf der Kommandozeile folgendes Kommando ausführst:

```
php -f StringCalculatorTest.php
```

In der Ausgabe werden alle deine Testfälle mit Ergebnis aufgeführt. Stelle sicher, dass die Ausgabe übereinstimmt:

```
true ist true                                                 -> OK
false ist false                                               -> OK
```

##### StringCalculatorTest.php


```php
<?php echo "\n";
include __DIR__ . '/../src/StringCalculator.php';

/**
 * Testfälle
 */
test('true ist true',
    true === true
);
test('false ist false',
    false === false
);



/**
 * Gibt den Namen und das Resultat eines Tests aus.
 *
 * @param string  $name
 * @param bool    $assertion
 */
function test(string $name, bool $assertion)
{
    // Testname bis auf 60 Zeichen mit Leerzeichen füllen
    // damit die Ausrichtung der Ausgabe stimmt
    echo str_pad($name, 60) . '-> ';

    // Testergebnis anzeigen
    echo $assertion === true ? 'OK' : 'FEHLER';
    echo "\n";
}

echo "\n";
?>
```


#### Schritt 2

Es wird Zeit für unseren ersten Test!

Ersetze die zwei Beispiel-Testfälle mit unserem ersten richtigen Testcase:

```php
test('Ist nur eine Zahl vorhanden, wird diese ausgegeben',
    calculateSum('4') == 4
);
```

Führe den Test aus. Du wirst eine Fehlermeldung erhalten, da die Funktion noch nicht wie gewünscht funktioniert.

Erweitere deine `calculateSum`-Funktion nun so weit, bis der Test nicht mehr fehlschlägt!

**Wichtig:** Denke noch nicht an zukünftige Probleme oder Funktionalitäten der Funktion. Sorge nur dafür, dass der Input der Funktion als Resultat zurückgegeben wird. Nicht mehr und nicht weniger!

##### Test-Ausgabe nach Schritt 2

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben      -> OK
```

#### Schritt 3

Ergänze den nächsten Test:

```php
test('Zwei Zahlen werden richtig summiert',
    calculateSum('2,3') == 5
);
```

Führe das Testfile aus. Du solltest folgende Ausgabe erhalten:

```
Ist nur eine Zahl vorhanden, wird diese angezeigt           -> OK
Zwei Zahlen werden richtig summiert                         -> FEHLER
```

Sorge jetzt dafür, dass der neue Testfall nicht mehr fehlschlägt. 

Um die Summe aller Zahlen zu erhalten, empfehle ich dir wie folgt vorzugehen:

Mit der Funktion [`explode`](https://secure.php.net/manual/de/function.explode.php) kannst du den Input-String bei den Kommas «splitten» und die übrigbleibenden Zahlen in ein Array laden.

```php
$numbers = explode(',', $input); // = [2, 3] bei $input = "2,3"
```

Du hast jetzt also ein Array aller Zahlen aus `$input`.

Wenn du ein Array aus Zahlen hast, kannst du die Funktion [`array_sum`](https://secure.php.net/manual/de/function.array-sum.php) verwenden, um die Summe aller dieser Zahlen zu erhalten.

##### Test-Ausgabe nach Schritt 3

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben          -> OK
Zwei Zahlen werden richtig summiert                         -> OK
```

#### Schritt 4

Funktioniert das Ganze auch mit mehr als Zwei Zahlen? Teste es!

```php
test('Drei Zahlen werden richtig summiert',
    calculateSum('2,3,3') == 8
);
test('Vier Zahlen werden richtig summiert',
    calculateSum('2,3,3,1') == 9
);
```


##### Test-Ausgabe nach Schritt 4

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben          -> OK
Zwei Zahlen werden richtig summiert                         -> OK
Drei Zahlen werden richtig summiert                         -> OK
Vier Zahlen werden richtig summiert                         -> OK
```

#### Schritt 5

Vom Kunden ist eine neue Anforderung an die `calculateSum`-Funktion gestellt worden: Zahlen grösser als 100 sollen bei der Berechnung nicht beachtet werden!

Es scheint so, als müsstest du überprüfen, ob eine Zahl `> 100` ist. Mit `array_sum` ist dies leider nicht möglich. Wir müssen unseren Code umschreiben.

Versuche die Summe aller Zahlen anstelle von `array_sum` mit einer `foreach`-Schleife zu berechnen.

```php
foreach($numbers as $number) {
    // ...
}
```

Dank deiner Tests kannst Du fortlaufend überprüfen, ob die Funktion trotz Änderungen noch wie erwartet funktioniert.

Ignoriere die neue `> 100`-Funktionalität vorerst noch. Sorge erst einmal dafür, dass die vier existierenden Testfälle mit der `foreach`-Variante immer noch `OK` sind.

##### Testausgabe nach Schritt 5

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben          -> OK
Zwei Zahlen werden richtig summiert                         -> OK
Drei Zahlen werden richtig summiert                         -> OK
Vier Zahlen werden richtig summiert                         -> OK
```

#### Schritt 6

Mit der neuen `foreach`-Variante sollte es nun kein Problem sein, Zahlen > 100 von der Berechnung auszuschliessen. Ergänze einen passenden Testfall und sorge dafür, dass er `OK` ist.

##### Testausgabe nach Schritt 6

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben          -> OK
Zwei Zahlen werden richtig summiert                         -> OK
Drei Zahlen werden richtig summiert                         -> OK
Vier Zahlen werden richtig summiert                         -> OK
Zahlen > 100 werden ignoriert                               -> OK
```

#### Schritt 7

... da kommt auch schon die nächste Änderung: Negative Zahlen sollen ebenfalls ignoriert werden.

Schreibe selber einen Test für diese Funktionalität und erweitere deine Funktion.

##### Testausgabe nach Schritt 7

```
Ist nur eine Zahl vorhanden, wird diese ausgegeben          -> OK
Zwei Zahlen werden richtig summiert                         -> OK
Drei Zahlen werden richtig summiert                         -> OK
Vier Zahlen werden richtig summiert                         -> OK
Zahlen > 100 werden ignoriert                               -> OK
Zahlen < 0 werden ignoriert                                 -> OK
```

#### Schritt 8 (Zusatzaufgabe)

Kannst du dafür sorgen, dass die folgenden Testfälle ebenfalls funktionieren?

```php
test('Es können maximal 6 Zahlen eingegeben werden',
    calculateSum('1,2,3,4,5,6,7') === false 
);

test('Leerer Input wird nicht verarbeitet',
    calculateSum('') === false 
);

test('Sind Buchstaben im Input wird nichts verarbeitet',
    calculateSum('1,2,C,D') === false
);

test('Alternatives Trennzeichen | funktioniert auch',
    calculateSum('3|3|3') == 9 
);
```


## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt.

Es sind mehrere Lösungen möglich, solange dein Code allen gegebenen Vorgaben entspricht.
