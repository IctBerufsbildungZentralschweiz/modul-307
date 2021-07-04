# 08 Basislayout mittels Template und Template-Klasse erstellen.

## Aufgabenstellung

Erstelle eine Template-Klasse und eine View dazu, und verwende das Template dann für alle Übungen. 

### Lösungsschritte

#### Schritt 1

Erstelle eine neue View `/app/Views/template.view.php` mit einem HTML-Gerüst und Ausgabe der Variable `$content`:

```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <!-- <base ...>: Relative urls start at index.php's directory -->
    <base href="<?= dirname($_SERVER['SCRIPT_NAME']); ?>/" />
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <?= $content ?>

    <script src="public/js/app.js"></script>
</body>
</html>
```

#### Schritt 2

Erstelle eine neue Klasse `View` in `/core/view.php` und lade sie in `/core/bootstrap.php`. Erstelle darin eine Methode `View::render($template, $view)`, welche folgendes tut: 

1. Content der View rendern und nicht direkt ausgeben, sondern in eine Variablen `$content` zwischenspeichern. Ein Beispiel, wie das geht, findest du z.B. auf https://stackoverflow.com/questions/8510532/using-include-within-ob-start#answer-8510592
2. Die Template-View laden und von ihr den Content innerhalb des Templates ausgeben lassen. 

Vor beiden Schritten solltest du testen, ob es die angegebene Datei auch gibt (`file_exists()`);

```php
class View
{
  /**
   * Render a view and display the result with the given template
   * 
   * @param $template string - e.g. "app/Views/template.view.php"
   * @param $view string - e.g. "app/Views/spam.view.php"
   */
  public function render(string $template, string $view)
  {
    // Render given `$view` and don't send result to client, but store it into the variable `$content`. 
    // Dein Code hier...

    // Load template view 
    // Dein Code hier...
  }
}
```

#### Schritt 3

Deine bestehenden Aufgaben entsprechend anpassen: 

1. In den bisherigen Views kannst du alles rauslöschen, was nun in `template.view.php` vorhanden ist. 
2. Im Controller wird nun nicht mehr die View direkt eingefügt (`require ...`), sondern eine neue View erzeugt und die Methode `render()` aufgerufen: 

```php
class XYController
{
  public function xy()
  {
    // Do what ever needs to be done before loading the view..

    // Load view and render with template (replaces require 'app/Views/aufgabe-xy.view.php')
    $view = new View();
    $view->render('app/Views/template.view.php', 'app/Views/aufgabe-xy.view.php');
  }
}
```
#### Schritt 4

Füge in `template.view.php` VOR dem Content die Navigation aus Aufgabe 7 ein (horizontal). 

### Testing

Klicke alle Aufgaben mal durch und schau, ob alles noch richtig funktioniert. 
