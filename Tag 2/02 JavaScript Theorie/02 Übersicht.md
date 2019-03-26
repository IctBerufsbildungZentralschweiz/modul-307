# JavaScript Übersicht

## Codeschreibweise

Die Syntax ähnelt sehr jener von PHP. Daher wird diese Übersicht etwas kürzer gehalten.

Wie in PHP werden alle Anweisungen durch ein Semikolon `;` beendet. Zeilenumbrüche und Leerzeichen sind nicht relevant. Die Gross- und Kleinschreibung wird in JavaScript berücksichtigt! (Case-Sensitive)

### JavaScript in HTML

Möchtest du JavaScript in HTML-Code verwenden, umschliesse es mit einem `script`-Tag. Das `script`-Tag ist innerhalb des `body` oder `head` Tags zugelassen.

```html
<div>
    <p>Etwas HTML...</p>
</div>

<script>
    var name = 'Robert Pattinson';
</script>
```

Die Eingabe des `type` Attributs ist seit HTML5 optional. Du wirst online jedoch noch zahlreiche Beispiele finden, bei denen dieses vorhanden ist.

```html
<script type="text/javascript">...</script>
```

### JavaScript als externe Datei

Du kannst über das `script`-Tag via `src`-Attribut auch JavaScript aus externen Dateien einbinden. Der Code in reinen JavaScript-Dateien muss nicht von Tags umschlossen werden.

```js
// vars.js
var name = 'Robert Pattinson';
```

```html
<!-- index.html -->
<script src="vars.js"></script>
```

### Performance

Da das Ausführen von JS im Browser das Rendern der Website blockieren kann, sollte alles JS so weit wie möglich ans Ende des Dokuments verschoben werden (optimalerweise direkt vor `</body>`). 

So kann der Browser die Website zuerst rendern und muss sich erst dann mit der Ausführung des JS-Codes befassen.

## Konsolenausgabe

Um eine Ausgabe in die Entwicklerkonsole deines Browser zu machen, nutze `console.log`.

```js
console.log('Hallo Welt!');
```

`console` ist hier das Konsolen-Objekt, welches mehrere Methoden zur Verfügung stellt. Via `.` kannst du auf diese Methoden zugreifen.

```js
console.error('Fehler, den ich in die Konsole logge');
console.info('Information, die ich in die Konsole logge');
```

## Variablen

Variablen werden via `var` oder seit ES6 mit den Keywords `let`/`const` definiert. Anders als bei PHP müssen die Variablen nicht mit einem Dollarzeichen beginnen.

```js
var alter = 17;
let istLernender = true;
```

Da die `let`/`const` Keywords noch nicht in allen Browsern unterstützt werden (Stand November 2015), werden wir in unseren Beispielen einfachheitshalber immer das `var` Keyword verwenden. 

Mit `let` definierte Variablen haben einen andern Geltungsbereich wie mit `var` definierte. Siehe «Geltungsbereich von Variablen» weiter unten.

Mit `const` definierte Variablen können nach ihrer Definition nicht mehr geändert werden (=Konstante).


### Booleans

```js
var istWahr   = true;
var istFalsch = false;
```

### Integer

```js
var alter = 17;
```

### Float

```js
var einViertel = 0.25;
var MwSt = 8.0;
```

### String

Ein String muss mit doppelten `"`oder einfachen Anführungszeichen `'` umschlossen werden. Anders als bei PHP gibt es in JS keine Unterschiede zwischen beiden Methoden.

```js
var name = 'Robert Pattinson';
var name = "Robert Pattinson";
```


#### Konkatenation

In JS wird für die Konkatenation von Strings der `+` Operator verwendet.

```js
var name = 'Robert Pattinson';

console.log('Mein Lieblingsschauspieler ist ' + name);
```

Verkettungen sind auch über mehrere Zeilen möglich. Eine String-Deklaration darf jedoch keine Zeilenumbrüche enthalten.

```js
var nichtMoeglich = 'Ein String über
mehrere Zeilen';

var korrektIst = 'Ein String über'
               + 'mehrere Zeilen';
```

