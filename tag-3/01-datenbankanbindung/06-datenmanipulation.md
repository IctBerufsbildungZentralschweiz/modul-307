# 06 Datenmanipulation

Um gespeicherte Daten in der Datenbank zu ändern, wird ebenfalls die instanzierte Datenbankverbindung (PDO) verwendet.

Aus Gründen der Sicherheit führen wir die Abfrage nie direkt aus, sondern bereiten diese zuerst mit der `prepare`-Methode vor.

Im Prepare-Statement werden die effektiven Werte noch nicht eingetragen, sondern Platzhalter an deren Stelle positioniert.

```php
$statement = $pdo->prepare('UPDATE `users` SET role = :role WHERE id = :id');
```

Erst in einem zweiten Schritt werden mit der `bindParam`-Methode Werte für die Platzhalter definiert.

```php
$statement->bindParam(':role', 'admin');
$statement->bindParam(':id', 50);
```

Anschliessend kann das fertige Statement nur noch durch die `execute`-Methode ausgeführt werden, damit die Änderung in die Datenbank gespeichert werden.

```php
$statement->execute();
```

## Aufgabe: Task speichern (Gemeinsam)

Als nächstes wollen wir eine einen bestehenden Task aus der Datenbank abrufen, ändern und speichern.

### Task abrufen und ändern

Erstelle die neue Controller Action `TaskController@edit` und schaue via Routes-Eintrag, dass diese bei der URL `/edit` aufgerufen wird. Ebenfalls kannst du die neue View `edittask.view.php` erstellen, welche am Schluss des neuen Controllers geladen wird. In dieser View wollen wir den gewünschten Eintrag anpassen.

Um die Daten zu bearbeiten benötigen wir wiederum ein Formular mit dem Feld `title` in der neuen Edit-Task-View `edittask.view.php`. In dieses Feld sollen die bestehenden Daten geladen werden, damit diese vom Benutzer bearbeitet werden können.

Die `id` des zu bearbeitenden Eintrages kannst du vorerst noch manuell per GET-Variable übergeben:

```php
http://localhost/deinProjekt/tasks/edit?id=3
```

Erweitere nun deinen Controller `TaskController`, dass der zur Id passende Eintrag abgerufen und der Titel im Feld `title` in der View angezeigt wird.

### Task speichern/updaten

Nachdem die Daten durch den Benutzer im Feld bearbeitet wurden, sollen diese in die Datenbank gespeichert werden.

Dazu erstellen wir einen neuen Controller `TaskController@update` inkl. `/update` Route, welche wir gleich als Ziel für unser Formular eintragen. Sofern der neue Controller aufgerufen wird und Daten vorhanden sind, soll eine Datenbankverbindung hergestellt und die Daten per Prepare-Statement in die Datenbank übergeben werden.

Nach der erfolgreichen Speicherung des Eintrages, soll der Benutzer wieder zurück auf die Task-Liste gelangen.

## Aufgabe: Benutzerfreundlichkeit

Damit die Id nicht immer manuell eingegeben werden muss, erstelle einen Bearbeiten-Link hinter jeder Task auf der Taskübersicht, welche automatisch den einen Link zur URL `/edit?id=2` generiert.

## Aufgabe: Task erfüllt (Einzelarbeit)

Sorge nun dafür, dass nicht nur der Name der Aufgabe bearbeitet werden kann, sondern auch der Status `completed`.
