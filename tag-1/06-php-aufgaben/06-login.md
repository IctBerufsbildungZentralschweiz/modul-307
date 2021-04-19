# 06 Login-Funktion

## Aufgabenstellung

Die Login-Funktion für das CMS deines Lehrbetriebes wurde von einem Partnerunternehmen in Indien entwickelt. Die Funktion tut was sie soll. Die Code-Qualität hingegen lässt zu wünschen übrig.

Die Login-Funktion überprüft, ob eine Kombination aus Benutzername und Passwort zu einem registrierten Benutzer gehört. Zudem wird überprüft, ob der Benutzer eine Rolle als `Administrator` oder `Publisher` hat. Nur diese Benutzerrollen dürfen sich einloggen.

Schreibe den Code der Funktion `login` um, damit er besser lesbar ist.

Die registrierten Benutzer werden jeweils aus der Datei `src/users.php` geladen. In dieser Datei findest du alle registrierten Benutzer mit Passwort und Rolle als PHP-Array.

Bearbeite ausschliesslich die Funktion `login` in der Datei `login.php` in diesem Verzeichnis.

{% embed url="https://github.com/IctBerufsbildungZentralschweiz/modul-307/tree/master/Tag%201/06%20PHP%20Aufgaben/06%20Login/src" caption="Startertemplate" %}

{% embed url="https://github.com/IctBerufsbildungZentralschweiz/modul-307/tree/master/Tag%201/06%20PHP%20Aufgaben/06%20Login/tests" caption="Tests" %}

### Zielumgebung

Überprüfe nach jeder Änderung mit Hilfe der Testfälle, ob alle Bedingungen immer noch fehlerfrei erfüllt werden.

Um die Tests auszuführen, rufe einfach das `login.php` Script aus deiner Konsole auf.

```text
php -f login.php
```

Führe diesen Schritt jetzt gleich aus. Du solltest für alle fünf Tests einen Status von `OK` erhalten.

### Lösungsschritte

Ändere das Script immer nur so weit, bis alle Komponenten des jeweiligen Schrittes erfüllt werden. Erweitere es anschliessend, damit der nächste Schritt erfüllt wird.

#### Schritt 1

Korrigiere die Einrückung der Funktion `login`.

#### Schritt 2

Auf den ersten Blick scheinen zwei Elemente mehrfach vorzukommen oder redundant zu sein.

**A**

`$users[$username][...]` kommt wiederholt vor. Vereinfache diesen Ausdruck, in dem du ihn in die Variable `$user` speicherst und alle Vorkommnisse ersetzt.

```php
$user = $users[$username];

// Bisher
$users[$username]['password']
// Wird neu zu
$user['password']
```

**B**

Der Rückgabewert `return 'Login okay!';` kommt zwei Mal vor. Möglicherweise lässt sich das `if`-Statement für diese Prüfung vereinfachen? \(Tipp: [Logische Operatoren](https://secure.php.net/manual/de/language.operators.logical.php) oder [`in_array`](https://secure.php.net/manual/de/function.in-array.php)\)

#### Schritt 3

Durch die vielen Einrückungen ist der Code immernoch sehr schlecht zu verstehen. Als Grundregel gilt, dass **nie mehr als 2 Stufen** eingerückt werden sollen.

Nutze «Early Returns» um die Einrückung der kompletten Funktion auf eine Stufe zu reduzieren.

```php
// Bisherige Methode
function login($username, $password)
{
    if(array_key_exists($username, $users)) {
        // Viele
        // weitere
        // Überprüfungen
    } else {
        return 'Dieser Benutzer existiert nicht.';
    }

}
```

```php
// Mit «Early Return»
function login($username, $password)
{
    if( ! array_key_exists($username, $users)) {
        return 'Dieser Benutzer existiert nicht.';
    }

    // Viele
    // weitere
    // Überprüfungen
}
```

## Lösung

Mögliche Lösungen zu den Aufgaben werden dir vom Kursleiter bereitgestellt.

Es sind mehrere Lösungen möglich, solange Dein Code allen gegebenen Vorgaben entspricht.

