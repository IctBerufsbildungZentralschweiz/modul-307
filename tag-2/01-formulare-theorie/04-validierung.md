# 04 Validieren von Formulardaten

Das Validieren oder «Prüfen» der empfangenen Daten ist enorm wichtig, da unerwartete oder nicht vorhandene Daten zu fehlerhaften oder unbrauchbaren Resultaten führen.

Grundsätzlich gilt es die Daten auf folgende Punkte zu überprüfen:

* Sind alle benötigten Daten vorhanden \(alle Pflichtfelder ausgefüllt\)?
* Sind die Daten logisch, liegen sie in einem gültigen Bereich \(Geburtsdatum in der Vergangenheit\)?
* Entsprechen die Daten dem gewünschten Format \(Email, PLZ etc.\)?

## Existenz überprüfen

### Werte aus Superglobals in Variablen übernehmen

Damit nicht mit der Superglobalen `$_POST` gearbeitet werden muss, bietet es sich an, die Werte in eigene Variablen zu übernehmen und bei nicht vorhandenen Feldern ein eigener Standard-Wert zu setzen.

Um zu überprüfen, ob ein Formularfeld in einem `POST`-Request vorhanden ist, muss die Existenz des gewünschten Schlüssels in der `$_POST` Variable überprüft werden.

Eine Möglichkeit dies zu tun ist mittels `isset()`. `isset()` überprüft, ob eine Variable vorhanden und nicht `null` ist. **Es wird nicht überprüft, ob die Variable leer ist.**

```php
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = ''; // Standard-Wert für die Variable setzen

    if(isset($_POST['name'])) {
        // Das Feld wurde mitgesendet, wir können den Wert also übernehmen
        $name = $_POST['name'];
    }

}
```

Der `Null Coalesce Operator` bietet uns eine einfache Möglichkeit, obenstehenden Code zu vereinfachen.

```php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $_POST['name'] in die Variable übernehmen, 
    // falls vorhanden. Ansonsten '' als Standardwert,
    // in die Variable speichern.
    $name = $_POST['name'] ?? '';
}
```

## Daten bereinigen

Bevor die Daten weiter validiert werden, sollten sie noch bereinigt werden. Leerzeichen am Anfang und Ende einer Eingabe, möchten wir zum Beispiel entfernen. Dafür können wir die `trim`-Funktion verwenden.

So können wir verhindern, dass ein Pflichtfeld nur mit Leerzeichen gefüllt wird. Auch Leerzeichen am Ende von Email-Adressen, wie sie von Smartphone-Tastaturen gerne automatisch hinzugefügt werden, führen für den Besucher so nicht zu einer «Ungültige Email-Adresse»-Fehlermeldung.

```php
// '   Franz  ' wird zu 'Franz'
// '     ' wird zu ''
$name = trim($name);
```

## Logik/Bereiche überprüfen

### Leere Eingaben

Leere Eingaben sind für Pflichtfelder nicht erwünscht. Wir können überprüfen, ob die Variable einem leeren String `''` entspricht oder die Länge 0 Zeichen beträgt.

```php
if($name === '') {
    echo 'Bitte geben Sie einen Namen ein.';
}

if(strlen($email) < 1) {
    echo 'Bitte geben Sie eine Email ein.';
}
```

### Feldspezifische-Überprüfung

Die logische Überprüfung variiert je nach Feld. Ein Geburtsjahr darf beispielsweise nie in der Zukunft liegen. Bei einem Mindestalter muss das eingegebene Datum maximal X Jahre in der Vergangenheit liegen. Nutze dazu einfache Vergleiche.

```php
if($geburtsjahr > date('Y')) { // date('Y') = aktuelles Jahr (z. B. 2016)
    echo 'Geburtsjahr muss in der Vergangenheit liegen.';
}

if($geburtsjahr > (date('Y') - 18)) { // Geburtsjahr > 1998 -> Minderjährig
    echo 'Du musst volljährig sein! ಠ_ಠ';
}
```

\(Bitte beachte, dass im letzten Beispiel natürlich das gesamte Geburtsdatum beachtet werden sollte, nicht nur das Jahr. Hier wurde das Beispiel vereinfacht.\)

## Format überprüfen

### `filter_var`

