# 01 Bottles of Beer

![](../../.gitbook/assets/beers.gif)

## Aufgabenstellung

Schreibe ein PHP-Script, welches den Songtext des Liedes «99 Bottles of Beer» ausgibt: [http://www.99-bottles-of-beer.net/lyrics.html](http://www.99-bottles-of-beer.net/lyrics.html)

### Zielumgebung

Nutze zur Strukturierung des Codes die erstellte MVC-Umgebung:

`BeerController.php` =&gt; Logik `beer.view.php` =&gt; Ausgabe

### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Das Script soll einen Vers für alle 99 Flaschen ausgeben. Nach der ersten Zeile soll ein Zeilenumbruch ausgegeben werden. Nach der zweiten Zeile sollen zwei Zeilenumbrüche folgen.

> `99` bottles of beer on the wall, `99` bottles of beer.  
>  Take one down and pass it around, `98` bottles of beer on the wall.
>
> `98` bottles of beer on the wall, `98` bottles of beer.  
>  Take one down and pass it around, `97` bottles of beer on the wall.  
>  ...

#### Schritt 2

Wenn nur noch eine Flasche übrig ist, soll das Wort `bottles` in der Einzahl als `bottle` ausgegeben werden.

> ...  
>  2 `bottles` of beer on the wall, 2 `bottles` of beer.  
>  Take one down and pass it around, 1 `bottle` of beer on the wall.  
>
>
> 1 `bottle` of beer on the wall, 1 `bottle` of beer.  
>  Take one down and pass it around, 0 `bottles` of beer on the wall.

#### Schritt 3

Wenn keine Flaschen mehr vorhanden sind, soll der letzte Vers ausgegeben werden:

> No more bottles of beer on the wall, no more bottles of beer.   
>  Go to the store and buy some more, 99 bottles of beer on the wall.

#### Schritt 4

Lagere die doppelt ausgeführte Abfrage für die Singular-/Plural-Form des Wortes `bottle` in eine Funktion `getWord` aus.

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt. Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.

