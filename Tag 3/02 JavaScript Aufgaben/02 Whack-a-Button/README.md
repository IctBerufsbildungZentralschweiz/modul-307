# Whack-a-Button

![](res/kitty.gif)


## Aufgabenstellung

Erstelle das Reaktionsspiel «Whack-a-Button» mit Hilfe von jQuery.

Ein Button verschiebt sich nach einer gewissen Zeit, nachdem man mit dem Mauscursor darüber fährt, an eine neue Stelle auf dem Bildschirm. Das Ziel das Spielers ist es, den Button möglichst oft anzuklicken.

Nach jedem erfolgreichen Klick verschiebt sich der Button schneller an eine neue Stelle, was das Klicken erschwert.


### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Erstelle eine einfache HTML-Seite. Füge auf dieser Seite einen Button hinzu und positioniere diesen via CSS absolut im Body (`position: absolute`).

```html
<button id="button">Whack me!</button>
```

Integriere jQuery via offiziellem CDN-Link in deinem Dokument:

```html
<script src="http://code.jquery.com/jquery.min.js"></script>
```

Erstelle danach ein Code-Block der ausgeführt wird, sobald das DOM `ready` ist:

```html
<script>
    $(function() {
        // DOM ist ready
    });
</script>
```

#### Schritt 2

Erstelle im Code-Block einen jQuery-Selector, der dein Button auswählt und speichere diesen in die Variable `$button`.

```js
var $button = ...;
```

Erstelle ein Event-Listener für den `mouseenter` Event. Dieser wird ausgeführt, sobald der Mauszeiger sich über den Button bewegt.

Vorübergehend soll eine Meldung in der Konsole ausgegeben werden, sobald der Event auftritt.

```js
$button.on('mouseenter', function() {
    // Wird ausgeführt, sobald die Maus sich
    // über den Button bewegt
    console.log('Maus ist darüber!');
});
```

Stelle sicher, dass in deiner Konsole nur die gewünschte Ausgabe erscheint und keine Fehler vorhanden sind.

#### Schritt 3

Sorge dafür, dass der Button beim `mouseenter` Event automatisch an die Position `left: 10%` und `top: 15%` verschoben wird. Dies kannst Du mit Hilfe der `css`-Methode lösen.

[`jQuery.css()` auf w3schools.com](http://www.w3schools.com/jquery/jquery_css.asp)

#### Schritt 4

Anstelle der fixen Position, möchten wir diese nun mit Hilfe von `Math.random()`zufällig neu generieren.

Erweitere dein Script so, dass der Button beim `mouseenter` immer an eine neue Stelle springt.

[`Math.random()` auf MDN](https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Math/math.random)

#### Schritt 5

Momentan ist der Button noch viel zu schnell um ihn überhaupt 1x anklicken zu können. Daher müssen wir das Verschieben des Buttons etwas verzögern. Dazu können wir die Funktion `setTimeout` verwenden.

Sorge dafür, dass der Button sich erst 1 Sekunde nach dem `mouseenter` Event verschiebt.

[`setTimeout()` auf w3schools.com](http://www.w3schools.com/jsref/met_win_settimeout.asp)

##### Probleme mit `this`?

`setTimeout` ändert die Bedeutung des `this` Schlüsselwortes. Wenn du also den Button vorhin über `$(this).css(...)` neu positioniert hast, wird dies innerhalb von `setTimeout` nicht mehr funktionieren, da `this` nicht mehr auf den Button verweist. Dieses Problem kannst du lösen, in dem du `this` vor dem `setTimeout` in eine Variable speicherst und diese verwendest:

```js
var that = this;
setTimeout(function() {
    $(that).css(...);
}, 500);
```

Alternativ kann mittels `bind` das `this` Schlüsselwort neu definiert werden.

```js
setTimeout(function() {
    $(this).css(...);
}.bind(this), 500);
```

#### Schritt 6

Der Button bewegt sich nun wie gewünscht. Was wir noch benötigen ist eine Möglichkeit, den Klick auf den Button zu registrieren.

Gib den Text `Angeklickt!` in der Konsole aus, sobald auf den Button geklickt wird.

#### Schritt 7

Es wird Zeit, Punkte zu zählen!

Erstelle eine Variable `points` und erhöhe deren Wert jeweils um 1, sobald auf den Button geklickt wurde. Gib den neuen Punktestand in der Konsole aus.

#### Schritt 8

Unser Spiel funktioniert schon fast wie gewünscht. Einzig die Verzögerung ist derzeit noch fix auf 1 Sekunde eingestellt.

Ersetze die `setTimeout`-Verzögerung von derzeit 1000 Millisekunden mit einer neuen Variable `delay`. 

Reduziere `delay` nach jedem Klick auf den Button um 25 Millisekunden.

Gib den aktuellen Wert von `delay` zusammen mit dem Punktestand in der Konsole aus.  

#### Schritt 9 (Zusatzaufgabe)

Uns wurde ein Bug im Spiel gemeldet!

Wenn der Spieler den Mauszeiger innerhalb einer Sekunde mehrmals über den Button und wieder davon weg bewegt, verschiebt sich der Button anschliessend mehrere Male. 

Was ist hier das Problem? Wie kannst Du es beheben?

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt.Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.