PHP bietet zur Überprüfung von einigen Formaten die Funktion [`filter_var`](https://secure.php.net/manual/de/function.filter-var.php) an.

Die Syntax ist wie folgt:

```php
filter_var($variable, FILTER_KONSTANTE);
```

`filter_var` liefert bei einer ungültigen Eingabe einen Wert von `false` zurück. Andernfalls werden die Eingabe-Daten zurückgegeben. Es ist also wichtig einen **typenstarken Vergleich** mit `false` zu verwenden.

Als Filter-Konstante kann einer der folgenden Werte verwendet werden:

* FILTER\_VALIDATE\_BOOLEAN
* FILTER\_VALIDATE\_EMAIL
* FILTER\_VALIDATE\_FLOAT
* FILTER\_VALIDATE\_INT
* FILTER\_VALIDATE\_IP
* FILTER\_VALIDATE\_URL

Um zu überprüfen, ob eine gültige URL eingegeben wurde, könnte also folgender Code verwendet werden:

```php
if(filter_var($url, FILTER_VALIDATE_URL) === false) {
    echo 'URL ist ungültig!';
} else {
    echo 'URL ist gültig!';
}
```

Bitte beachte, dass FILTER\_VALIDATE\_EMAIL bei Eingaben mit Umlauten `false` zurück gibt. Eine Email mit Umlauten ist jedoch theoretisch gültig \(kontakt@höhenluft.ch\). Die Überprüfung von Email-Adressen ist ohnehin ein heikles Thema. Am besten wird nur überprüft, ob das `@`-Symbol vorhanden ist. Alle anderen Regeln könnten sonst ungewöhnliche aber dennoch gültige Email-Adressen als ungültig erkennen.

### Reguläre Ausdrücke

Formate, die mit `filter_var` nicht überprüft werden können, lassen sich mit regulären Ausdrücken validieren.

Mit der Funktion `preg_match` und dem regulären Ausdruck `/^\d{2}\.\d{2}\.\d{2,4}$/` lässt sich beispielsweise das Format eines Datums überprüfen.

```php
$datum = '24.11.1990';

if(preg_match('/^\d{2}\.\d{2}\.\d{2,4}$/', $datum)) {
    echo 'Datum ist gültig!';
} else {
    echo 'Datum ist ungültig!';
}
```

Dieser Ausdruck würde auch das Datum `40.80.8000` zulassen, für eine grobe Überprüfung reicht er jedoch aus.

Eine genauere Überprüfung wurde folgender Ausdruck bringen.

```php
^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[012])\.(19|20)[0-9]{2}$
```

Wie Du siehst, wird es sehr schnell sehr komplex. Reguläre Ausdrücke sind daher ein Thema für sich und werden in diesem ÜK nur teilweise behandelt.

* Siehe auch [PHP: Reguläre Ausdrücke auf wikibooks.org](https://de.wikibooks.org/wiki/Websiteentwicklung:_PHP:_Regul%C3%A4re_Ausdr%C3%BCcke)
* Tool zum Testen von Ausdrücken: [PHP Live Regex](http://www.phpliveregex.com/)

## Aufgabe: Validierung \(Einzelarbeit\)

Alle Felder, ausser das für die Bemerkung, sind Pflichtfelder.

Für die Validierung der Email-Adresse überprüfen wir, ob es sich um eine gültige Email-Adresse handelt.

Für die Telefonnummer dürfen nur Zahlen, Leerzeichen und das `+` Symbol eingegeben werden. Alle anderen Eingaben sind ungültig.

Wenn keine Fehler vorhanden sind, gib einfach nur den String `OK` nach der Validierung der Daten aus.

Die folgenden Testfälle sollte dein Formular erfüllen:

| Feld | Input | Fehlermeldung |
| :--- | :--- | :--- |
| Name | `''`  _\(leer\)_ | Bitte geben Sie einen Namen ein. |
| Email | `''` | Bitte geben Sie eine Email ein. |
| Telefon | `''` | Bitte geben Sie eine Telefonnummer ein. |
| Anzahl Personen | `''` | Bitte geben Sie die Anzahl teilnehmender Personen ein. |
| Hotel | `''` | Bitte wählen Sie ein Hotel für die Übernachtung aus. |
|  |  |  |
| Email | `'google.com'` | Die Email-Adresse "google.com" ist ungültig. |
| Telefon | `'phone'` | Die Telefonnummer "phone" ist ungültig. |
| Anzahl Personen | `'Acht'` | Bitte geben Sie für die Anzahl Personen nur Zahlen ein. |
|  |  |  |
| Email | `'test@google.com'` | **keine** |
| Email | `'info@cern.ch '` | **keine** |
| Telefon | `'+41 260 30 39'` | **keine** |
| Name | `'Peter'` | **keine** |
| Anzahl Personen | `'5'` | **keine** |
| Bemerkung | `''` | **keine** |

Speichere alle gefundenen Fehler in ein`$errors` Array.

Sofern ein Fehler gefunden wurde, soll in der `form.view.php` eine Liste sämtlicher angezeigt werden:

```markup
<ul>
    <li>Fehler #1</li>
    <li>Fehler #2</li>
    ...
</ul>
```

Falls kein Fehler gefunden wurde, wird die neue View `success.view.php` geladen.

## Aufgabe: Usability \(Einzelarbeit\)

Damit der Benutzer bei einem Fehler nicht wieder alle Daten einfüllen muss. Fülle die eingetragenen Felder wieder in das Formular ab.

Hier ein Beispiel dazu:

```markup
<input type="text" id="name" name="name" value="<?= $name ?? '' ?>">
```

