# Script-Einbindung

Über die Sprachkonstrukte `include` und `require` haben wir die Möglichkeit, ein Script aus einer anderen Datei in unser Script einzubinden.

##### echo.php
```php
echo 'Ich bin eingebunden!';
```
##### index.php
```php
include 'echo.php';
// Ich bin eingebunden!
```

### Unterschiede zwischen `require` / `include`

| Schlüsselwort | Bedeutung                                                                                                      |
|:--------------|:---------------------------------------------------------------------------------------------------------------|
| include       | Wenn die eingebundene Datei nicht existiert, wird ein E_WARNING produziert. Die Skriptausführung läuft weiter. |
| require       | Wenn die eingebundene Datei nicht existiert, wird ein E_COMPILE_ERROR produziert. Die Skriptausführung stoppt. |

## Aufgabe: Script-Einbindung (Gemeinsam)

Erstelle die Datei `index.view.php`. Trenne nun das HTML-Gerüst (`index.view.php`) von der PHP-Logik (`index.php`) mit Hilfe der PHP-Script-Einbindung.

Das Ziel ist es, dass in der Datei `index.view.php` nur noch folgender PHP-Code ist: 
```php
<?= $vehicle ?>
```