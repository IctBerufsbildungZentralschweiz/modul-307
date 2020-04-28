# Einrichtung Entwicklungsumgebung

## Webserver

Als Webserver verwenden wir Apache mit PHP 7. Um die Installation zu vereinfachen, greifen wir auf XAMPP zurück.

XAMPP ist ein Software-Paket, welches die Installation von Apache mit PHP auf Linux, Mac und Windows vereinfacht. XAMPP sollte nur für Entwicklungszwecke und nicht für den produktiven Betrieb verwendet werden.

### Installation von XAMPP

1. Führe das XAMPP-Setup aus. Du findest den Installer auf dem Austausch-Laufwerk.
2. Es reicht aus, dass Du nur die folgenden Komponenten installierst: Apache, PHP.
3. Installiere XAMPP ins Verzeichnis `C:\xampp`
4. **Deaktiviere die Option «Learn more about Bitnami for XAMPP»**

### XAMPP Control Panel

Das XAMPP Control Panel startet nach erfolgreicher Installation automatisch. Falls nicht, findest Du es im Startemenü.

Nach dem Starten wird das CP im Systemtray neben der Uhr angezeigt. Klicke das Icon an um das Fenster zu öffnen.

Das CP ermöglicht Dir, die XAMPP-Dienste zu starten und zu stoppen.

Stelle sicher, dass Du den Apache-Dienst erfolgreich starten und stoppen kannst.

![](res/xampp-cp.png)

Besuche in Deinem Browser die URL [`http://localhost`](http://localhost). Wenn alles funktioniert, solltest Du nun die XAMPP-Begrüssungsseite sehen.

![](res/xampp-dashboard.png)


### Das `htdocs` Verzeichnis

Unter `C:\xampp\htdocs` befindet sich der so genannte `DocumentRoot` deines Servers. Alle Dateien aus diesem Verzeichnis sind direkt via `http://localhost` zugänglich.

1. Lösche alle mitgelieferten Dateien im `htdocs` Verzeichnis.
2. Lade [`http://localhost`](http://localhost) in Deinem Browser neu - du solltest nun eine Fehlermeldung erhalten.
3. Erstelle den Ordner `modul-307` und darin die Datei `test.txt`.
4. Schreibe etwas in die Textdatei.
5. Du kannst diese Datei nun via `http://localhost/modul-307/test.txt` aufrufen.

#### `DirectoryIndex`

Wenn Du über die URL ein Verzeichnis aufrufst, ohne eine Datei anzugeben, wird Apache automatisch eine der folgenden Dateien laden, sofern diese existiert:

> **index.php** index.pl index.cgi index.asp index.shtml **index.html** **index.htm** default.php default.pl default.cgi default.asp default.shtml default.html default.htm home.php home.pl home.cgi home.asp home.shtml home.html home.htm

Benenne Deine `test.txt` in `index.html` um und rufe im Browser `http://localhost/modul-307/` auf. Die `index.html` wird jetzt automatisch geladen.


## Editor

Um produktiv arbeiten zu können, solltest du einen modernen Text-Editor verwenden. Welchen Editor du für diesen ÜK verwendest, ist dir überlassen. WYSIWYG-Editoren wie zum Beispiel Dreamweaver sind nicht erlaubt.

Es ist von Vorteil, wenn der Editor deiner Wahl Plugins unterstützt.

### Empfehlungen

Wir empfehlen dir einen der folgenden Editoren zu benutzen und die weiter unten aufgeführten Plugins zu installieren.

#### Visual Studio Code

1. Installer von [code.visualstudio.com](https://code.visualstudio.com/) herunterladen
2. Visual Studio Code installieren und starten
3. Bei den Plugins nach unten erwähnten Plugins suchen

#### Sublime Text

1. Installer von [sublimetext.com](https://www.sublimetext.com/3) herunterladen
2. Sublime Text installieren und starten
3. Die Tastenkombination `Ctrl + Shift + P` drücken und `Install Package Control` suchen und markieren
4. Package Control mit Enter installieren und Sublime Text anschliessend neu starten


##### Plugins installieren

Um Plugins zu installieren, drücke die Tastenkombination `Ctrl + Shift + P` und gib `Install Package` ein. Drücke `Enter`. Du kannst jetzt den Namen des Plugins eingeben, mit den Pfeiltasten auswählen und mit `Enter` installieren.

#### Atom

1. Installer von [atom.io](https://atom.io/) herunterladen und ausführen.
2. Das Programm `Atom` starten.

##### Plugins installieren

Um Plugins zu installieren, gehe im Menü auf `File -> Settings -> Install`. Du kannst jetzt den Namen eines Plugins eingeben und es über den «Install»-Button installieren.

### Plugin-Empfehlungen

Folgende Plugins kannst du installieren, um dir das Arbeiten etwas zu vereinfachen.

#### Emmet

Emmet ermöglicht es dir, einen CSS-Selektor via TAB-Taste in die entsprechende HTML-Struktur umzuwandeln.

Emmet ist bei Visual Studio Code bereits installiert und muss nicht extra hinzugefügt werden.

```
a  -> TAB-Drücken

// ergibt:
<a href=""></a>
_____________________________

h1{Überschrift}+p{Absatz}  -> TAB-Drücken

// ergibt:
<h1>Überschrift</h1>
<p>Absatz</p>
_____________________________

ul>li{Punkt $}*3  -> TAB-Drücken

// ergibt:
<ul>
    <li>Punkt 1</li>
    <li>Punkt 2</li>
    <li>Punkt 3</li>
</ul>
```

#### PHP Hints

Autocomplete-Funktionen, die Dir bei der Eingabe von PHP-Code helfen, kannst Du über folgende Plugins erhalten:

|    Editor    |      Plugin Name      |
|--------------|-----------------------|
| Visual Studio Code     | PHP IntelliSense        |
| Sublime Text | PHP Completions Kit   |
| Atom         | atom-autocomplete-php |

##### Hinweis zu `atom-autocomplete-php`:

Wird bei der Installation ein Fehler ausgeben, gehe nach der Installation in die Plugin-Einstellungen und gib unter `Command php` folgenden Wert ein:

```
c:\xampp\php\php.exe
```

Starte Atom anschliessend neu.

Du wirst jetzt zwar immer noch eine Fehlermeldung erhalten, jedoch funktioniert die Autovervollständigung trotzdem.

`¯\_(ツ)_/¯`

#### Weitere Plugins

* `Live Share Extension Pack` (für Zusammenarbeit)
* `Bracket Pair Colorizer 2`
* `Live Server` oder `Open In Web` (für schnelle Anzeige im Browser)
* `ftp-sync` (für direkten FTP-Upload)
* `HTML CSS Support` und `Color Highlight` (fürs Styling)
* Siehe auch [My Favorite VS Code Extensions](https://youtu.be/rH1RTwaAeGc)
