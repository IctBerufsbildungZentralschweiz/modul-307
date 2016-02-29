# Schere, Stein, Paier


## Aufgabenstellung

Erstelle ein funktionierendes «Schere, Stein, Papier» Spiel in JavaScript.

### Zielverhalten

Das Script soll direkt nach dem Laden einer HTML-Seite ausgeführt werden. Es ist unterteilt in drei Schritte:

- Frage nach dem eigenen Spielzug (Schere, Stein oder Papier)
- Automatisches Generieren eines Spielzuges für den Gegenspieler (Computer)
- Erruieren des Gewinners

### Lösungsschritte

Entwickle das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes komplett erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Erstelle eine einfache HTML-Seite. Erstelle darin ein `script` Tag in dem du dein Code platzieren kannst.

Erstelle ein Array mit allen erlaubten Spielzügen (`Schere`, `Stein` und `Papier`).

```js
var erlaubt = [...];
```

Frage nach dem Spielzug des Spielers. Nutze dazu die `prompt` Funktion um die Eingabe in eine Variable zu speichern.

```js
var spielzugSpieler = prompt(...);
```

[Dokumentation zu `prompt` auf MDN](https://developer.mozilla.org/en-US/docs/Web/API/Window/prompt)

Überprüfe mittels `indexOf`-Methode, ob die Eingabe im Array mit den erlaubten Spielzügen vorhanden ist. Erstelle eine entsprechende Ausgabe mittels `alert`:

[Dokumentation zu `indexOf` auf MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/indexOf)

```js
if(/* spielzugNichtInErlaubtArray */) {
    alert('Der eingegebene Speilzug ist nicht erlaubt!');
    throw new Error('Unerlaubter Spielzug.');
} else {
    alert('Du hast ' + spielzugSpieler + ' eingegeben.');
}
```

> Mittels `throw` kannst Du einen Error erzeugen und somit auch dem Browser mitteilen, dass etwas schief gelaufen ist. Die Ausführung des Scripts wird dann sofort beendet. Der nachfolgende Code wird somit nicht ausgeführt.


#### Schritt 2

Wähle ein zufälliges Element aus dem `erlaubt` Array als Spielzug für den Computer aus. Speichere dieses in die Variable `spielzugComputer`. Gib diese via `alert` aus.


```js
alert('Der Computer spielt ' + spielzugComputer + '.');
```

Wie Du ein zufälliges Array-Element auswählen kannst, kann dir Google sicher verraten. Kannst du den gefundenen Code auch erklären?

#### Schritt 3

Erstelle ein Funktion `spiele`, die zwei Parameter `spielzugSpieler` und `spielzugComputer` akzeptiert. Die Funktion soll nun gemäss den «Schere, Stein, Papier» Regeln herausfinden, wer gewonnen hat. 

Als `return` Wert soll die Funktion entweder den String `Computer gewinnt`, `Spieler gewinnt` oder `Unentschieden` zurückgeben. Nutze die Funktion um das Ergebnis des Spiels via `alert` auszugeben.

```js
var resultat = spiele(spielzugSpieler, spielzugComputer);

alert('Das Endergebnis lautet: ' + resultat);
```

#### Schritt 4 (Zusatzaufgabe)

Stelle sicher, dass die Gross- und Kleinschreibung sowie vorhergehende oder folgende Leerzeichen in der Eingabe keine Auswirkung haben.

`SCHERE`, ` schere `, `StEiN `, `PaPIER` müssen alle als Eingabe akzeptiert werden.

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt. Natürlich ist die Ausgabe des Scripts entscheidend, nicht der Code dazu.

Es sind also mehrere Lösungen möglich, solange durch die richtige Logik die gewünschte Ausgabe erzeugt wird.
