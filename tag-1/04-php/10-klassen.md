# 10 Klassen

Klassen können grob als "Bauplan" angesehen werden, mit dem Bauplan selbst kann nichts gemacht werden, aber der Bauplan kann genutzt werden, um etwas herzustellen. Klassen können also nicht direkt benutzt werden, aber aus den Klassen können wir Objekte erzeugen, welche wir anschliessend nutzen können.

Stell dir vor, du hast eine Klasse `Auto` (einen Bauplan für ein Auto). Nun kannst du mit der Klasse ein konkretes Objekt erzeugen. Also könntest du zum Beispiel sagen: Klasse `Auto`, bau mir einen `Renault Clio` mit der Fahrzeug-Identifikationsnummer `VF1CB1N0501402066`.

* Wir brauchen Klassen (Baupläne) um Objekte (Gegenstände) zu erzeugen
* Mit Klassen selbst können wir nichts machen, nur mit Objekten
* Von einer Klasse können wir beliebig viele Objekte erstellen
* Objekte werden auch als Instanzen bezeichnet

## Klassendefinition

Einfache Klassendefinitionen beginnen mit dem Schlüsselwort `class`, gefolgt von einem Klassennamen, gefolgt von einem Paar geschweifter Klammern, welche die Definitionen der Eigenschaften und Methoden der Klasse enthalten.

Eine Klasse besteht aus ihren eigenen Konstanten, Variablen und Funktionen. Variablen werden innerhalb einer Klasse auch "Eigenschaften" genannt, Funktionen auch "Methoden".

Für Klassennamen gelten die gleichen Regeln wie für [Variablennamen](04-variablen.md). Für Klassennamen wird "UpperCamelCase" benutzt, für Eigenschaften (Variabeln) und Methoden (Funktionen) "lowerCamelCase".

Eine Klasse kann wie folgt definiert werden:

```php
class SimpleClass
{
    // Deklaration einer Eigenschaft
    public string $myVar = 'ein Standardwert';

    // Deklaration einer Methode
    public function displayVar()
    {
        echo $this->myVar;
    }
}
```

## Objekte erzeugen (Klassen instanzieren)

Um eine Instanz einer Klasse zu erzeugen, muss das `new`-Schlüsselwort verwendet werden.

```php
$instanz = new SimpleClass();
```

## Eigenschaften

Innerhalb einer Klasse können Eigenschaften definiert und methodenübergreifend genutzt werden. Diese werden definiert, indem man eines der Schlüsselwörter `public`, `protected` oder `private` gefolgt von einer optionalen Typen-Deklaration verwendet. Zuletzt folgt der Name der Eigenschaft.

Auf die Eigenschaft kann ausserhalb der instanzierten Klasse mit dem Objekt und dem Pfeiloperator `->` zugegriffen werden (sofern sichtbar). Innerhalb der Klasse ist es möglich mit dem Ausdruck `$this` und dem Pfeiloperator `->` auf eine definierte Variable zuzugreifen.

```php
class SimpleClass
{
    // Deklaration einer Eigenschaft
    public    string $var1 = 'Hallo Welt';
    private   string $var2 = 'Hallo ich';
    protected array  $var3 = ['Affe', 'Kuh'];

    // ...
    public function displayVar()
    {
        // Zugriff innerhalb der Klasse mit $this->
        echo $this->var1; // Hallo Welt
        var_dump($this->var3); // [0] => Affe, [1] => Kuh
        echo $this->var2; // Hallo ich
    }
}

// Die Klasse SimpleClass wird instanziert und 
// das Objekt in die Variable $instanz gespeichert.
$instanz = new SimpleClass(); 

// Auf die Variablen in der Klasse kann nun mit dem 
// Objekt und dem Pfeiloperator zugegriffen werden.
echo $instanz->var1; // Gibt 'Hallo Welt' aus

// Von aussen kann man nur auf Eigenschaften und Methoden 
// zugreiffen, die als "public" deklariert sind. Siehe "Sichtbarkeit".
echo $instanz->var2; // Gibt eine Fehlermeldung aus
```

### Methoden

Die Methoden in einer Klasse haben sehr ähnliche Eigenschaften wie normale Funktionen (siehe Kapitel `Benutzerdefinierte Funktionen`). Jedoch wird jede Methode mit einem der Schlüsselwörter `public`, `protected` oder `private` gefolgt von einer regulären Methodendeklaration definiert.

```php
class SimpleClass
{
    public function publicMethod()
    {
       // ...
    }

    protected function protectedMethod()
    {
       // ...
    }

    private function privateMethod()
    {
       // ...
    }
}

// Die Klasse SimpleClass wird instanziert und die Methode publicFunction() aufgerufen.
$instanz = new SimpleClass(); 
echo $instanz->publicFunction();
```

### Sichbarkeit

Die Sichtbarkeit einer Eigenschaft oder Methode kann definiert werden, indem man der Deklaration eines der Schlüsselwörter `public`, `protected` oder `private` voranstellt.

