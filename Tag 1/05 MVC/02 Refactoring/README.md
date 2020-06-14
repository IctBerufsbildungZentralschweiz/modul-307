# Refactoring - Front-Controller

Mit dem File `index.php` haben wir bereits einen Front-Controller der sämtliche Anfragen entgegen nimmt. Im Moment erledigt die Datei `index.php` jedoch noch eine Reihe von anderen Aufgaben. 

In einem nächsten Schritt wollen wir nun die verschiedenen Aufgaben aufteilen an den jeweiligen Zuständigkeiten zuweisen:

### bootstrap.php
Mit dem Konstrukt `require 'functions.php';` binden wir unsere Hilfsfunktionen in das Tool ein. Wahrscheinlich werden wir jedoch noch andere Dateien für unser Tool einbinden. Da der Front-Controller sich nur um die Bearbeitung von Anfragen kümmern soll, macht es Sinn diese Vorbereitungs- und Einbindungsaufgaben in eine Datei auszulagern, welche nur für diese Aufgaben zuständig ist.

Verschiebe die Datei `functions.php` ins core-Verzeichnis. Erstelle anschliessend im gleichen Verzeichnis die `bootstrap.php` und lagere die Einbindung der `functions.php` darin aus.

##### core/bootstrap.php
```php
require 'core/functions.php';
```

### Model: Car
Die Model-Komponente schauen wir zu einem späteren Zeitpunkt noch genauer an. In der Zwischenzeit reicht es, wenn wir unsere Car-Klasse ins Models-Verzeichnis kopieren und dort 'parkieren'

Damit uns die Datei weiterhin zur Verfügung steht, muss dieses noch über die bootstrap-Datei eingebunden werden

##### core/bootstrap.php
```php
require 'core/functions.php';
require 'app/Models/Car.php';
```

##### app/Models/Car.php
```php
class Car
{
    // ...
}
```

### Controller: Car
Nun werden die Daten durch die Datei `index.php` an das Model Car weitergegeben, dadurch bearbeitet und schlussendlich an die Datei `index.view.php` übergeben. Aufgaben, welche eigentlich von einem Controller übernommen werden sollten. 

Erstelle darum im Controllers-Verzeichnis die Datei `CarController.php` und kopiere den restlichen Inhalt (unterhalb der `bootstrap.php`-Einbindung) der Datei `index.php` dort hin.

Denke daran den Pfad der Einbindung der Datei `index.view.php` im neuen Controller anzupassen.

Ebenfalls muss der Controller noch in der Datei `index.php` eingebunden werden.

##### app/Controller/CarController.php
```php
$cars = [
    new Car('Renault', 'rot', 1990),
    new Car('Citroën', 'blau', 1999),
    new Car('Volvo', 'grün', 2006)
];

$cars[0]->refuel(45);
$cars[0]->drive(100);

require 'index.view.php';
```

##### index.php
```php
require 'core/bootstrap.php';

require 'app/Controllers/CarController.php';
```

### View: Index
Ebenfalls kann in diesem Schritt gleich noch die Datei `index.view.php` in das Views-Verzeichnis verschoben werden.

## Zusammenfassung
Nach dem Refactoring sollte die Ordner-Struktur nun wie folgt aussehen:

```php
projekt/
 | app/
 | app/Models/
 | app/Models/Car.php
 | app/Controllers/
 | app/Controllers/CarController.php
 | app/Views/
 | app/Views/index.view.php
 |
 | core/
 | core/functions.php
 | core/bootstrap.php
 |
 | public/
 | public/css/
 | public/images/
 | public/js/
 |
 | .htaccess
 | index.php
```
