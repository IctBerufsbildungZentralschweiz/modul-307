# 05 Script Einbindung

Über die Sprachkonstrukte `include` und `require` haben wir die Möglichkeit, ein Script aus einer anderen Datei in unser Script einzubinden.

#### echo.php

```php
echo 'Ich bin eingebunden!';
```

#### index.php

```php
include 'echo.php';
// Ich bin eingebunden!
```

### Unterschiede zwischen `require` / `include`

| Schlüsselwort | Bedeutung                                                                                                        |
| ------------- | ---------------------------------------------------------------------------------------------------------------- |
| `include`     | Wenn die eingebundene Datei nicht existiert, wird ein E\_WARNING produziert. Die Skriptausführung läuft weiter.  |
| `require`     | Wenn die eingebundene Datei nicht existiert, wird ein E\_COMPILE\_ERROR produziert. Die Skriptausführung stoppt. |

## Aufgabe: Script-Einbindung

Erstelle die Datei `index.view.php`. Trenne nun das HTML-Gerüst (`index.view.php`) von der PHP-Logik (`index.php`) mit Hilfe der PHP-Script-Einbindung.

Das Ziel ist es, dass in der Datei `index.php` deine Variable definiert wird und in der `index.view.php` nur noch folgender Code ist:

```markup
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Meine Seite</title>
    </head>
    <body>
        Heute bin ich mit dem <?= $vehicle ?> gefahren.
    </body>
</html>
```
