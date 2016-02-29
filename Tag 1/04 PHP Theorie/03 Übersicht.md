# PHP Übersicht

## Codeschreibweise

Ein PHP-Code-Block wird mit `<?php` geöffnet und mit `?>` geschlossen. Folgt hinter dem schliessenden `?>`  kein Inhalt mehr, kann dieses Tag auch weggelassen werden.

```php
<?php
// Dein PHP-Script
// ...
// Schliessendes Tag ist optional
?>
```

Jede Anweisung in einem Script muss durch ein Semikolon `;` beendet werden.

```php
<?php
anweisung1;
anweisung2;
anweisung3;
?>
```

Zeilenumbrüche und Leerzeichen werden ignoriert und sind nicht relevant. Achte jedoch stets auf gut formatierten Code!

```php
<?php
// Würde auch funktionieren
anweisung1;anweisung2;anweisung3;
?>
```

Um eine Ausgabe zu machen, kann das Sprachkonstrukt `echo` verwendet werden.

```php
<?php

echo 'Hallo Welt!';

?>
```

Wenn du in einem PHP-Codesegment ausschliesslich eine Ausgabe erzeugen möchtest, kannst du auch die Kurzform für `echo` verwenden.

```php
<?= 'Hallo Welt!'; ?>
```

PHP-Ausgaben werden direkt in den Output geschrieben. Du kannst also HTML- und PHP-Code mischen, um eine dynamische Seite zu generieren.

```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    <?php
    echo "Dieser Text ist mit PHP generiert.\n";
    echo "Das heutige Datum ist " . date('d.m.Y');
    ?>
</body>
</html>
```

Da der PHP-Code immer auf dem Server und nie vom Client verarbeitet wird, erzeugt das Beispiel oben folgende Antwort an den Client:

```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    Dieser Text ist mit PHP generiert.
    Das heutige Datum ist 15.02.2016
</body>
</html>
```

## Ausführung

Du kannst ein PHP-Script entweder aus der Konsole ausführen...

```
php -f script.php
```

...oder das Script direkt in deinem Webbrowser aufrufen. Wichtig ist, dass du das Script vom Webserver aufrufst, nicht direkt aus dem Dateisystem.

```
http://localhost/script.php          # Korrekt
file:///c:/xampp/htdocs/script.php   # Falsch!
```

## Variablen

Eine Variable wird in PHP durch das Dollar-Zeichen `$` gefolgt vom Namen der Variablen dargestellt. Bei Variablen-Namen wird zwischen Gross- und Kleinschreibung unterschieden (case-sensitive).

Ein gültiger Variablen-Name beginnt mit einem Buchstaben oder einem Unterstrich, gefolgt von einer beliebigen Anzahl von Buchstaben, Zahlen oder Unterstrichen.

```php
$variable;              // Gültig
$_variable;             // Gültig

$2ql4sql;               // Ungültig
$sonder!zeichen;        // Ungültig

$variable_mit_umläut;   // Gültig, jedoch nicht empfohlen
```


### Booleans

Dies ist der einfachste Typ. Ein boolean Ausdruck ist ein Wahrheitswert der entweder TRUE (wahr) oder FALSE (falsch) sein kann.

```php
$ichBinWahr = true;
$ichBinFalsch = false;
```

### Integer

Als `Integer` werden ganze, natürliche Zahlen bezeichnet.

```php
$alter = 17;
```

### Float

Eine Gleitkommazahl bezeichnen wir als `Float`.

```php
$einViertel = 0.25;
$mwst = 8.0;
```

### String

Ein String stellt eine Kette von Zeichen dar. Ein String muss mit doppelten `"`oder einfachen Anführungszeichen `'` umschlossen werden.

```php
echo 'Ein einfacher String';
echo "Ein einfacher String";
```

#### Konkatenation

Strings können konkateniert (=verkettet) werden. Dafür verwenden wir den `.` Operator.

```php
echo 'Ein' . ' verketteter ' . 'String';

// Verkettungen sind auch über mehrere Zeilen möglich
echo 'Ein sehr langer unleserlicher '
   . 'und deshalb über mehrere Zeilen verketteter '
   . 'String als Beispiel.';
```

Es ist auch möglich Variablen zu verketten.

```php
$popstar = 'Justin Bieber';

echo 'Ich liebe die Musik von ' . $popstar;
// Ich liebe die Musik von Justin Bieber
```

#### Parsing von Variablen

