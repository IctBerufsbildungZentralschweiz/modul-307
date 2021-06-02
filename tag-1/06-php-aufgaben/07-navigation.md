# 07 Startseite mit Links zu allen Übungen

## Aufgabenstellung

Erstelle eine Startseite für deine Übungen für alle deine Routes-Einträge eine gemeinsame Navigation. 

### Lösungsschritte

#### Schritt 1

Erstelle einen Controller `NavigationController` und eine Methode `home()` und eine View `home.view.php` dazu. Füge einen neuen Routes-Eintrag mit Pfad "/" ein. 

Erst mal kannst du in der View eine Liste mit allen bisherigen Routes-Einträge manuell / statisch als HTML-Links einfügen. 

```html
<ul>
  <li><a href="./">Home</a></li>
  <li><a href="./aufgabe/spam">Aufgabe Spam</a></li>
  <li><a href="./aufgabe/xy">Aufgabe XY...</a></li>
</ul>
```

#### Schritt 2

Füge die Links dynamisch aus der Routes-Tabelle ein. Deklariere dazu in `NavigationController::home()` die $routes-Variable als global, dann hast du darauf Zugriff. Erstelle ein neues Array `$navigation` mit allen URLs als Key und lesbaren Menü-Beschriftungen als Value. 

Die lesbaren Beschriftungen sollen mittels Stringfunktionen (z.B. `explode()` und `str_replace()`) aus der Routes-Tabelle automatisch erzeugt werden, z.B. aus den Keys (`/aufgabe/spam` wird zu 'Aufgabe Spam') oder aus den Values (`AufgabenController@spam` wird zu `Aufgaben - Spam`). 

```php
$navigation = [ /* Dieses Array soll automatisch erzeugt werden! */
  '/' => 'Navigation - Home',
  '/aufgabe/spam' => 'Aufgaben - Spam',
];
```

Ersetze in der View dann die statische Liste mit den Einträgen aus dem Array `$navigation`.

### Testing

Füge einen neuen Routes-Eintrag hinzu und schau, ob das Menü korrekt erscheint und der Link funktioniert. 
