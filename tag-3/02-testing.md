# README

## Testing

> Ein Softwaretest prüft und bewertet Software auf Erfüllung der für ihren Einsatz definierten Anforderungen und misst ihre Qualität. Die gewonnenen Erkenntnisse werden zur Erkennung und Behebung von Softwarefehlern genutzt. Tests während der Softwareentwicklung dienen dazu, die Software möglichst fehlerfrei in Betrieb zu nehmen.

[Wikipedia](https://de.wikipedia.org/wiki/Softwaretest)

Softwaretests geben dem Entwickler die Gewissheit, dass bestimmte Komponenten seines Projekts wie von ihm getestet funktionieren. Sie erbringen aber keinen allgemeinen Nachweis, dass keine Programmfehler vorhanden sind.

> «Program testing can be used to show the presence of bugs, but never show their absence!» - Edsger W. Dijkstra

### Ein Beispiel

Angenommen der Code deines Online-Shops wird zu einem grossen Teil durch automatisierte Tests geprüft.

Ein spezifischer Testfall prüft, ob sich Kunden erfolgreich einloggen können.

Wenn du jetzt eines Tages den Code für dein Login komplett neu schreiben möchtest, kannst du dank den vorhandenen Tests jederzeit überprüfen, ob trotz deiner getätigen Änderungen das Login noch korrekt funktioniert.

Löschst du zum Beispiel versehentlich das Passwort-Eingabefeld, wird dein Test fehlschlagen und du weisst sofort, dass ein Problem existiert.

Angenommen du hast einen schwerwiegenden Bug in deinem Shop: Die Funktion, die für die Überprüfung des Kundenpasswortes zuständig ist, gibt fälschlicherweise für jedes eingegebene Passwort immer `true` zurück. Die Funktion wird durch keinen Testfall überprüft.

Dieser Bug bleibt von deinem Testfall unbemerkt, da das Login grundsätzlich funktioniert.

### Arten des Testings

Es gibt viele verschiedene Arten und Methoden des Testings. Die Definition und Namensgebung dieser Methoden ist nicht immer ganz einheitlich definiert und kann je nach Anwendungsbereich abweichen.

Grundsätzlich können folgende Testarten unterschieden werden:

#### Unittest / Komponententest

Unittests dienen dem Testen einzelner abgrenzbarer Komponenten einer Software. Diese Komponenten werden dabei isoliert und unabhängig vom System in dem sie verwendet werden getestet.

Das beliebteste Testing Framework für Unittests in PHP ist [phpunit](https://phpunit.de/).

**Beispiel**

Testen einer PHP-Funktion \(die Funktion ist in diesem Fall eine `Unit`\).

```php
function add($a, $b)
{
    return $a + $b;
}

// Unit-Tests
test('Addiert positive Zahlen korrekt',
    add(1, 2) === 3
);
test('Addiert negative Zahlen korrekt',
    add(-1, -5) === -6
);
```

#### Integrationtests

Beim Integrationstest wird überprüft, ob die Zusammenarbeit voneinander abhängiger Komponenten \(`Units`\) wie erwünscht funktioniert.

Integrationstests können in PHP mit einem Testing Framework wie [Codeception](https://codeception.com/) umgesetzt werden.

**Beispiel**

In einem Online-Shop wird nach einer getätigten Bestellung automatisch eine PDF-Rechnung generiert und per Mail versendet. Dafür nutzen wir zwei Komponenten/Units: Eine `InvoiceGenerator`-Klasse und eine `CustomerMailer`-Klasse.

Wir überprüfen mit diesem Integrationstest lediglich, ob wir der Email unsere Rechnung anhängen können. Wir testen also die Schnittstelle zwischen `InvoiceGenerator` und `CustomerMailer`.

Wir möchten nicht testen, ob die Email versendet werden kann. Wir testen auch nicht, ob die Rechnung korrekt generiert wird. Dies wäre ein Unittest.

```php
function testInvoiceMailer()
{
    // Rechnung für Bestellung #100 generieren
    $invoice = new InvoiceGenerator(100);

    // Mail vorbereiten
    $mailer  = new CustomerMailer('kunde@test.com');

    // PDF anhängen
    $mailer->addAttachment($invoice);

    // Überprüfen, ob die Rechnung erfolgreich an die Mail angehängt wurde
    test('Email hat PDF im Anhang.',
        $mailer->hasAttachment === true
    );
}
```

#### Systemtest

Bei Systemtests wird überprüft, ob unser System im Ganzen funktioniert. Sie unterscheiden sich gegenüber den Integrationstests indem hier auch externe Systeme miteinbezogen werden. Dafür wird meistens eine Testumgebung mit Testdaten verwendet. Die Testumgebung sollte immer die Zielumgebung 1:1 simulieren \(gleiche Software-Versionen, etc\).

Systemtests können in PHP mit einem Testing Framework wie [Codeception](https://github.com/IctBerufsbildungZentralschweiz/modul-307/tree/a7ffb3b379a75c7c306b125e512297895b0f829d/Tag%203/02%20Testing/codeception.com) umgesetzt werden.

**Beispiel**

Unser Online-Shop verwendet für den Email-Versand der Rechnungen einen lokal installierten Mail-Server. Mit folgendem Test überprüfen wir, ob wir Emails aus unserem PHP-Script über diesen Server versenden können und unser System somit funktioniert.

```php
function testMailer()
{
    // Mail vorbereiten
    $mailer = new CustomerMailer('kunde@test.com');

    // Betreff setzen
    $mailer->setSubject('Ihre Bestellung #100');

    // Mail versenden
    $mailer->send();

    // Unser Postfach öffnen
    $inbox = new MailInbox('kunde@test.com');

    // Überprüfen, ob die Email im Postfach liegt
    test('Die Email wurde korrekt versendet.',
        $inbox->seeMessage('Ihre Bestellung #100');
    );
}
```

#### Acceptance Test / Abnahmetest, Akzeptanztest

Ein Abnahmetest ist das Testen der gelieferten Software durch den Kunden. Hierbei orientiert man sich nicht mehr am Code sondern nur noch am Verhalten der Software.

Dazu werden Test-Szenarien definiert, die die genaue Funktionsweise der Software beschreiben.

Für die Definition eines Test-Szenarios können verschiedene Methoden verwendet werden. Eine gängige Methode ist die `Given - When - Then` Schreibweise.

```text
GIVEN   I am logged in as an administrator
WHEN    I delete a user
THEN    the user is removed from the database

GIVEN   I am logged in as a unprivileged user
WHEN    I try to delete a user
THEN    the error message "you have no rights to delete this user"
        is shown and the user is NOT removed from the database
```

Da in den meisten Testing Frameworks solche `Given - When - Then` Szenarios automatisch in ausführbaren Code umgewandelt werden können, werden sie üblicherweise auf Englisch verfasst.

Im Deutschen gibt es keinen offiziellen Standard diese Schreibweise anzuwenden. Dennoch spricht nichts dagegen, die Szenarien sinngemäss auf Deutsch zu übersetzen:

```text
GEGEBEN SEI   Ich bin als Administrator eingeloggt
WENN          ich einen Benutzer lösche
DANN          wird dieser Benutzer aus der Datenbank gelöscht
```

### Testing-Methoden

#### Manuelles Testing

Beim manuellen Testing werden die spezifischen Testfälle von einer Person in Handarbeit durchgeführt.

Wenn du deine Website in deinem Browser aufrufst, ist dies zum Beispiel ein manuell ausgeführter Systemtest.

#### Automatisiertes Testing

Beim automatisierten Testing können mehrere definierte Testfälle automatisch ausgeführt werden. Dazu müssen die Testfälle im Normalfall als ausführbarer Code vorhanden sein.

Der Vorteil hierbei ist ganz klar die Zeitersparnis beim mehrfachen Ausführen der Tests. So können beispielsweise vor der Veröffentlichung eines neuen Software-Releases automatisch alle Tests ausgeführt werden. Schlägt einer der Tests fehl, wird der neue Release nicht veröffentlicht.

Der Nachteil gegenüber dem manuellen Testing ist, dass alle Tests, zusätzlich zur eigentlichen Software, ebenfalls programmiert werden müssen.

Testing Frameworks wie PHPUnit oder Codeception vereinfachen diese Arbeit bei der Entwicklung mit PHP.

#### Test-Driven-Development \(TDD\)

Eine weit verbreitete Art der Entwicklung ist das so genannte «Test-Driven-Development». Dabei wird vor der Entwicklung eines neuen Features ein Test definiert, der dieses noch nicht existierende Feature überprüft und darum fehlschlägt.

Anschliessend wird das neue Feature entwickelt, damit der Test erfolgreich ausgeführt werden kann.

Mit dieser Methode kann theoretisch sichergestellt werden, dass keine Funktion existiert, die nicht durch mindestens einen Test überprüft wird.

### Testing-Vokabular

Hier einige Wörter, die im Zusammenhang mit Testing verwendet werden:

| Wort | Bedeutung |
| :--- | :--- |
| Test case | **Testfall**: Kann mehrere Tests enthalten. Ist unabhängig von anderen Testfällen. |
| Assertion | **Aussage/Annahme**: Dient dazu zu überprüfen, ob ein Test fehlschlägt. Dabei wir das Ergebnis aus einem Test mit einem erwarteten Ergebnis verglichen. Beispiel: `assert(sum(1, 2) === 3)` |
| Szenario | Wir besonders bei Akzeptanztests verwendet. Das Szenario definiert die Situation, in der die Software getestet werden soll. |

## Aufgabe: Testing \(Partnerarbeit\)

Schreibe für dein Task-Listen-Projekt mindestens 6 Testfälle eines «Acceptance Test» auf.

Gib die Liste anschliessend einem Kameraden, welcher dein Tool nach den vorgegeben Tests überprüft.

Zum Schluss gebt ihr euch gegenseitig eine Rückmeldung über die Testresultate und die Verständlichkeit der Tests.