Variablen können direkt in einen String eingefügt werden, sofern dieser mit `"` deklariert wird.

```php
$popstar = 'Justin Bieber';

echo "Ich liebe die Musik von $popstar.";
// Ich liebe die Musik von Justin Bieber.

echo 'Ich liebe die Musik von $popstar.';
// Ich liebe die Musik von $popstar.
```

Es kann auch die alternative Schreibweise mit geschweiften Klammern verwendet werden.

```php
echo "Ich liebe die Musik von ${popstar}.";
echo "Ich liebe die Musik von {$popstar}.";
```

### Arrays

In einem Array können mehrere Werte in einer Variable gespeichert werden. Um ein Array zu definieren, verwenden wir die eckigen Klammern `[...]`.

```php
$edelmetalle = ['Gold', 'Platin', 'Iridium', 'Silber'];

// Vor PHP 5.4 wurden arrays durch das array() Konstrukt definiert.
// Diese Methode wird heute teilweise noch verwendet, um mit alten
// PHP-Versionen kompatibel zu bleiben. Wenn möglich sollte aufgrund
// der besseren Lesbarkeit aber die Kurzschreibweise verwendet werden.
$edelmetalle = array('Gold', 'Platin', 'Iridium', 'Silber');
```

Um auf ein spezifisches Element eines Array zuzugreifen, kann der gewünschte Schlüssel in `[]` hinter der Variable angegeben werden. Gezählt wird ab 0.

```php
echo $edelmetalle[0];  // Gold
echo $edelmetalle[1];  // Platin
```

#### Array-Schlüssel

Zusätzlich zu jedem Wert, kann ein spezifischer Schlüssel vergeben werden.

Wird kein eigener Schlüssel angegeben, vergibt PHP automatisch einen `Integer` als Schlüssel (wie in vorherigem Beispiel).

```php
$wochentage = [
    'Mo' => 'Montag',
    'Di' => 'Dienstag',
    'Mi' => 'Mittwoch',
    'Do' => 'Donnerstag',
    'Fr' => 'Freitag',
    'Sa' => 'Samstag',
    'So' => 'Sonntag',       // Letztes Komma kann stehen gelassen werden
];
```

#### Ausgabe von Arrays

Es können nur spezifische Array-Elemente mit `echo` ausgegeben werden. Um alle Elemente eines Arrays auszugeben, kann die Funktion `print_r` verwendet werden.

```php
$edelmetalle = ['Gold', 'Platin', 'Iridium', 'Silber'];

echo $edelmetalle;
// Array

print_r($edelmetalle);
// Array
// (
//     [0] => Gold
//     [1] => Platin
//     [2] => Iridium
//     [3] => Silber
// )

```
```php

$wochentage = [
    'mo' => 'Montag',
    'di' => 'Dienstag',
    'mi' => 'Mittwoch',
    'do' => 'Donnerstag',
    'fr' => 'Freitag',
    'sa' => 'Samstag',
    'so' => 'Sonntag',
];

print_r($wochentage);
// Array
// (
//     [mo] => Montag
//     [di] => Dienstag
//     [mi] => Mittwoch
//     [do] => Donnerstag
//     [fr] => Freitag
//     [sa] => Samstag
//     [so] => Sonntag
// )


```

## Interne Funktionen


In PHP steht eine grosse Auswahl an internen Funktionen zur Verfügung. Eine komplette nach Thema gegliederte Liste befindet sich in der PHP-Dokumentation:

https://secure.php.net/manual/de/funcref.php

Wir werden an dieser Stelle nur auf einige Beispiele eingehen und uns während den Übungsaufgaben mit weiteren Funktionen vertraut machen.

Eine Funktion akzeptiert üblicherweise eines oder mehrere `Argumente`, verarbeitet diese und gibt anschliessend einen `Rückgabewert` zurück.

```php
$wert = funktionsname($argument1, $argument2);
```

### Ausgabe von Variablen mit `var_dump`

Eine nützliche Funktion zur Ausgabe des Wertes und Typs einer Variable ist `var_dump`. Die Funktion wird in erster Linie zum debuggen verwendet.

```php
$bool = true;
$integer = 20;
$string = 'Hallo';

var_dump($bool);
// bool(true)

var_dump($integer);
// int(20)

var_dump($string);
// string(5) "Hallo"
```

### Strings manipulieren

