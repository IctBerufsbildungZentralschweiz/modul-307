# jQuery

> jQuery  ist eine freie JavaScript-Bibliothek, die Funktionen zur DOM-Navigation und -Manipulation zur Verfügung stellt.

[Wikipedia](https://de.wikipedia.org/wiki/JQuery)

Das Arbeiten mit dem DOM in JavaScript ist eine umständliche Angelegenheit. Aus diesem Grund greifen dafür viele Entwickler auf die heute sehr belibte JavaScript-Bibliothek «jQuery» zurück.

jQuery ist eine Sammlung von Funktionen, die das Arbeiten mit dem DOM vereinfachen.

## Einige Vergleiche

### Schriftfarbe eines Elements ändern

```js
// <h1 id="heading">Überschrift</h1>

// JavaScript
document.getElementById('heading').style.color = '#f00';

// jQuery
$('#heading').css('color', '#f00');
```

### Alle `input` Elemente auf der Seite leeren

```js
// JavaScript
[].forEach.call(document.getElementsByTagName('input'), function(e){
  e.value = '';
});

// jQuery
$('input').val('');
```

### Einen neuen `<li>` Punkt zu einer Aufzählung hinzufügen

```js
// <ul id="list"></ul>

// JavaScript
var ul = document.getElementById('list');
var li = document.createElement('li');
var text = document.createTextNode('Neuer Punkt');

li.appendChild(text);
ul.appendChild(li);


// jQuery
$('#list').append('<li>Neuer Punkt</li>');
```

## `$`

jQuery wird nach dem Laden in eine Variable namens `$` gespeichert. Über diese Variable erhält man Zugriff auf alle jQuery-Funktionen.

## Der Document-Ready Event

Wenn das DOM im Browser fertig generiert wurde, wird ein `ready` Event ausgeführt. Da wir in jQuery immer nur mit dem fertigen DOM arbeiten möchten, ist jeder jQuery-Code zwingend innerhalb eines `$(document).ready()` Blocks zu platzieren.

Dieser Code wird ausgeführt, sobald vom Browser der `ready` Event ausgelöst wurde.

```js
$(document).ready(function() {
    // jQuery Code hier hin
    // Wir können sicher sein, dass das DOM vollständig generiert wurde
});
```

Es existiert eine alternative Kurzschreibweise, die ebenfalls verwendet werden kann:

```js
$(function() {
    // Dokument ist ready
});
```


## Objekte aus dem DOM auswählen

Mittels `$(selector)` können Elemente aus dem DOM selektiert werden. Für die Selektion können CSS-Selektoren verwendet werden:

```js
$('p'); // Alle <p> Tags
$('#el'); // Element mit der <div id="el">
$('.rot'); // Alle Elemente mit der Klasse <div class="rot">
$('input[type="text"]'); // Alle Text Inputs
```

## Objekte aus dem DOM manipulieren

Hat man ein Element aus dem DOM selektiert, kann es über diverse Funktionen manipuliert werden.

```js
$('p').hide(); // Alle <p> Tags verstecken
$('#el').css('color', '#f00'); // CSS `color` Regel auf rot setzen
$('input[type="text"]').val('Neuer Text'); // Den Text aller Inputs auf `Neuer Text` ändern
$('.rot').html('<p>Ich bin rot!</p>'); // Den HTML-Inhalt aller .rot-Elemente ändern
```

## Events

In JavaScript existieren viele Events, die während der Interaktion mit einer Website ausgelöst werden. jQuery macht es einfach, auf solche Events zu warten und eine Aktion beim Auftreten zu definieren.

Dazu kann die `.on()` Funktion verwendet werden. Als erster Parameter wird dieser Funktion den Namen eines Events mitgegeben.

Der zweite Parameter ist eine Callback-Funktion, also eine Funktion, die ausgeführt wird, sobald der Event auftritt.


```js
$('.button').on(eventName, Funktion);

$('.button').on('click', function() {
    console.log('Der Button wurde angeklickt.');
});
```

## Best practices

Beim Arbeiten mit jQuery gibt es einige Best Practices, die man immer im Hinterkopf haben sollte.

### Selektoren zwischenspeichern

Das Auswählen eines DOM-Elements ist mit viel JavaScript-Code verbunden, der bei jeder Verwendung von `$(selector)` ausgeführt werden muss. Dies kann die Performance deines Scripts beinflussen!

Damit die Selektoren-Funktionen nicht immer neu ausgeführt werden müssen, sollten sie in einer Variablen zwischengespeichert werden. Dies empfiehlt sich vor allem bei Selektoren, die öfters verwendet werden.

Wenn du einen Selektor nur 1x auf deiner Website verwendest, ist dies natürlich nicht nötig.

```js
/**
 * Schlechtes Beispiel
 */
$('.button').hide();
// ...
$('.button').css('color', '#f00');
// ...
$('.button').show();
// ...
$('.button').on('click', function() {});
```

In obenstehendem Code werden die `.button`-Elemente 4x neu aus dem DOM selektiert. In untenstehendem Code muss die Abfrage nur 1x ausgeführt werden.

```js
/**
 * Besser ist
 */
var $button = $('.button');

$button.hide();
// ...
$button.css('color', '#f00');
// ...
$button.show();
// ...
$button.on('click', function() {});
```

### jQuery-Variablen mit `$` beginnen

Um jQuery-Objekte besser von normalen Variablen unterscheiden zu können, werden sie häufig in Variablen die mit `$` beginnen abgespeichert.

```js
var neuerText = 'Mein Button';
var $button   = $('#button');

$button.text(neuerText);
```

Das Dollarzeichen hat in diesem Fall nichts mit jQuery zu tun, sondern ist einfach Teil des Variablennamens.

### Mehrere Operationen aneinanderketten

Im obigen Beispiel mit dem Button ist es nicht zwingend notwendig alle Operationen separat auszuführen. Falls alle Operationen direkt nacheinander und auf dem selben Objekt ausgeführt werden sollen, können sie aneinandergekettet werden, sofern dies die Lesbarkeit des Codes erhöht:

```js
$button.hide().css('color', '#f00').show().on('click', function() {});

// oder besser lesbar
$button
    .hide()
    .css('color', '#f00')
    .show()
    .on('click', function() {});
```


## Das `this` Schlüsselwort

`this` ist in JavaScript ein spezielles Schlüsselwort, das von seinem Kontext abhängig ist. In jQuery kann es beispielsweise in Callback-Funktionen verwendet werden, um auf ein Element zuzugreifen:

```js
// <button class="button">Text 1</button>
// <button class="button">Text 2</button>
// <button class="button">Text 3</button>

$('.button').on('click', function() {
    // this = der Button, auf den geklickt wurde
    console.log(this);

    // Gibt den Text des Buttons aus, auf
    // den geklickt wurde
    console.log($(this).text());

    // Gibt den Text von allen drei Buttons aus!
    console.log($('.button').text());
});
```


## Vorteile von jQuery

* Einfache Syntax für die Manipulation des DOM
* Einfache Syntax für das Handling von Events
* Schnellere Entwicklung dank weniger zu schreibendem Code
* Unterschiedliche JS-Verhalten in verschiedenen Browsern werden normalisiert

## Nachteile von jQuery

* Rund 80 kb Code, der vom Besucher zusätzlich heruntergeladen werden muss.
* [Über 10'000 Zeilen JavaScript-Code](https://code.jquery.com/jquery.js), die der Browser bei jedem Seitenaufruf verarbeiten muss!

Sei dir immer bewusst, dass die Verwendung von jQuery die Ladezeiten deiner Website beinflusst.

## Optimale Einbindung

Da jQuery eine relativ grosse Datenmenge zu deiner Website hinzufügt ist es ratsam, für die Einbindung eine `minified` Version ab einem CDN zu verwenden.

### Minified

Um die Datenmenge für den Transfer klein zu halten, werden JavaScript-Files minifiziert. Dabei werden alle nicht benötigten Leerzeichen aus einem Script entfernt und Variablennamen automatisch gekürzt.

Vergleiche https://code.jquery.com/jquery-2.1.4.js mit https://code.jquery.com/jquery-2.1.4.min.js

### CDN

Ein Content Delivery Network (kurz CDN) ist ein Service, bei dem eine Datei für dich auf diversen Servern auf der ganzen Welt gehostet wird. So kann eine Datei beim Abruf immer ab einem Server in der Nähe des Besuchers bezogen werden.

Ein zusätzlicher Vorteil ist, dass die CDN-Datei womöglich bereits im Browser-Cache deines Website-Besuchers ist, weil sie von einer anderen Website ebenfalls verwendet wurde.

CDN-Links für alle jQuery-Versionen findest du auf https://code.jquery.com/.

Die aktuellste Version kannst du immer über folgenden Link einbinden:

```
https://code.jquery.com/jquery.min.js
```
