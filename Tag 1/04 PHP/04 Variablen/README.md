# Variablen

Eine Variable wird in PHP durch das Dollar-Zeichen `$` gefolgt vom Namen der Variablen dargestellt. Bei Variablen-Namen wird zwischen Gross- und Kleinschreibung unterschieden (case-sensitive).

Ein gültiger Variablen-Name beginnt mit einem Buchstaben oder einem Unterstrich, gefolgt von einer beliebigen Anzahl von Buchstaben, Zahlen oder Unterstrichen.

```php
$variable;              // Gültig
$_variable;             // Gültig

$2ql4sql;               // Ungültig
$sonder!zeichen;        // Ungültig

$variable_mit_umläut;   // Gültig, jedoch nicht empfohlen
```

### Booleans

Dies ist der einfachste Typ. Ein boolean Ausdruck ist ein Wahrheitswert der entweder TRUE (wahr) oder FALSE (falsch) sein kann.

```php
$ichBinWahr = true;
$ichBinFalsch = false;
```

### Integer

Als `Integer` werden ganze, natürliche Zahlen bezeichnet.

```php
$alter = 17;
```

### Float

Eine Gleitkommazahl bezeichnen wir als `Float`.

```php
$einViertel = 0.25;
$mwst = 8.0;
```

### String

Ein String stellt eine Kette von Zeichen dar. Ein String muss mit doppelten `"`oder einfachen Anführungszeichen `'` umschlossen werden.

```php
echo 'Ein einfacher String';
echo "Ein einfacher String";
```

#### Konkatenation

Strings können konkateniert (=verkettet) werden. Dafür verwenden wir den `.` Operator.

```php
echo 'Ein' . ' verketteter ' . 'String';

// Verkettungen sind auch über mehrere Zeilen möglich
echo 'Ein sehr langer unleserlicher '
   . 'und deshalb über mehrere Zeilen verketteter '
   . 'String als Beispiel.';
```

Es ist auch möglich Variablen zu verketten.

```php
$popstar = 'Justin Bieber';

echo 'Ich liebe die Musik von ' . $popstar;
// Ich liebe die Musik von Justin Bieber
```

#### Parsing von Variablen

Variablen können direkt in einen String eingefügt werden, sofern dieser mit `"` deklariert wird.

```php
$popstar = 'Justin Bieber';

echo "Ich liebe die Musik von $popstar.";
// Ich liebe die Musik von Justin Bieber.

echo 'Ich liebe die Musik von $popstar.';
// Ich liebe die Musik von $popstar.
```

Es kann auch die alternative Schreibweise mit geschweiften Klammern verwendet werden.

```php
echo "Ich liebe die Musik von ${popstar}.";
echo "Ich liebe die Musik von {$popstar}.";
```


### Arithmetische Operationen

... oder einfacher gesagt: Rechnen.

```php
$a = 2;
$b = 4;

echo $a + $b;    // Addition
// 6

echo $a - $b;    // Subtraktion
// -2

echo $a * $b;    // Multiplikation
// 8

echo $a / $b;    // Divison
// 0.5

echo $a % $b;    // Modulus (Rest)
// 2

```

#### Inkrement- bzw. Dekrementoperatoren

Um den Wert einer Variable um eins zu erhöhen oder zu reduzieren, kann der Inkrement- `++` oder Dekrementoperator `--` verwendet werden.

```php
$a = 5;
$a++;  

echo $a;
// 6

$a--

echo $a;
// 5
```

## Aufgabe: Variable

Gehe zur bereits erstellten Datei `index.php` zurück. Lagere das Fahrzeug `Auto` deines Echo-Konstrukts in eine Variable aus.

Ersetze nun den Wert `Auto` mit einem anderen Fahrzeug (`Velo|Bus|Roller|Töffli`) und überprüfe, ob dein Echo-Konstrukt noch funktioniert.