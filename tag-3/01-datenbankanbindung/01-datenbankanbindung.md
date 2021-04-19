# 01 Datenbankanbindung

Um mit PHP auf eine Datenbank zuzugreifen, verwenden wir [`PHP Data Objects`](http://php.net/book.pdo) \(kurz PDO\).

```php
new PDO();
```

Die von PHP zur Verfügung gestellte PDO-Klasse stellt ein einheitliches Interface zur Anbindung unterschiedlicher Datenbanktypen bereit.

## Aufgabe: Projekt-Setup \(Gemeinsam\)

Erstelle den neuen Controller `TaskController.php` und schaue via Routes-Eintrag, dass diese bei der URL `/tasks` aufgerufen wird. Ebenfalls kannst du die neue View `task.view.php` erstellen, welche am Schluss des neuen Controllers geladen wird.

Rufe anschliessend phpMyAdmin über folgende URL auf.

```text
http://localhost/phpmyadmin/
```

Erstelle eine Datenbank mit dem Namen `tasklist`. Darin wiederum legst du die Tabelle `tasks` an, mit den folgenden drei Spalten: `id`, `title` und `completed`

Über den Reiter `Einfügen` im phpMyAdmin, kannst du manuell 2-3 Aufgaben erfassen.

Nun sind wir bereit, um mit dem Projekt `Task-Liste` zu starten.