Seit ES6 gibt es zudem die sogenannten `Template-Strings` mit deren Hilfe mehrzeilige Strings einfacher deklariert werden können. Zur Deklaration verwendet man hier Backticks (`).

```js
var mehrzeilig = `Ein String
über
mehrere 
Zeilen`;
```

[Browser-Support für Template-Strings](https://kangax.github.io/compat-table/es6/#test-template_strings)

#### Parsing von Variablen

Variablen können anders als in PHP nicht direkt in normale Strings eingebettet werden. Es muss immer konkateniert werden. Alternativ müssen Template-Strings verwendet werden.

```js
var film = 'Twilight';

var satz = 'Mein Lieblingsfilm ist ' + film;
var satz = `Mein Lieblingsfilm ist ${film}`;
```

### Arrays

```js
var edelmetalle = ['Gold', 'Platin', 'Iridium', 'Silber'];

edelmetalle[0]; // Gold
edelmetalle[1]; // Platin
```

#### Assoziative Arrays / Objekte

In JavaScript gibt es genau genommen keine Arrays sondern nur Objekte. Dies wird deutlich, sobald ein assoziatives Array mit Schlüssel-Wert-Paaren definiert werden soll.

Anders als bei Arrays werden hier `{}` zur Definition verwendet. Schlüssel und Werte werden via `:` getrennt.

```js
var wochentage = {
    mo: 'Montag',
    di: 'Dienstag',
    mi: 'Mittwoch',
    do: 'Donnerstag',
    fr: 'Freitag',
    sa: 'Samstag',
    so: 'Sonntag'
};
```

Der Schlüssel kann hier auch in `''` geschrieben werden. Dies ist jedoch nicht zwingend notwendig.

Der Zugriff auf die einzelnen Objekt-Properties kann jetzt mit `.` oder `[]`-Syntax geschehen.

```js
wochentage.mo;    // Montag
wochentage['mo']; // Montag
```


## Standardobjekte

In JavaScript stehen diverse Standardobjekte zur Verfügung. Diese sind das Pendant zu den internen Funktionen von PHP.

Wird beispielsweise ein String definiert, wird dieser als Instanz eines `String` Objekts erstellt. Dadurch hat man Zugriff auf die diversen Properties und Methoden dieses Objekts.

```js
var spruch = 'Hasta la vista, Baby';

spruch.length;                    // 20
spruch.toUpperCase();             // "HASTA LA VISTA, BABY"
spruch.replace('Baby', 'Justin'); // "Hasta la vista, Justin"
```


## Benutzerdefinierte Funktionen

Funktionen in JavaScript werden wie in PHP definiert. 

Type-Hints existieren in JS nicht. Standardwerte für optionale Argumente können erst seit ES6 definiert werden.

```js
function sagwas(wort1, wort2) {
    console.log(wort1 + ' ' + wort2);
}

sagwas('Hallo', 'Welt');
// Hallo Welt

// Erst seit ES6
function sagwas(wort1, wort2 = 'Welt') {
    console.log(wort1 + ' ' + wort2);
}

sagwas('Hallo');
// Hallo Welt
```

### Geltungsbereich von Variablen

Deklarierte Variablen sind immer in dem Kontext gültig, in dem sie deklariert wurden.

Global definierte Variablen stehen also überall (auch in untergeordneten Funktionen) zur Verfügung.

```js
var zahl = 20;

function demo() {
    return zahl;
}

demo();
// 20
```

In Funktionen definierte Variablen sind ausserhalb der Funktion nicht verfügbar.

```js
function demo() {
    
    var zahl = 20;
}

demo();
console.log(zahl)
// undefined
```

Wir eine Variable global definiert (via `var`) und in einer Funktion verändert, ist die Variable im globalen Geltungsbereich ebenfalls angepasst.

```js
var zahl;

function demo() {
    zahl = 20;
}

demo();
console.log(zahl)
// 20
```

#### Hoisting

Variablendeklarationen werden von der JS-Engine vor dem Ausführen des eigentlichen Codes durchgeführt. Dieser Umstand nennt sich «Hoisting». So kann eine Variable in JS verwendet werden, bevor sie deklariert wurde. 

Dies kann in spezifischen Situationen zu unerwartetem Verhalten führen.

```js
console.log(zahl);
// 20

var zahl = 20;
```
```js
// Resultierender Code für die JS-Engine
// Die Deklaration wird an den Anfang "geschoben"

var zahl = 20;
console.log(zahl);
// 20
```

### `var` vs. `let`

Seit ES6 steht neben `var` auch das `let` Schlüsselwort zur Deklaration von Variablen zur Verfügung. Je nach Schlüsselwort haben die Variablen andere Geltungsbereiche.

`var` ist immer für den umgebenden Funktionsblock gültig. `let` gilt immer nur für den nächsten «umschliessenden» Block.

```js
// Definition mit `var` ist für komplette Funktion gültig
function demo() {
    // i existiert (wegen hoisting)
    for(var i = 0; i < 10; i++) {
        // i existiert
    }
    // i existiert
}


// Definition mit `let` ist nur für `for` Block gültig
function demo() {
    // i ist nicht definiert
    for(let i = 0; i < 10; i++) {
        // i exisitert
    }
    // i ist nicht definiert
}
```

## Sprachkonstrukte

### Operatoren

#### Vergleichs-Operatoren

Wie in PHP kann auch in JS ein typenschwacher `==` und typenstarker `===` Vergleich durgeführt werden. Die Vergleichsregeln unterscheiden sich jedoch von PHP.

Siehe [https://dorey.github.io/JavaScript-Equality-Table/](https://dorey.github.io/JavaScript-Equality-Table/)

#### Arithmetische Operationen 

Die Arithmetischen Operatoren funktionieren gleich wie in PHP.

```js
console.log(5 + 6);
// 11

console.log(12 / 6);
// 2
```


##### Inkrement- bzw. Dekrementoperatoren
Die Inkrement- und Dekrementoperatoren funktionieren gleich wie in PHP.

```js
var i = 1;

i++;
console.log(i);
// 2

i--
console.log(i);
// 1
```


### Kontrollstrukturen

#### if/then/else

Die `if/then/else` Konstrukte funktionieren gleich wie in PHP. Einziger Unterschied ist die Schreibweise von `else if` in zwei separaten Wörtern.

```js
if(a > b) {
    console.log('a ist grösser als b');
} else if(a < b) {
    console.log('a ist kleiner als b');
} else {
    console.log('a und b sind gleich gross');
}
```

##### Logische Operatoren

Es stehen die gleichen logischen Operatoren wie in PHP zur Verfügung. Die Schreibweisen `or`, `and` und `xor` existieren jedoch nicht.

* &&
* ||
* !

```js
if(a == 1 && b == 2) {
    console.log('a ist 1 und b ist 2');
}

if(a == 1 || b == 2) {
    console.log('a ist 1 oder b ist 2');
}
if( ! a == 1) {
    console.log('a ist nicht 1');
}
```

##### Ternärer Operator

Der Ternäre Operator steht auch in JS zur Verfügung.

```js
var text = (alter >= 18) ? 'Volljährig' : 'Minderjährig';
```

Die Klammern `( )` sind optional.

#### while, for

`for` und `while` funktionieren gleich wie in PHP.

```js
var zahl = 1;
while(zahl <= 10) {
    console.log(zahl++);
}
```

#### forEach

`forEach` steht in JS seit ES5.1 zur Verfügung und ist somit in allen modernern Browsern und IE >= 9 vorhanden.

`forEach` wird als Methode auf einem Array-Objekt ausgeführt. Dabei muss eine sogenannte `callback` Funktion definiert werden, die für jedes Element aufgerufen wird.

```js
var werktage = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag'];
werktage.forEach(function(element, index) {
    console.log(element, index);
});
// Montag     0
// Dienstag   1
// Mittwoch   2
// Donnerstag 3
// Freitag    4
```

Objekte verfügen über keine `forEach` Methode. Hier muss auf die `for...in` Syntax zurückgegriffen werden.

```js
var wochentage = {
    'mo': 'Montag',
    'di': 'Dienstag',
    'mi': 'Mittwoch',
    'do': 'Donnerstag',
    'fr': 'Freitag',
    'sa': 'Samstag',
    'so': 'Sonntag'
};

for(var key in wochentage) {
    console.log(key + ' ist kurz für ' + wochentage[key]);
}

// mo ist kurz für Montag
// di ist kurz für Dienstag
// mi ist kurz für Mittwoch
// do ist kurz für Donnerstag
// fr ist kurz für Freitag
// sa ist kurz für Samstag
// so ist kurz für Sonntag
```

##### Zugriff auf DOM-Elemente

```js
// Wähle ein Element mit der ID "submit" aus (<button id="submit"></button>)
var button = document.querySelector('#submit');

// Wähle ein Element mit der Klasse "submit" aus (<button class="submit"></button>)
var button = document.querySelector('.submit');

// Wähle alle Buttons aus
var buttons = document.querySelectorAll('button');
```