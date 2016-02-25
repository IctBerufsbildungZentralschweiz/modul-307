# Clowns

![](res/clown.gif)

## Aufgabenstellung

Generiere auf Basis eines PHP-Arrays eine HTML-Liste.

### Zielumgebung

Das Script soll eine HTML-Seite generieren. Rufe es also in deinem Webbrowser auf.

### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Erstelle eine einfache HTML-Seite ohne PHP-Code, die folgende Liste bekannter Clowns enthält.

* Eugen Rosai
* Alfredo Smaldini
* Charlie Rivel
* Carl Godlewski
* Oleg Popow
* Herschel Krustofski

#### Schritt 2

Erstelle ein PHP-Array, welches die Namen der Clowns enthält. Generiere die Liste jetzt mit PHP.

#### Schritt 3

Die Liste soll alphabetisch sortiert ausgegeben werden. Verändere die Reihenfolge der Clowns in deinem Array nicht. Sortiere es [mit der entsprechenden PHP-Funktion](https://secure.php.net/manual/de/array.sorting.php).

* Alfredo Smaldini
* Carl Godlewski
* Charlie Rivel
* Eugen Rosai
* Herschel Krustofski
* Oleg Popow

#### Schritt 4

Wir möchten die Clowns, deren Name auf `-ski` endet, fett rot markieren. Erstelle die CSS-Klasse `.markiert` und setze die Schriftfarbe dafür auf rot und den Schriftstil auf **fett**.

Du kannst die CSS-Regel in ein `style` Tag innerhalb deines `head` Tags schreiben und musst nicht extra ein Stylesheet erstellen.

```html
...
<head>
    <style>
        .markiert {
            /* ... */
        }
    </style>
</head>
...
```

Vergib die `.markiert` Klasse nun allen `li` Elementen, die einen Namen enthalten, der auf `-ski` endet.

* Alfredo Smaldini
* **Carl Godlewski**
* Charlie Rivel
* Eugen Rosai
* **Herschel Krustofski**
* Oleg Popow


## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt.Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.
