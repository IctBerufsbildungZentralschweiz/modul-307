# SQL-Injections

## Arbeitsauftrag 

Erstelle ein Login-Formular mit einer SQL-Injection Sicherheitslücke. Ein Angreifer soll die Möglichkeit haben, sich ohne Passwort als `admin` anmelden zu können.

## Lösungshilfe

* Erstelle eine Datenbank mit einer `users` Tabelle. Die Tabelle benötigt nur die Spalten `id`, `username` und `password`.
* Erstelle in der Datenbank einen Benutzer `admin` mit Passwort `password`.
* Erstelle ein Anmeldeformular, welches mit folgendem Code das Login überprüft:

```php
<?php
$dbh = new PDO('mysql:host=localhost;dbname=test', $dbUser, $dbPass);

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $dbh->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
$users = $stmt->fetchAll();

if(count($users) > 0) {
    echo 'Du bist angemeldet!';
} else {
    echo 'Falsches Passwort';
}
?>
```

Finde heraus, was ein Angreifer in euer Formular eingeben müsste, um sich ohne korrektes Passwort als Admin anmelden zu können. Wie kannst du das Problem verhindern? Kriegst du es hin, dass sogar die komplette `users` Tabelle gelöscht werden kann?


