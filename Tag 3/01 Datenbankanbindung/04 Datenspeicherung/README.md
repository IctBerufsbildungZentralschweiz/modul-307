# Insert
Um Daten in die Datenbank über ein Formular zu speichern, können wir wiederum die instanzierte Datenbankverbindung (PDO) nutzen.

Aus Gründen der Sicherheit führen wir die Abfrage nie direkt aus, sondern bereiten diese zuerst mit der `prepare`-Methode vor. 

Im Prepare-Statement werden die effektiven Werte noch nicht eingetragen, sondern Platzhalter an deren Stelle positioniert.

```php
$statement = $pdo->prepare('INSERT INTO `users` (name, role) VALUES (:name, :role)');
```

Erst in einem zweiten Schritt werden mit der `bindParam`-Methode Werte für die Platzhalter definiert.

```php
$statement->bindParam(':name', 'Silvana');
$statement->bindParam(':role', 'admin');
```

Anschliessend kann das fertige Statement nur noch durch die `execute`-Methode ausgeführt werden, damit die Daten in die Datenbank geschrieben werden.

```php
$statement->execute();
```

## Aufgabe: Task speichern (Gemeinsam)
Als nächstes wollen wir eine neue Task erfassen und in die Datenbank speichern. Erstelle dazu ein Formular mit dem Feld `title` in deiner Task-View. 

Erstelle die neue Controller-Methode `TaskController@create` und schaue via Routes-Eintrag, dass dieser bei der URL `/tasks/create` aufgerufen wird. Die Daten aus deinem Formular sollen per POST übergeben werden und als Ziel die `/tasks/create` URL haben.

Erstelle nun in deinem neuen Controller eine Überprüfung, ob Daten per POST gesendet wurden. Sofern Daten vorhanden sind, soll eine Datenbankverbindung hergestellt und die Daten per Prepare-Statement in die Datenbank gespeichert werden.

Nach der erfolgreichen Speicherung der Daten, soll der Benutzer wieder zurück auf die Task-Liste gelangen.

## Aufgabe: Refactoring (Gemeinsam)
Unsere kleine Applikation erfüllt zwar ihren Zweck, verstösst jedoch gegen das DRY-Prinzip. So wird die Datenbankverbindung mehrfach im Code aufgeführt. Da es sich um den identischen Code handelt, macht es Sinn, diesen an eine zentrale Funktion auszulagern.
