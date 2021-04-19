# Models

Im Moment werden sämtliche Aufgaben des Tools von den Controllern und den Views ausgeführt. Die Logik ist zwar von der Darstellung getrennt, jedoch ist die Datenverarbeitung noch ein integrativer Bestandteil der Logik, beziehungsweise des Controllers.

Dies führt früher oder später zu folgenden Problemen:

* Einige Code-Elemente müssen doppelt aufgeführt werden \(DRY\)
* Änderungen der Infrastruktur \(z. B. Datenbank-Technologie\) führenr zu einem grossen Umstrukturierungsaufwand.
* Die Code-Struktur im Controller wird unübersichtlich.
* Der Code ist schlecht lesbar.

Um genau diese Problemstellungen zu umgehen, wird mit einem Model gearbeitet. Das Model ist für die Entgegennahme, Bearbeitung und Speicherung der Daten zuständig. Für unser Beispiel, hat dies die folgenden Auswirkungen:

## Aufgabe: Refactoring Task-Liste \(Gemeinsam\)

Erstelle nun das Model `app/Models/Task.php` und binde dieses in der `bootstrap.php` ein.

Erstelle die Klasse `Task`. Unser Ziel ist es nun, dass wir den Code in den einzelnen Controller lesbarer machen, Wiederholungen vermeiden \(DRY\) und fast die komplette Datenbank-Kommunikation in das Model `Task` auslagern.

### Konstruktor

Als erstes Erstellen wir einen Konstruktor für die Klasse. Dieser soll sämtliche Attribute bei der Instanzierung einer Klasse entgegennehmen und im erstellten Objekt abspeichern.

```php
class Task
{
    public $id;
    public $title;
    public $completed;

    function __construct($title, $completed)
    {
        $this->title = $title;
        $this->completed = $completed;
    }
}
```

### Refactoring: Controller

Der Controller soll so angepasst werden, dass sich nur noch die Logik darin befindet. Alles andere soll durch das Model `Task` ausgeführt werden. Gehe dabei immer in zwei Schritten vor:

1. Schreibe den Code, wie du ihm im Controller haben möchtest.
2. Ergänze den Code im Model so, dass er gemäss deinen Vorstellungen funtkioniert.

#### Refactoring: TaskController@create

```php
$task = new Task("Titel des Tasks", false);
$task->create();
```

#### Refactoring: TaskController@edit

```php
$task = (new Task)->getById($id);
```

#### Refactoring: TaskController@update

```php
$task = new Task($_POST['title'], $completed);
$task->update($_GET['id']);
```

### Refactoring: TaskController@delete

Versuche nun eigenständig noch die Logik und Datenverarbeitung für das Löschen vom `TaskController` zu trennen.

### Refactoring: DB-Helper

Findest Du eine einfache Möglichkeit, den PDO-Verbindungsaufbau in eine einfache Helper-Funktion auszulagern?

