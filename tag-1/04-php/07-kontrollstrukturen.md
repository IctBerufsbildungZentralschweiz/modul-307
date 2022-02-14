# 07 Kontrollstrukturen

## if

Das if-Konstrukt ist eines der wichtigsten Features vieler Programmiersprachen, so auch in PHP. Das Konstrukt ermöglicht die bedingte Ausführung von Codefragmenten.

```php
if(ausdruck) {
    anweisung;
}
```

Nur wenn `ausdruck` den Wert `true` ergibt, wird `anweisung` ausgeführt.

```php
if($a > $b) {
    echo '$a ist grösser als $b';
}
```

### Operatoren

#### Vergleichs-Operatoren

Um zwei Werte in PHP zu vergleichen, gibt es die Vergleichsoperatoren `==` und `===`. Ein Vergleichs-Ausdruck gibt immer einen boolschen Wert von `true` oder `false` zurück.

| Beispiel    | Name            | Ergebnis                                                                      |   |
| ----------- | --------------- | ----------------------------------------------------------------------------- | - |
| `$a == $b`  | Gleich          | Gibt `true` zurück, wenn $a gleich $b ist.                                    |   |
| `$a === $b` | Identisch       | Gibt `true` zurück, wenn $a gleich $b ist und beide vom gleichen Typ sind.    |   |
| `$a != $b`  | Ungleich        | Gibt `true` zurück, wenn $a ungleich $b ist.                                  |   |
| `$a !== $b` | Nicht identisch | Gibt `true` zurück, wenn $a ungleich $b ist oder nicht vom gleichen Typ sind. |   |
| `$a < $b`   | Kleiner als     | Gibt `true` zurück, wenn $a kleiner als $b ist.                               |   |
| `$a > $b`   | Grösser als     | Gibt `true` zurück, wenn $a grösser als $b ist.                               |   |
| `$a <= $b`  | Kleiner Gleich  | Gibt `true` zurück, wenn $a kleiner oder gleich $b ist.                       |   |
| `$a >= $b`  | Grösser Gleich  | Gibt `true` zurück, wenn $a grösser oder gleich $b ist.                       |   |

**Typenschwache und typenstarke Vergleiche**

In PHP können typenschwache oder typenstarke Vergleiche durchgeführt werden. Bei typenschwachen Vergleichen (`==`, `!=`) wird der Wert der Variablen unabhängig von ihren Typen verglichen. Bei typenstarken Vergleichen (`===`, `!==`) müssen Wert und Typ beider Variablen identisch sein.

```php
$a = 1;     // Integer
$b = "1";   // String

var_dump($a == $b);       // 1 == "1"
// true

var_dump($a === $b);      // 1 == "1"
// false

// -------------------------------------

$a = 1;      // Integer
$b = true;   // Boolean

var_dump($a == $b);       // 1 == true
// true

var_dump($a === $b);      // 1 === true
// false
```

Der typenstarke Ungleich-Operator (`!==`) ist wahr, wenn der Wert **oder** der Typ unterschiedlich ist. So kann z.B. unterschieden werden, ob ein Teil-String in einem Text am Anfang (die Funktion `strpos()` liefert `0`) oder gar nicht (`strpos()` liefert `false`) vorkommt.

```php
var_dump(strpos('hallo welt', 'hallo') != false); // 0 != false
// false

var_dump(strpos('hallo welt', 'hallo') !== false); // 0 !== false
// true
```

