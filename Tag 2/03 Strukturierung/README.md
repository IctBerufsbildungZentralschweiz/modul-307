# Strukturierung

Selbst mit unserem relativ einfachen Formular wird sehr schnell klar, dass beim Platzieren des kompletten Codes in der `index.php` die Übersicht verloren geht.

Die Strukturierung einer Webapplikation ist ein wichtiger Bestandteil und sollte nicht vernachlässigt werden. Wie du die Applikation strukturierst, ist dir überlassen. Es gibt jedoch klare Komponenten, die jede Webapplikation besitzt und die irgendwo untergebracht werden müssen.

## Komponenten

### Front-Controller

Als Front-Controller bezeichnen wir den «Einstiegspunkt» unserer Webapplikation. Über diesen wird **jeder** Seitenaufruf entgegengenommen und dann verarbeitet.

In unserem Fall haben wir mit der `index.php` bereits einen Front-Controller erstellt. 

### Router

Wenn der Front-Controller einen Request entgegennimmt, muss dieser herausfinden, was damit geschehen soll. Dafür wird oft ein `Router` erstellt. Dieser definiert, wie eine spezieifsche Anfrage/URL verarbeitet werden soll.

### Model, View, und Controller (MVC)

Ein Router delegiert eine Anfrage oft an einen `Controller`. Dieser verwaltet dann den Datenaustausch zwischen einem `Model` und einer `View`. Das Model dient als Schnittstelle zu einer Datenquelle (z. B. einer Datenbank). Die View dient zur Darstellung der Daten.

Diese drei Komponenten werden in der für Webapplikationen sehr beliebten MVC-Architektur verwendet. Dies ist jedoch nur eine von vielen gängigen Architekturen.

### Templates

Ein Template ist die Grundlage für die Darstellung einer Webpage. Diese kann sich aus verschiedenen Views zusammensetzen. Oft wird zwischen Template und View gar nicht unterschieden. Einfachheitshalber wird alles als View bezeichnet.

## Vereinfachte MVC-Architektur für unser Projekt

Da die Umsetzung einer MVC-Architektur ohne objektorientierten PHP-Code etwas umständlich ist, versuchen wir für unser Projekt eine vereinfachte Struktur zu erstellen, die sich aber an der MVC-Architektur orientiert.

Es sollen folgende Komponenten vorhanden sein.

* Front-Controller
* Controller für Formularverarbeitung
* Views für Formular und Bestätigungsmeldung
* Haupttemplate
* (Router)


## Aufgabe: Umstrukturierung deines Formulars

### Schritt 1: Haupttemplate erstellen

Erstelle ein `views` Verzeichnis. Erstelle darin jeweils eine View für dein Formular und eine für die Bestätigungsnachricht.

Erstelle eine `templates` Verzeichnis. Erstelle darin eine Datei für das Haupttemplate `app.php`.

```php
formular/
 | css/
 | css/styles.css      
 |
 | templates/          # Neu
 | templates/app.php   # Neu 
 |
 | views/              # Neu
 | views/form.php      # Neu 
 | views/success.php   # Neu
 |
 | index.php           # Front-Controller
```

Kopiere nun den ganzen Inhalt deiner `index.php` in das `app.php` Template. Lade das Template in deiner `index.php` Datei mittels einem `include` Statement.

```php
// index.php
include 'templates/app.php';
```

Wenn du dein Formular jetzt aufrufst, sollte immer noch alles funktionieren wie bisher!

### Schritt 2: Views auslagern

Kopiere nun den HTML-Code für deine «Bestätigungsnachricht» nach `views/success.php` und ersetze den Code wiederrum mit einem `include` Statement.

```php
...
<?php if($success): ?>
    <!-- Verschieben nach views/success.php -->

    <h1>Anmeldung erfolgreich!</h1>
    
    <p>Vielen Dank für Ihre Anmeldung. Wir haben diese erfolgreich entgegengenommen.</p>

    <!-- /Verschieben -->
<?php else: ?>

...
```

wird zu...
```php
...
<?php if($success): ?>
    <!-- Verschieben nach views/success.php -->

    <?php include 'views/success.php'; ?>

    <!-- /Verschieben -->
<?php else: ?>

...
```

Lagere den Code für das Formular nach `views/form.php` aus und binde ihn via `include` ein.

Der Hauptteil deiner `app.php` sollte anschliessend etwa so aussehen:

```php
...
<?php
if($success) {
     include 'views/success.php';
} else {
     include 'views/form.php';
}
?>
...
```

Wenn du dein Formular jetzt aufrufst, sollte immernoch alles funktionieren wie bisher!

### Schritt 3: Controller auslagern

Erstelle ein Verzeichnis `controller` und erstelle darin eine `form.php` Datei.

```php
formular/
 | controller/          # Neu
 | controller/form.php  # Neu
 |
 | css/
 | css/styles.css      
 |
 | templates/
 | templates/app.php
 |
 | views/
 | views/form.php       
 | views/success.php 
 |
 | index.php           # Front-Controller
```

Kopiere die Formular-Verarbeitung aus deiner `app.php` jetzt in diese Datei.

```php
// Von hier...
$name = $_POST['name'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... 
} // ... bis hier, alles kopieren
```

Den übrigen Code aus deiner `app.php` kannst du in die `index.php` verschieben. Achte darauf, dass das `include` Statement für das `app.php` Template am Schluss steht!

```php
<?php
// index.php
$success = false;
$errors = [];

include 'controller/form.php';

// Unbedingt als letztes!
include 'templates/app.php';
?>
```

Wenn du dein Formular jetzt aufrufst, sollte immernoch alles funktionieren wie bisher!

Dank des jetzt sehr modularen Codes hast du es in Zukunft einfacher, ein neues Projekt zu starten, da du diese Strukur sehr einfach wiederverwenden kannst!