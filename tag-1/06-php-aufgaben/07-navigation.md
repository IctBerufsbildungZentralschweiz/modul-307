# 07 Navigation

## Aufgabenstellung

Erstelle eine Startseite für deine Übungen für alle deine Routes-Einträge eine gemeinsame Navigation.

### Lösungsschritte

#### Schritt 1

Füge einen neuen Routes-Eintrag mit Pfad "/" ein:

```php
$routes = [
  '/' => 'NavigationController@home', /* NEU */
  '/aufgabe/spam' => 'AufgabenController@spam',
  // ... alle weiteren bestehenden Routes ...
];
```

Erstelle einen Controller `NavigationController` und eine Methode `home()` und eine View `home.view.php` dazu. Erstelle erst mal manuell ein Array `$navigation` mit allen bisherigen Links, die du als Menü haben willst:

```php
class NavigationController {
  public function home() {
    $navigation = [
      '/'             => 'Navigation - Home',
      '/aufgabe/spam' => 'Aufgaben - Spam',
      // ... weitere Menüpunkte
    ];
  }
}
```

Gib alle Links als Liste in `home.view.php` aus:

```markup
<ul>
  <?php foreach($navigation as $url => $label) : ?>
    <li><a href=".<?= $url ?>"><?= $label ?></a></li>
  <?php endforeach; ?>
</ul>
```

#### Schritt 2

Fülle nun das Array `$navigation` dynamisch aus der Routes-Tabelle. Für lesbare Beschriftungen kannst du z.B. die Stringfunktionen `explode()`, `str_replace()` und `ucfirst()` benutzen.

```php
class NavigationController {

  public function home() {

    global $routes;
    $navigation = [];

    foreach ($routes as $url => $ControllerMethod) {
      // Aus $ControllerMethod ein lesbares Link-Label erzeugen.
      // Aus 'AufgabenController@spam' soll z.B. 'Aufgaben - Spam' werden.
      $navigationLabel = '...';

      $navigation[$url] = $navigationLabel;
    }
  }
```

#### Testing

1. Prüfe nun in der View, ob die Links vernünftige Beschriftungen haben und die Links korrekt funktionieren.&#x20;
2. Füge einen neuen Routes-Eintrag hinzu und schau, ob das neue Menü korrekt erscheint und funktioniert.&#x20;
