# Benutzerdefinierte Funktionen

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

## Optionale Argumente

Einem Argument kann ein Standardwert zugewiesen werden. Somit ist die Eingabe dieses Arguments optional.

```php
function sagwas($wort1, $wort2 = 'Welt') {
    echo $wort1 . ' ' . $wort2;
}

sagwas('Hallo');
```

## Rückgabewerte

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

## Type-Hints

Seit PHP 7 können für die Funktionsargumente sowie für den Rückgabewert einer Funktion Typen definiert werden.

```php
function addiere(int $zahl1, int $zahl2) : int {
    return $zahl1 + $zahl2;
}

$resultat = addiere(3, 7);
var_dump($resultat);
// int(10)
```

## Geltungsbereich von Variablen

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

### Das `global`-Schlüsselwort

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

## Aufgabe: Benutzerdefinierte Funktion mit Wert

Erstelle eine Funktion `dumpAndDie`, welche einen `$wert` ausgibt und die Script-Ausführung beendet \(`var_dump($wert); die();`\).

Lagere die Funktion in eine separate Datei `functions.php` aus und binde diese in die Datei `index.php` ein. Teste die Funktionsweise indem du das Array `$vehicles` an die Funktion übergibst.

```php
    dumpAndDie($vehicles);
```

## Aufgabe: Benutzerdefinierte Funktion mit Array

Erstelle eine benutzerdefinierte Funktion mit folgenden Kriterien:

* An die Funktion wird das assoziative Array `$car` mit den Attributen Marke, Farbe und Jahrgang übergeben.
* Die Funktion überprüft, ob das Auto ein Oldtimer ist.
* Oldtimer sind Autos, welche vor dem Jahr 1990 gebaut wurden.
* Die Funktion gibt je nach Prüfergebnis ein `true` oder `false` zurück.
* War das Prüfergebnis positiv, wird folgender String ausgegeben: "Beim _Renault_ handelt es sich um einen Oldtimer."
* War das Prüfergebnis negativ, wird folgender String ausgegeben: "Beim _Renault_ handelt es sich um keinen Oldtimer."

\(Die Ausgaben können provisorisch in der Datei `index.php` ausgeführt werden und müssen nicht an die HTML-Datei übergeben werden.\)

```php
function isOldtimer(array $car): bool
{
    // if ...
}

if (isOldtimer($car)) {
    echo "Beim XY handelt es sich um einen Oldtimer.";
} else {
    // ...
}
```