[Tabelle zu Typenvergleichen in PHP](https://secure.php.net/manual/de/types.comparisons.php)

### Logische Operatoren

Um mehrere Vergleiche zu verbinden oder einen Vergleich umzukehren, können logische Operatoren verwendet werden.

* and
* or
* xor
* &&
* ||
* !

```php
if($a == 1 && $b == 2) {  // $a == 1 and $b == 2
    echo '$a hat einen Wert von 1, $b hat einen Wert von 2.';    
}

if($a == 1 || $b == 2) {  // $a == 1 or $b == 2
    echo '$a hat einen Wert von 1 oder $b hat einen Wert von 2.';    
}

if($a == 1 xor $b == 2) {
    echo '$a hat einen Wert von 1 oder $b hat einen Wert von 2, jedoch nicht beides.';
}

if( ! $a == 1) {
    echo '$a hat nicht einen Wert von 1.';    
}
```

[Tabelle zu Logische Operatoren in PHP](https://secure.php.net/manual/de/language.operators.logical.php)

## else

Oft will man eine Anweisung ausführen, wenn eine bestimmte Bedingung erfüllt ist, und eine andere Anweisung, wenn dies nicht der Fall ist. Dies ist der Einsatzzweck von `else`.

```php
if($a > $b) {
    echo '$a ist grösser als $b';
} else {
    echo '$a ist nicht grösser als $b';
}
```

### Ternärer Operator

Um eine einfache `if/else`-Bedingung zu erstellen, kann auch der `Ternäre Operator` verwendet werden. Dies ist besonders bei der Zuweisung von bedingten Werten an eine Variable eine leserliche Alternative.

```php
// (if) ? then : else;
$text = ($alter >= 18) ? 'volljährig' : 'minderjährig';

// Entspricht
if($alter >= 18) {
    $text = 'volljährig';
} else {
    $text = 'minderjährig';
}
```

Die Klammern `( )` sind optional.

## elseif

`elseif`, wie der Name schon sagt, ist eine Kombination aus `if` und `else`. Wie `else` erweitert es eine `if`-Kontrollstruktur, um alternative Befehle auszuführen, wenn die ursprüngliche `if`-Bedingung nicht zutrifft.

```php
if($a > $b) {
    echo '$a ist grösser als $b';
} elseif($a == $b) {
    echo '$a ist gleich gross wie $b';
} else {
    echo '$a ist nicht grösser als $b';
}
```

## while

Die Bedeutung einer `while`-Schleife ist simpel. Die Schleife weist PHP an, die untergeordnete Anweisung wiederholt auszuführen, solange die `while`-Bedingung zutrifft. Die Bedingung wird jedes Mal am Anfang der Schleife überprüft.

```php
// Zahlen von 1 bis 10 ausgeben
$zahl = 1;
while ($zahl <= 10) {
    echo $zahl++; // Wert ausgeben, dann um 1 erhöhen
}
```

## for

`for`-Schleifen sind die komplexesten Schleifen in PHP. Die Syntax einer `for`-Schleife ist:

```php
for (ausdruck1; ausdruck2; ausdruck3) {
    anweisung;
}
```

`ausdruck1` wird **vor** Ausführung der Schleife ausgeführt.

`ausdruck2` wird **am Anfang jedes Schleifendurchlaufs** ausgeführt. Wenn diese `true` ergibt, wird die Schleife fortgesetzt. Ergibt sie `false`, wird die Ausführung der Schleife abgebrochen.

`ausdruck3` wird **am Ende jedes Schleifendurchlaufs** ausgeführt.

```php
// Zahlen von 1 bis 10 ausgeben
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
```

## foreach

Das `foreach`-Konstrukt bietet eine einfache Möglichkeit durch Arrays zu iterieren (=schrittweise durchlaufen).

```php
// Zahlen von 1 bis 10 ausgeben
$zahlen = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];   // = range(1, 10)
foreach($zahlen as $zahl) {
    echo $zahl;
}
```

Es existiert eine zweite Schreibweise für `foreach`, bei der zusätzlich der Array-Schlüssel in eine Variable geschrieben wird.

```php
$wochentage = [
    'Mo' => 'Montag',
    'Di' => 'Dienstag',
    'Mi' => 'Mittwoch',
    'Do' => 'Donnerstag',
    'Fr' => 'Freitag',
    'Sa' => 'Samstag',
    'So' => 'Sonntag',
];

foreach($wochentage as $abkuerzung => $wochentag) {
    echo "{$wochentag} kürzt man ab als {$abkuerzung}.<br>";
    // Montag kürzt man ab als Mo.
}
```

## Alternative Schreibweisen

Für Kontrollstrukturen gibt es eine alternative Schreibweise, die besonders beim Generieren von HTML oft besser lesbar ist.

Bei der alternativen Schreibweise werden keine `{ }` verwendet:

```php
if($x == 1):     // Doppelpunkt anstelle von {

    echo 'x = 1';

endif;          // `endif` anstelle von }
```

Anwendungsbeispiel beim Generieren von HTML:

```markup
<?php if(count($options) > 0): ?>
<select name="auswahl">
    <?php foreach($options as $value => $option): ?>
        <option value="<?= $value ?>"><?= $option ?></option>
    <?php endforeach; ?>
</select>
<?php endif; ?>
```

Herkömmliche Schreibweise...

```markup
<?php if(count($options) > 0) { ?>
<select name="auswahl">
    <?php foreach($options as $value => $option) { ?>
        <option value="<?= $value ?>"><?= $option ?></option>
    <?php } ?>
</select>
<?php } ?>
```

## Aufgabe

Kommentiere nun sämtliche Ausgabefunktionen in der Datei `index.php` aus. Kommentiere in der Datei `index.php` die Script-Einbindung der Datei `index.view.php` wieder ein.

Ändere die Datei `index.view.php` so ab, dass alle Fahrzeuge aufgelistet werden, welche du heute benutzt hast:

```markup
Heute bin ich mit dem Auto gefahren.
Heute bin ich mit dem Velo gefahren.
Heute bin ich mit dem Bus gefahren.
```
