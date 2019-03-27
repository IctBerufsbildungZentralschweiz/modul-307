<?php

class Router
{
    public $routes = [];

    /**
     * Initialisiert die definierten Routes
     * in der Datei routes.php.
     *
     * @param $routes
     */
    public function define($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Sucht zu einer übergebenen URI ($uri) den dazugehörigen
     * Dateipfad zum Controller.
     *
     * @param $uri
     * @return mixed
     */
    public function parse($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        http_response_code(404);
        die('Keine Route für diese URI gefunden.');
    }

}