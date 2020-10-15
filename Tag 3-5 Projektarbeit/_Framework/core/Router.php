<?php

class Router
{
    /**
     * Enthält alle definierten Routes.
     */
    protected array $routes = [];

    /**
     * Initialisiert die definierten Routes.
     */
    public function __construct(array $routes)
    {
        array_walk($routes, function ($value, $key) {
            // Normalisiere alle definierten Routes.
            $this->routes[$this->cleanUrl($key)] = $value;    
        });
    }

    /**
     * Führt die Controller-Action für eine URL aus.
     */
    public function run(string $url)
    {
        $url = $this->cleanUrl($url);

        if ( ! array_key_exists($url, $this->routes)) {
            http_response_code(404);
            die('Keine Route für diese URL gefunden.');
        }

        // Teile die Definition in Controller- und Methoden-Namen auf.
        [$controller, $method] = explode('@', $this->routes[$url]);
        if ( ! $controller || ! $method) {
            http_response_code(500);
            die('Route-Actions müssen im Format "Controller@Methode" definiert sein.');
        }

        // Stelle sicher, dass die definierte Controller-Datei existiert.
        $path = __DIR__ . "/../app/Controllers/$controller.php";
        if ( ! file_exists($path)) {
            http_response_code(500);
            die("Controller '$controller' existiert nicht");
        }

        // Lade die Controller-Datei.
        require_once $path;

        if ( ! class_exists($controller)) {
            http_response_code(500);
            die("Controller '$controller' ist keine gültige Klasse");
        }

        // Überprüfe, ob die definierte Methode existiert. Wenn ja, rufe sie auf.
        $handler = new $controller;
        if ( ! method_exists($controller, $method)) {
            http_response_code(500);
            die("Methode '$controller@$method' existiert nicht");
        }

        return $handler->$method();
    }

    /**
     * Entfernt / am Anfang und Ende eines Strings, konvertiert einen String zu Kleinbuchstaben.
     */
    protected function cleanUrl(string $url) : string
    {
        return strtolower(trim($url, '/'));
    }
}