* Als `public` deklarierte Elemente (Variablen und Methoden) können von überall her zugegriffen werden.
* `Protected` beschränkt den Zugang auf die Elternklassen und abgeleitete Klassen sowie die Klasse, die das Element definiert.&#x20;
* `Private` grenzt die Sichtbarkeit einzig auf die Klasse ein, welche das Element definiert.

## Konstruktoren

PHP erlaubt es Entwicklern, Konstruktormethoden für Klassen zu deklarieren. Klassen mit Konstruktormethoden rufen diese für jedes neu erzeugte Objekt auf.

```php
class BaseClass
{
   protected string $var1;
   protected string $var2;

   public function __construct(string $var1, string $var2)
   {
       $this->var1 = $var1;
       $this->var2 = $var2;
   }

}

$firstClass = new BaseClass('Erbse', 'Baum');

// Gibt einen Fehler, da nicht alle benötigten Variablen übergeben wurden.
// Die Klasse wird nicht instanziert.
$secondClass = new BaseClass('Erbse');
```

### Constructor property promotion (ab PHP 8)

Ab PHP 8 gibt es neu eine Kurzschreibweise für Konstruktoren, mit der Eigenschaften direkt im Konstruktor definiert und gesetzt werden können.

```php
class BaseClass
{
   // AB PHP 8: Die Definition und Zuweisung der Eigenschaften kann 
   // optional direkt im Konstruktor vorgenommen werden. Dieses
   // Codebeispiel ist gleichbedeutend mit dem vorherigen:
   public function __construct(
      protected string $var1, 
      protected string $var2
   ) {}
}
```

## Aufgabe: Auto-Objekt

Nun wollen wir unser neues Wissen über Klassen gleich anwenden und den folgenden Code-Abschnitt durch eine Auto-Klasse ersetzen:

```php
$vehicle = "Auto";

$vehicles = [
    'Auto',
    'Velo',
    'Bus',
];

$car = [
    'brand' => 'Renault',
    'color' => 'Grey',
    'year' => '1990',
];

echo isOldtimer($car)
     ? "Beim {$car['brand']} handelt es sich um einen Oldtimer."
     : "Beim {$car['brand']} handelt es sich um keinen Oldtimer.";
```

Lösche dazu den oben aufgeführten Code-Abschnitt und erstelle die Klasse `Car`.

Bei **jeder** Instanzierung der Klasse sollen folgende Eigenschaften übergeben und dem Auto-Objekt zugewiesen werden: `Marke`, `Farbe` und `Jahrgang`.

Initialisiere nun die Klasse und erstelle das Auto-Objekt: Renault, rot, 1990

```php
$car = new Car('Renault', 'rot', 1990);
```

## Aufgabe: Tanken

Neben den drei Attributen oben, verfügt jedes Auto noch über eine Tankfüllung. Einfachheitshalber ist der Tank bei jedem neuen Auto-Objekt leer (0).

Nach der Instanzierung vom Auto-Objekt soll eine Methode in der Klasse aufgerufen werden, welche die Füllung des Tanks um einen gewissen Betrag erhöht.

```php
$car = new Car('Renault', 'rot', 1990); 
$car->refuel(45);   // Das Auto wurde mit 45 Liter betankt.
```

Gib das Auto-Objekt mit einem `var_dump`-Konstrukt in der Datei `index.php` aus.

## Aufgabe: Gefahrene Kilometer

Nach einigen gefahrenen Kilometern möchten wir wissen, wieviel Benzin wir noch im Tank haben. Dazu muss der verbrauchte Kraftstoff vom Tankinhalt abgezogen werden.

Wir wissen, der Verbrauch des Autos liegt bei 8 Litern pro 100 Kilometer.

Wir möchten nun die Anzahl gefahrener Kilometer an eine Methode übergeben, welche den Füllstand des Auto-Objekts aktualisiert.

```php
$car = new Car('Renault', 'rot', 1990); 
$car->refuel(45);   // Das Auto wurde mit 45 Liter betankt. 
$car->drive(100);  // Wir sind mit dem Auto 100 Kilometer gefahren.
```

Gib den aktualisierten Füllstand des Auto-Objekt nun aus.

## Aufgabe: Auto-Liste

Nun möchten wir in der Datei `index.view.php` eine Liste aller Autos mit dem dazugehörigen Füllstand anzeigen.

Erfasse mindestens drei weitere Autos und gib diese als Liste (Marke | Füllstand) in der Datei `index.view.php` aus.

### Zusatzaufgabe: Füllstand farbig markieren (freiwillig)

Verpacke die ausgegebenen Werte in der Datei `index.view.php` in `<span>`-Tags und füge mit PHP folgende CSS-Klassen ein:

* Wenn Füllstand > 90%: `<span class='full'>`
* Wenn Füllstand < 10%: `<span class='empty'>`

Erstelle im HTML-Head einen `<style>`-Abschnitt oder eine externe CSS-Datei und färbe die Ausgaben grün bzw. rot.
