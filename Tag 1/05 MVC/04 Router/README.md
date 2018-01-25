# Router und Routes

Nun haben wir jedoch zwei Front-Controller. Diese lassen keine Art von Flexibilität zu und wir verstossen gegen das DRY-Prinzip. 

Ziel ist es in einer Liste im Front-Controller zu hinterlegen, welcher Controller bei welcher Anfrage (URI) geladen werden muss.

```php
<?php
$routes = [
  ''    =>  'app/controllers/PersonController.php', // www.meinprojekt.ch
  'about' => 'app/controllers/AboutController.php' // www.meinprojekt.ch/about
];
```

Da diese Routes häufig geändert werden und daher schnell auffindbar sein sollten, macht es Sinn, dass diese in einer eigenen Datei `routes.php` hinterlegt sind.

## Router

Eine Liste von den Routes nützt uns jedoch nichts, ohne dass diese von jemandem interpretiert wird. Aus diesem Grund erstellen wir die Klasse `Router` in der Datei `Router.php` im core-Verzeichnis. Dorthin können wir anschliessend unsere Routes-Liste übergeben.
 
Die Route-Klasse soll die Routes-Definitionen übernehmen und in einem Objekt abspeichern. Dazu senden wir unsere Routes an die `define` Methode, welcher zur Zeit noch nicht exisiert und von uns erstellt werden muss.
 
##### routes.php
```php
$router = new Router();
$router->define([
    ''    =>  'app/controllers/PersonController.php',
    'about'    =>  'app/controllers/AboutController.php'
]);
```

##### core/Router.php
```php
class Router
{
}    
```

Die Router-Klasse benötigt somit eine `define`-Methode, welche die Routes-Definitionen entgegen nimmt und abspeichert.

##### core/Router.php
```php
class Router
{
    protected $routes = [];
    
    public function define($routes)
    {
       $this->routes = $routes;
    }
}    
```

Anschliessend können wir die Routes und den Router in unserem Front-Controller einbinden.

##### index.php
```php
require 'core/bootstrap.php';

$router = new Router();         // Ein neuer Router wird erstellt.

require 'routes.php';           // Die Routes werden registriert/definiert.
```

Nun haben wir die verschiedenen Routes im Router definiert. Jetzt müssen wir noch auf diese zugreifen können. Die Funktion sollte dabei folgende Logik aufweisen: Wenn der Aufruf `URI` existiert, lade den dazugehörigen `Controller`. 

Oder mit dem Beispiel oben: 
* Wenn die URI `about` aufgerufen wird, lade den Controller `AboutController`.
* Wenn die URI '' aufgerufen wird, lade den Controller `CarController`.

Die Router-Klasse benötigt also nicht nur eine Funktion um die Routes zu speichern, sondern auch eine Funktion um eine erhaltene Anfrage (URI) mit der Liste abzugleichen und die Anfrage an den dazugehörigen Controller weiterzuleiten.

##### core/Router.php
```php
class Router
    
    protected $routes = [];
    
    public function define($routes)
    {
       $this->routes = $routes;
    }
    
    public function parse($uri)
    {
        if (array_key_exists($uri, $this->routes)) {    // Wenn die übergebene URI existiert...
            return $this->routes[$uri];                 // ...gib den dazugehörigen Controller zurück.
        }
        
        die('Kein Route für diese URI gefunden.');
    }
    
}    
```

Nun können wir die statische Einbindung in unserem Front-Controller durch unsere Router-Methode ersetzen. Die $uri kann vorerst noch über eine Variable definiert werden.

##### index.php
```php
require 'core/bootstrap.php';

// Ein neuer Router wird erstellt.
$router = new Router();         

// Die Routes werden registriert/definiert.
require 'routes.php';           

// Die Variable URI wird definiert.
$uri = '';                      

// Der Rückgabewert der parse-Methode wird eingebunden.
require $router->parse($uri);  
```