Zur Manipulation von Strings stehen [diverse Funktionen](https://secure.php.net/manual/de/ref.strings.php) zur Verfügung.

```php
$string = 'Hallo';

echo strtoupper($string);
// HALLO

echo strtolower($string);
// hallo

echo strlen($string);
// 5

echo strrev($string);
// ollaH
```

### Benutzerdefinierte Funktionen

Zusätzlich zu den internen Funktionen, können wir auch eigene Funktionen definieren.

Eine Funktion kann wie folgt definiert werden:

```php
function funktionsname($argument1, $argument2) {
    echo $argument1 . ' ' . $argument2;
}

// Funktion aufrufen
funktionsname('Hallo', 'Welt');
// Hallo Welt
```

Für die Funktionsnamen gelten die gleichen Regeln wie für Variablennamen.

Einer Funktion können Argumente mitgegeben werden, auf die innerhalb der Funktion zugegriffen werden können.

Einem Argument kann ein Standardwert zugewiesen werden. Somit ist die Eingabe dieses Arguments optional.

```php
function sagwas($wort1, $wort2 = 'Welt') {
    echo $wort1 . ' ' . $wort2;
}

sagwas('Hallo');
```

### Rückgabewerte

Eine Funktion kann über das `return` Konstrukt einen Wert zurückgeben.

```php
function sagwas($wort1, $wort2) {
    return $wort1 . ' ' . $wort2;
}

echo sagwas('Hallo', 'Welt');
// Hallo Welt

$wert = sagwas('Hallo', 'ÜK');
echo $wert;
// Hallo ÜK;
```

Ein `return` beendet die Ausführung der Funktion. Code, der nach einem `return` steht wird nicht ausgeführt.

```php
function sagwas($wort1, $wort2) {

    return $wort1 . ' ' . $wort2;

    echo 'Wird nie ausgeführt.';
}
```

### Type-Hints

Seit PHP 7 können für die Funktionsargumente sowie für den Rückgabewert einer Funktion Typen definiert werden.

```php
function addiere(int $zahl1, int $zahl2) : int {
    return $zahl1 + $zahl2;
}

$resultat = addiere(3, 7);
var_dump($resultat);
// int(10)
```

### Geltungsbereich von Variablen

Der Geltungsbereich einer Variablen ergibt sich aus dem Zusammenhang, in dem sie definiert wurde. Anders ausgedrückt: Globale Variablen sind in Funktionen nicht zugänglich. Variablen die in Funktionen definiert wurden, sind ausserhalb der Funktion nicht zugänglich.

```php
$zahl = 20; // Global

function demo() {
    return $zahl;
}

echo demo();
// PHP Notice:  Undefined variable: zahl


function demo() {
    $zahl = 20; // In Funktion, aber nicht zurückgegeben via return
    echo $zahl;
}
demo();
// 20

echo $zahl;
// PHP Notice:  Undefined variable: zahl

```

#### Das `global`-Schlüsselwort

Über das `global` Schlüsselwort können Variablen aus dem globalen Geltungsbereich in einer Funktion zugänglich gemacht werden.

```php
$zahl = 20; // Global

function demo() {

    global $zahl;

    return $zahl;
}

echo demo();
// 20
```



## Sprachkonstrukte

Zusätzlich zu den Funktionen in PHP gibt es noch zahlreiche weitere «Sprachkonstrukte», welche wir verwenden können.

### Script-Einbindung

Über die Sprachkonstrukte `include` und `require` haben wir die Möglichkeit, ein Script aus einer anderen Datei in unser Script einzubinden.

```php
// echo.php
echo 'Ich bin eingebunden!';
```

```php
// index.php
include 'echo.php';
// Ich bin eingebunden!
```

#### Unterschiede zwischen `require` / `include`

| Schlüsselwort | Bedeutung                                                                                                      |
|:--------------|:---------------------------------------------------------------------------------------------------------------|
| include       | Wenn die eingebundene Datei nicht existiert, wird ein E_WARNING produziert. Die Skriptausführung läuft weiter. |
| require       | Wenn die eingebundene Datei nicht existiert, wird ein E_COMPILE_ERROR produziert. Die Skriptausführung stoppt. |


### Operatoren


#### Vergleichs-Operatoren

Um zwei Werte in PHP zu vergleichen, gibt es die Vergleichsoperatoren `==` und `===`. Ein Vergleichs-Ausdruck gibt immer einen boolschen Wert von `true` oder `false` zurück.

| Beispiel    | Name              | Ergebnis                                                                             |
| :---------- | :---------------- | :----------------------------------------------------------------------------------- |
| $a == $b    | Gleich            | Gibt `true` zurück, wenn $a gleich $b ist.                                           |
| $a === $b   | Identisch         | Gibt `true` zurück, wenn $a gleich $b ist und beide vom gleichen Typ sind.           |
| $a != $b    | Ungleich          | Gibt `true` zurück, wenn $a ungleich $b ist.                                         |
| $a !== $b   | Nicht identisch   | Gibt `true` zurück, wenn $a ungleich $b ist und beide nicht vom gleichen Typ sind.   |
| $a < $b     | Kleiner als       | Gibt `true` zurück, wenn $a kleiner als $b ist.                                      |
| $a > $b     | Grösser als       | Gibt `true` zurück, wenn $a grösser als $b ist.                                      |
| $a <= $b    | Kleiner Gleich    | Gibt `true` zurück, wenn $a kleiner oder gleich $b ist.                              |
| $a >= $b    | Grösser Gleich    | Gibt `true` zurück, wenn $a grösser oder gleich $b ist.                              |                                                                                 |

##### Typenschwache und typenstarke Vergleiche

In PHP können typenschwache oder typenstarke Vergleiche durchgeführt werden. Bei typenschwachen Vergleichen (`==`) wird der Wert der Variablen unabhängig von ihren Typen verglichen.
Bei typenstarken Vergleichen (`===`) müssen Wert und Typ beider Variablen identisch sein.

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


[Tabelle zu Typenvergleichen in PHP](https://secure.php.net/manual/de/types.comparisons.php)

#### Arithmetische Operationen

... oder einfacher gesagt: Rechnen.

```php
$a = 2;
$b = 4;

echo $a + $b;    // Addition
// 6

echo $a - $b;    // Subtraktion
// -2

echo $a * $b;    // Multiplikation
// 8

echo $a / $b;    // Divison
// 0.5

echo $a % $b;    // Modulus (Rest)
// 2

```

##### Inkrement- bzw. Dekrementoperatoren

Um den Wert einer Variable um eins zu erhöhen oder zu reduzieren, kann der Inkrement- `++` oder Dekrementoperator `--` verwendet werden.

```php
$a = 5;
$a++;  

echo $a;
// 6

$a--

echo $a;
// 5
```

### Konstrollstrukturen

#### if

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


##### Logische Operatoren

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

#### else

Oft will man eine Anweisung ausführen, wenn eine bestimmte Bedingung erfüllt ist, und eine andere Anweisung, wenn dies nicht der Fall ist. Dies ist der Einsatzzweck von `else`.

```php
if($a > $b) {
    echo '$a ist grösser als $b';
} else {
    echo '$a ist nicht grösser als $b';
}
```

##### Ternärer Operator

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

#### elseif

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

#### while

Die Bedeutung einer `while`-Schleife ist simpel. Die Schleife weist PHP an, die untergeordnete Anweisung wiederholt auszuführen, solange die `while`-Bedingung zutrifft. Die Bedingung wird jedes Mal am Anfang der Schleife überprüft.

```php
// Zahlen von 1 bis 10 ausgeben
$zahl = 1;
while ($zahl <= 10) {
    echo $zahl++; // Wert ausgeben, dann um 1 erhöhen
}
```

#### for

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

#### foreach

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
    echo "{$wochentag} kürzt man ab als {$abkuerzung}.";
    // Montag kürzt man ab als Mo.
}
```

#### Alternative Schreibweisen

Für Kontrollstrukturen gibt es eine alternative Schreibweise, die besonders beim Generieren von HTML oft besser lesbar ist.

Bei der alternativen Schreibweise werden keine `{ }` verwendet:

```php
if($x == 1):     // Doppelpunkt anstelle von {

    echo 'x = 1';

endif;          // `endif` anstelle von }
```

Anwendungsbeispiel beim Generieren von HTML:

```html
<?php if(count($options) > 0): ?>
<select name="auswahl">
    <?php foreach($options as $value => $option): ?>
        <option value="<?= $value ?>"><?= $option ?></option>
    <?php endforeach; ?>
</select>
<?php endif; ?>
```

Herkömmliche Schreibweise...

```html
<?php if(count($options) > 0) { ?>
<select name="auswahl">
    <?php foreach($options as $value => $option) { ?>
        <option value="<?= $value ?>"><?= $option ?></option>
    <?php } ?>
</select>
<?php } ?>
```
