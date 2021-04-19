# 03 PHP Übersicht

## Codeschreibweise

Ein PHP-Code-Block wird mit `<?php` geöffnet und mit `?>` geschlossen. Folgt hinter dem schliessenden `?>` kein Inhalt mehr, kann dieses Tag auch weggelassen werden.

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

```php
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

```php
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

## Aufgabe: Echo-Konstrukt \(Gemeinsam\)

Erstelle ein neues Projekt in deinem `htdocs`-Ordner und erstelle darin die Datei `index.php`.

Erstelle in der Datei `index.php` ein HTML-Gerüst. Im Body-Bereich soll die Datei ein Echo-Konstrukt enthalten, welches folgende Nachricht ausgibt:

```php
Heute bin ich mit dem Auto gefahren.
```

