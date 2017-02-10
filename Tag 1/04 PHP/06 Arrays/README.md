# Arrays

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
## Array-Schlüssel

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

## Ausgabe von Arrays

Es können nur spezifische Array-Elemente mit `echo` ausgegeben werden. Um alle Elemente eines Arrays auszugeben, kann die Funktion `print_r` verwendet werden.

```php
$edelmetalle = ['Gold', 'Platin', 'Iridium', 'Silber'];

echo $edelmetalle;
// Array

echo $edelmetalle[2];
// Iridium

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

echo $wochentage['sa'];
// Samstag

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

## Aufgabe: Array (Gemeinsam)

Kommentiere in der Datei `index.php` die Script-Einbindung der Datei `index.view.php` aus.

Erstelle ein Array `$vehicles` mit mindestens drei verschiedenen Fahrzeugen und gib alle Werte mit einem entsprechenden `print_r`-Konstrukt aus.

## Aufgabe: Assoziatives Array (Gemeinsam)

Erstelle das assoziative Array `$car` mit mindestens drei Werten (Marke, Farbe, Jahrgang) und gib nur den dritten Wert (Jahrgang) mit einem Echo-Konstrukt aus.