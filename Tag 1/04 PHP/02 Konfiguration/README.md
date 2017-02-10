# PHP Konfiguration

## `phpinfo()`

Um sich eine Übersicht über die Konfiguration der vorhandenen PHP-Installation zu machen, kann die `phpinfo`-Funktion genutzt werden.

Erstelle in deinem Webserver-Rootverzeichnis eine Datei mit dem Namen `info.php` und füge folgenden Inhalt ein:

```php
<?php
phpinfo();
?>
```

Rufe die Datei über [http://localhost/info.php](http://localhost/info.php) auf.

> **Achtung!!!** Sei vorsichtig, wenn du eine solche Datei auf einem Webserver veröffentlichst, da die angezeigten Infos sehr viel über dein System verraten und für Angriffe ausgenutzt werden können.

Dir wird nun eine Übersicht aller für PHP relevanten Einstellungen gezeigt.

Sieh dir die `Apache Environment` und `HTTP Headers Information` Sektionen einmal an. Was für Informationen werden angezeigt?

Für die Konfiguration deiner PHP-Installation stehen diverse Einstellungen zur Verfügung, sogenannte `Direktiven`.

### Core-Sektion

Die wichtigste Sektion in der `phpinfo()`-Ausgabe ist die `Core`-Sektion. Diese Einstellungen gelten für den PHP-Core selbst, also nicht für eines der installierten Module (wie z. B. `mysql` oder `session`).



#### Häufig gebrauchte Direktiven

Eine Direktive ist eine einzelne Einstellung. Sie setzt sich immer aus einem Namen und einem Wert zusammen.

|     Direktive      |                                                                     Bedeutung                                                                      |
|--------------------|----------------------------------------------------------------------------------------------------------------------------------------------------|
| display_errors     | Legt fest, ob Fehlerausgaben angezeigt werden sollen.                                                                                               |
| log_errors         | Legt fest, ob Fehler in eine Datei geloggt werden sollen.                                                                                          |
| error_log          | Den Pfad zur Datei, in der Fehler geloggt werden.                                                                                                  |
| error_reporting    | Legt fest, welche Fehler beachtet werden sollen, und welche nicht.                                                                                                                                                   |
| max_execution_time | Legt fest, wie viele Sekunden ein PHP-Script maximal für seine Ausführung Zeit hat, bevor die Ausführung abgebrochen und ein Fehler generiert wird. |
| memory_limit       | Legt fest, wie viele MB RAM PHP maximal für die Ausführung eines Scripts belegen darf.                                                              |

## php.ini

Alle Einstellungen für Deine PHP-Installation lassen sich in der `php.ini` bearbeiten.
Diese befindet sich bei XAMPP unter `C:\xampp\php\php.ini`.

Öffne die Datei in Deinem Texteditor.

In dieser Datei befinden sich alle Direktiven, einschliesslich einer kurzen Info dazu.
Zeilen, die mit einem `;` beginnen sind auskommentiert und werden nicht beachtet.

Das Format für jede Direktive ist

```
direktiven_name = wert
```

Du kannst in dieser Datei alle Einstellungen bearbeiten. Wenn Du eine Änderung an der Konfiguration vorgenommen hast, musst Du anschliessend den Apache-Dienst neu starten.

### Error-Reporting

Die wichtigste Einstellung, welche wir jetzt gleich zusammen festlegen möchten, ist das Error-Reporting.

In PHP gibt es mehrere Error-Levels. PHP versucht stehts, gefundene Fehler in Scripts selber zu beheben. Je nach Error-Level generiert PHP dabei eine Fehlerausgabe oder bricht bei gravierenden Fehlern die Ausführung des Scripts komplett ab.

| Error-Level |                                                         Beschreibung                                                        |
|-------------|-----------------------------------------------------------------------------------------------------------------------------|
| E_ERROR     | Fatale Laufzeit-Fehler. Dies zeigt Fehler an, die nicht behoben werden können. Die Ausführung des Scripts wird abgebrochen. |
| E_WARNING   | Warnungen (keine fatalen Fehler) zur Laufzeit des Scripts. Das Script wird nicht abgebrochen.                               |
| E_PARSE     | Parser-Fehler während der Übersetzung. Das auszuführende Script enthält Syntax-Fehler. Das Script wird abgebrochen.         |
| E_NOTICE    | Eine mögliche Fehlerquelle wurde entdeckt (z. B. undefinierte Variable). Das Script wird trotzdem ausgeführt.               |

Hier befindet sich eine komplette Liste der [vordefinierten Fehler-Konstanten](https://secure.php.net/manual/de/errorfunc.constants.php).

#### Error-Reporting richtig einstellen

Egal ob deine Scripts in einer Produktiv- oder Entwicklungsumgebung ausgeführt werden, es ist immer wichtig, über **alle** Fehler informiert zu werden. Unsere `error_reporting` Direktive setzen wir also auf `E_ALL` (es werden somit alle auftretenden Fehler gemeldet.)

```
error_reporting = E_ALL
```

In deiner Entwicklungsumgebung ist es nützlich auftretende Fehler direkt im Output anzuzeigen. Auf einer Produktivumgebung hingegen möchten wir für die Öffentlichkeit nichts von unserem System preisgeben und zeigen die internen PHP-Fehlermeldungen nicht an. Im Fehlerfall werden wir für unsere Besucher eigene Fehlerseiten erstellen.

Für unsere Entwicklungsumgebung lassen wir uns also alle Fehler anzeigen:

```
display_errors = On
```

In einer Produktivumgebung solltest Du diesen Wert immer auf `Off` setzen. Nutze dafür die `log_errors` Direktive und lasse Dir die Fehlermeldungen in einer Datei (definiert via `error_log`) protokollieren.

### Neue Konfiguration überprüfen

Speichere deine `php.ini` ab, starte Apache neu und aktualisiere deine `info.php` im Browser.

Stelle sicher, dass `error_reporting` einen Wert von `32767` (=`E_ALL`) hat, und `display_errors` auf `On` ist.
