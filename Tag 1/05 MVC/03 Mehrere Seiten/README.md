# Mehrere Seiten

Die meisten Projekte bestehen jedoch nicht nur aus einer Seite, so auch unseres. Somit muss es neben der Seite mit der Mitarbeiter-Liste auch noch eine About-Seite geben. Dupliziere dazu die Datei `index.php` und benenne die Kopie um in `about.php`. Ändere die Datei so ab, damit diese auf einen `AboutController` verweist und darin die `About-View` einbindet.

Kontrolliere anschliessend die Funktionsweise deiner neuen Seite, in dem du die `about.php` im Browser aufrufst:

```
http://localhost/projekt/about.php
```

##### about.php
```php
require 'core/bootstrap.php';
require 'app/controllers/AboutController.php';
```

##### app/Controller/AboutController.php
```php
require 'app/Views/about.view.php';
```

##### app/Views/about.view.php
```html
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
</head>
<body>
    <h1>Über uns</h1>
</body>
</html>
```