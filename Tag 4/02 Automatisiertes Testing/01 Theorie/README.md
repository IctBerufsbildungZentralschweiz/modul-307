# Automatisiertes Testing

Ein Nachteil von manuell ausgeführten Tests ist, dass diese sehr viel Zeit in Anspruch nehmen. Zudem kommt der Mensch als weitere mögliche Fehlerquelle bei der Ausführung der Tests hinzu.

Bei automatisiterten Tests hat man die Gewissheit, dass alle Ausführungen der Tests immer einheitlich sind. 

Der zusätzliche Entwicklungsaufwand für die Tests macht man über längere Zeit meist wieder gut. Insbesondere bei zukünftigen Anpassungen an einer Software geben bestehende Tests die Sicherheit, dass die Software auch nach den Änderungen noch wie erwartet funktioniert.

## Funktionsweise

### Einfache Testfunktion

Die Tests werden als ausführbarer Code entwickelt. Dies kann im einfachsten Fall ein PHP-Script sein, welches eine Funktion mit bestimmten Parametern aufruft, und deren `return` Wert mit einem erwarteten Wert vergleicht. Diesen Vergleich nennt man auch «Assertion».

```php
function add($a, $b)
{
    return $a + $b;
}

// Unit-Test
if(add(2, 3) === 5) {
    echo 'Test erfolgreich';
} else {
    echo 'Test nicht erfolgreich';
}
```

Um bei mehreren Tests etwas mehr Übersicht zu schaffen und z. B. auch gleich noch eine Beschreibung zur jeweiligen Assertion zu geben, können wir uns eine einfache `test` Funktion bauen:

```php
// ...

function test($description, $result)
{
    echo $description . '-> ';
    echo $result === true ? 'PASSED' : 'FAILED';
    echo "\n";
}

test('Addiert positiv richtig', sum(4, 2) === 6);
test('Addiert negativ richtig', sum(-4, -2) === -6);
```

Diese Tests können wir jetzt über die Kommandozeile ausführen.

```
$ php -f tests.php

Addiert positiv richtig -> PASSED
Addiert negativ richtig -> PASSED
```


Dies ist die einfachste Form von automatisierten Tests.

### Testing Frameworks

Für etwas umfangreichere Projekte ist diese Methode natürlich eher ungeeignet. 

Daher stehen für PHP diverse Testing Frameworks zur Verfügung, die eine Vielzahl an Funktionen für das automatisierte Testing zur Verfügung stellen.

Die zwei belibtesten Frameworks sind [PHPUnit](https://phpunit.de) und [Codeception](http://codeception.com/).

Die Frameworks basieren alle auf objektorientierten Prinzipien und gehen über die Thematik dieses ÜKs hinaus. Daher werden wir diese nicht im Detail ansehen und uns mit einfacheren Testing-Methoden befassen. 

In modernen Projekten sollte jedoch nicht auf den Einsatz eines solchen Testing-Frameworks verzichtet werden.

#### Beispiel: Akzeptanz-/Integrations-Test (Codeception)

Dieser Test überprüft, ob die Homepage einer Website geladen werden kann. Als Assertion wird überprüft, ob die Überschrift im Seitenquelltext vorhanden ist, was bedeutet, dass die Seite geladen werden kann.

```php
<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that the homepage works');
$I->amOnPage('/index.php?url=home');
$I->see('Herzlich willkommen im ÜK!');
?>
```

Dieser Test würde wie folgt in der Kommandozeile ausgeführt werden:

```bash
$ codecept run

Suite acceptance started 
Trying to ensure that homepage works (WelcomeCept.php) - Ok

Time: 1 second, Memory: 21.00Mb
OK (1 test, 1 assertions)
```


#### Beispiel: Unittest (PHPUnit)

Dieser Test überprüft, ob meine Klasse `Car` wie gewünscht funktioniert.

```php
<?php
class CarTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function car_can_be_started()
    {
        $car = new Car();

        $car->start();

        $this->assertTrue($car->isRunning);
    }

    /** @test */
    public function car_can_be_refueled()
    {
        $car = new Car();

        // Tank auf 50% setzen
        $car->setFuelLevel(50);

        // Auftanken
        $car->refuel();

        // Überprüfen, ob der Tank nun voll ist
        $this->assertEquals($car->fuelLevel, 100);
    }

}
?>
```

Dieser Test würde wie folgt in der Kommandozeile ausgeführt werden:

```bash
$ phpunit tests/

PHPUnit 5.1.0 by Sebastian Bergmann and contributors.

..

Time: 120 ms, Memory: 4.50Mb

OK (2 tests, 2 assertions)
```
