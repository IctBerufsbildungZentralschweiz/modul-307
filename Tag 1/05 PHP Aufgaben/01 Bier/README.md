# 99 Bottles of Beer

![](res/beers.gif)

## Aufgabenstellung

Schreibe ein PHP-Script, welches den Songtext des Liedes «99 Bottles of Beer» ausgibt: http://www.99-bottles-of-beer.net/lyrics.html

### Zielumgebung

Die Scriptausgabe soll in der Kommandozeile erscheinen. Starte das Script also aus der Kommandozeile mit `php -f script.php`.

### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1
Das Script soll einen Vers für alle 99 Flaschen ausgeben.
Nach der ersten Zeile soll ein Zeilenumbruch ausgegeben werden. Nach der zweiten Zeile sollen zwei Zeilenumbrüche folgen.

> `99` bottles of beer on the wall, `99` bottles of beer.<br />
>Take one down and pass it around, `98` bottles of beer on the wall.
>
>`98` bottles of beer on the wall, `98` bottles of beer.<br />
>Take one down and pass it around, `97` bottles of beer on the wall.<br />
> ...

#### Schritt 2

Wenn nur noch eine Flasche übrig ist, soll das Wort `bottles` in der Einzahl als `bottle` ausgegeben werden.

> ...<br />
>2 `bottles` of beer on the wall, 2 `bottles` of beer.<br />
>Take one down and pass it around, 1 `bottle` of beer on the wall.<br />
>
>1 `bottle` of beer on the wall, 1 `bottle` of beer.<br />
>Take one down and pass it around, 0 `bottles` of beer on the wall.<br />

#### Schritt 3

Wenn keine Flaschen mehr vorhanden sind, soll der letzte Vers ausgegeben werden:

> No more bottles of beer on the wall, no more bottles of beer. <br />
> Go to the store and buy some more, 99 bottles of beer on the wall.

#### Schritt 4

4. Nimm die Datei `beers_3.php` als Grundlage. Lagere die doppelt ausgeführte Abfrage (Zeilen 6 und 7) für die Singular-/Plural-Form des Wortes `bottle` in eine Funktion `getWord` aus.

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt.Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.
