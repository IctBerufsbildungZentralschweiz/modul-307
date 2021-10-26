# 02 Datenbankverbindung

Verbindungen werden durch das Erstellen von Instanzen der PDO-Basisklasse erzeugt. Der Konstruktor der PDO-Klasse erwartet dabei Parameter zur Angabe der Datenbankquelle, den Benutzer und das Passwort (falls vorhanden).

```php
// Datenbankquelle = mysql:host=localhost;dbname=meinedatenbank
// Benutzer = root
// Passwort = ADfk3lox!4foi4hd

$pdo = new PDO('mysql:host=localhost;dbname=meinedatenbank', 'root', 'ADfk3lox!4foi4hd', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
```

## Datenbankquelle / Connection-String / DSN

Die Datenbankquelle besteht aus einem definierten Connection-String. Darin wird angegeben, was für eine Art Quelle wir ansprechen möchten (`mysql`), was der Host dieser Datenbank ist (`host=localhost`) und wie die Datenbank heisst (`meinedatenbank`):

```
mysql:host=localhost;dbname=meinedatenbank
```

## Fehler bei der Verbindung

Wenn ein Fehler bei der Verbindung festgestellt wird, wird eine PDOException ausgeworfen. Diese Ausnahme kann mit dem try-catch-Konstrukt für das Debugging abgefangen und angezeigt werden.

```php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=meinedatenbank', 'root', 'ADfk3lox!4foi4hd', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
} catch (PDOException $e) {
   die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
}
```

## Weitere Verbindungsattribute

Über den vierten Parameter können weitere Verbindungsattribute definiert werden.

### `PDO::ATTR_ERRMODE`

Mit dem Wert `PDO::ERRMODE_EXCEPTION` für `PDO::ATTR_ERRMODE` wird sichergestellt, dass bei fehlerhaften Datenbankabfragen eine Exception generiert wird. Wird diese Option nicht gesetzt, werden dir allfällige Fehler nicht angezeigt.

### `PDO::MYSQL_ATTR_INIT_COMMAND`

Der unter dieser Option aufgeführte Befehl wird bei jedem Verbindungsaufbau zur Datenbank ausgeführt. Mit `SET NAMES utf8;` teilen wir dem Server mit, dass unsere Kommunikation im `utf8` Zeichensatz erfolgen wird.

## Aufgabe: Datenbankverbindung einrichten (Gemeinsam)

Als erstes richten wir in unserem Controller `TaskController.php` die Verbindung zur eben erstellen Datenbank ein:

```php
try {
    $pdo = new PDO(...);
} catch (PDOException $e) {
   die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
}
```
