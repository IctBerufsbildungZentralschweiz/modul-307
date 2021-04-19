# 08 Interne Funktionen

In PHP steht eine grosse Auswahl an internen Funktionen zur Verfügung. Eine komplette nach Thema gegliederte Liste befindet sich in der PHP-Dokumentation:

[https://secure.php.net/manual/de/funcref.php](https://secure.php.net/manual/de/funcref.php)

Wir werden an dieser Stelle nur auf einige Beispiele eingehen und uns während den Übungsaufgaben mit weiteren Funktionen vertraut machen.

Eine Funktion akzeptiert üblicherweise eines oder mehrere `Argumente`, verarbeitet diese und gibt anschliessend einen `Rückgabewert` zurück.

```php
$wert = funktionsname($argument1, $argument2);
```

## Ausgabe von Variablen mit `var_dump`

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

## Strings manipulieren

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

## Aufgabe

Ersetze die Funktion `print_r` in der Datei `index.php` mit der Funktion `var_dump` und beobachte den Unterschied.

Umschliesse nun noch die `var_dump` Funktion mit der internen Funktion `die` und beobachte was passiert: `die(var_dump($vehicles));`

Überlege dir, für was ein solches Konstrukt nützlich sein könnte.

