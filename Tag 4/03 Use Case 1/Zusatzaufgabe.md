## Validierung mit Respect/Validation umsetzen

Wir möchten für die serverseitige Validierung des Formulars neu die Bibliothek [Respect/Validation](https://respect.github.io/Validation/docs/) verwenden.

Dazu müssen wir die Bibliothek via [`composer`](http://getcomposer.org) in unser Projekt laden, und die Validierung anschliessend anpassen.

### Composer installieren

Lade die aktuellste [`composer.phar`](https://getcomposer.org/composer.phar) **in dein Projektverzeichnis** herunter.

Composer ist ein Tool um Abhängigkeiten in PHP-Projekten zu verwalten. Du kannst also von anderen Entwicklern bereitgestellten Code in deinem Projekt verwenden.

Du kannst Composer über die Kommandozeile ausführen:

```
php composer.phar
```

Navigiere im `cmd` in das Projekt-Verzeichnis und überprüfe die installierte Version:

```
php composer.phar --version
```

### Respect/Validation installieren

Installiere nun das Paket `Respect/Validation` via Composer. 

```
php composer.phar require respect/validation
```

Es wurde nun ein neues Verzeichnis `vendor` erstellt. Darin befinden sich alle Abhängigkeiten und eine Datei `autoload.php`

**Die `autoload.php` Datei musst Du in Deinem Front-Controller per `include` einbinden, damit alle Abhängigkeiten für dich geladen werden.**

```php
include __DIR__ . '/vendor/autoload.php';
```

Importiere die Validator-Klasse nun in deinem Controller, in dem du die folgende Zeile am Anfang des Controllers hinzufügst:

```php
use Respect\Validation\Validator as v;
```

Versuche ein Test-Objekt auszugeben:

```php
var_dump(v::numeric());
```

Wenn kein Fehler sondern Informationen zum Validator-Objekt angezeigt werden, hast Du alles korrekt installiert. Du kannst die `var_dump` Zeile von oben wieder löschen.

### Validierung mit Respect/Validation umsetzen

Schau dir [die offizielle Dokumentation](https://respect.github.io/Validation/docs/)
 für die Validation-Bibliothek an und versuche die Syntax zu verstehen.

Schreibe anschliessend deine Validierungsregeln mit den neuen Bibliothek-Funktionen neu.

[Dokumentation zu Respect/Validation](https://respect.github.io/Validation/docs/)


