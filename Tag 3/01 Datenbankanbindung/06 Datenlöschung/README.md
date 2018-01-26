# Delete
Um gespeicherte Daten in der Datenbank zu löschen, wird die instanzierte Datenbankverbindung (PDO) verwendet.

Aus Gründen der Sicherheit führen wir die Abfrage nie direkt aus, sondern bereiten diese zuerst mit der `prepare`-Methode vor. 

Im Prepare-Statement werden die effektiven Werte noch nicht eingetragen, sondern Platzhalter an deren Stelle positioniert.

```php
$statement = $pdo->prepare('DELETE FROM `users` WHERE id = :id');
```
Erst in einem zweiten Schritt werden mit der `bindParam`-Methode Werte für die Platzhalter definiert.

```php
$statement->bindParam(':id', 50);
```
Anschliessend kann das fertige Statement nur noch durch die `execute`-Methode ausgeführt werden, damit der gewünschte Eintrag in der Datenbank gelöscht wird.

```php
$statement->execute();
```

## Aufgabe: Task löschen (Einzelarbeit)
Erstelle nun eigenständig einen Controller an dem eine Task-Id übergeben werden kann. Der Controller nimmt die Id entgegen und löscht den dazugehörigen Eintrag. Anschliessend wir der Benutzer wieder auf die Task-Übersicht umgeleitet.

Sorge dafür, dass die Id nicht von Hand eingetragen werden muss. Neben dem Bearbeiten-Link soll somit ebenfalls noch ein Löschen-Link positioniert werden.

```
- Aufagbe 1 | bearbeiten | löschen
- Aufgabe 2 | bearbeiten | löschen
...
```
