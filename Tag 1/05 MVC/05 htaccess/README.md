# .htaccess

Das Einzige, was uns noch für ein dynamisches MVC-Framework fehlt, ist die Erstellung der Variable `$uri`. Wir könnten diesen Wert jeweils als `$_GET`-Variable unserer URL anhängen:

```
http://www.meinprojekt.ch/index.php?uri=about
```

Anschliessend kann die URI wie folgt definiert werden:

```php
$uri = $_GET['uri'] ?? '';
```

Optisch ist dies jedoch eine etwas unschöne Lösung, viel schöner wäre folgende Adresse: `http://www.meinprojekt.ch/about`

Wir brauchen also etwas, um die Anfrage `http://www.meinprojekt.ch/about` in dieses Format umzuwandeln: `http://www.meinprojekt.ch/index.php?uri=about`

Dies können wir über die `.htaccess` Datei machen. Erstelle dazu die Datei `.htaccess` mit folgendem Inhalt:

##### .htaccess
```txt
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.*)$ index.php?uri=$1 [L,QSA]
```

## Der Sonderfall: $_GET['uri'] ist nicht vorhanden

Für den Fall, dass jemand die index.php direkt aufruft und somit keine `uri` Variable vorhanden ist, können wir den `Null coalesce operator (??)` verwenden, um in diesem Fall einen Standard-Wert zu definieren.

```php
// $_GET['uri'] falls vorhanden, ansonsten '' verwenden
$uri = $_GET['uri'] ?? ''; 
```