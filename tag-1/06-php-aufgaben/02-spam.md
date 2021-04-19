# 02 Einfacher Spamfilter

## Aufgabenstellung

Erstelle ein Script, welches Sätze aus einem Array durchläuft und sie bei entsprechendem Inhalt als Spam einstuft.

### Zielumgebung

Nutze zur Strukturierung des Codes die erstellte MVC-Umgebung:

`SpamController.php` =&gt; Logik `spam.view.php` =&gt; Ausgabe

### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Verwende folgendes Array als Input:

```php
$input = [
    'Neue Aktionen von Ihrem Computerteile-Händler.',
    'Vergrössern Sie jetzt ihr SPAM mit SPAM.',
    'SPAM kann ihnen dabei helfen wieder ruhig zu schlafen.',
    'Kennen Sie Justin Bieber? Finden Sie andere Singles in Ihrer Nähe.',
    'Wenn spam zum Problem wird, haben Sie ein Problem.'
];
```

Schreibe ein Script, welches jeden Input-Satz durchläuft und mit Hilfe der Funktion [strpos](https://secure.php.net/manual/de/function.strpos.php) überprüft, ob das Wort `SPAM` im Satz enthalten ist.

Erzeuge folgende Ausgabe:

```php
Satz 0 ist OK
Satz 1 ist SPAM
Satz 2 ist SPAM
Satz 3 ist OK
Satz 4 ist OK
```

#### Schritt 2

Unser Spamfilter scheint den letzten Satz nicht als Spam zu erkennen, obwohl das Wort `spam` darin vorkommt. Weisst du wieso? Korrigiere dein Script, damit die folgende korrigierte Ausgabe generiert wird.

```php
Satz 0 ist OK
Satz 1 ist SPAM
Satz 2 ist SPAM
Satz 3 ist OK
Satz 4 ist SPAM
```

Tipp: In der PHP-Dokumentation gibt es zu den meisten Funktionen eine nützliche [«Siehe auch» Rubrik](https://secure.php.net/manual/de/function.strpos.php#refsect1-function.strpos-seealso), in der auf verwandte Funktionen verwiesen wird.

#### Schritt 3

Unser Spamfilter könnte noch etwas besser werden... Angebote von Partnerbörsen interessieren uns nicht und sollen neu auch als Spam eingestuft werden.

Wir erweitern unseren Filter also um das Wort `Singles`. Folgende neue Ausgabe soll generiert werden:

```php
Satz 0 ist OK
Satz 1 ist SPAM
Satz 2 ist SPAM
Satz 3 ist SPAM
Satz 4 ist SPAM
```

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt. Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.

