<?php
/**
 * Nutze diese Funktion um einfach eine Ausgabe
 * mit htmlspecialchars() zu erstellen.
 *
 * @param  string   $value
 * @return string
 */
function e(string $value) : string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Nutze diese Funktion um auf einen POST-Wert
 * zuzugreifen.
 *
 * @param  string  $value
 * @return mixed
 */
function post(string $key, $default = '')
{
    return array_key_exists($key, $_POST) ? $_POST[$key] : $default;
}

/**
 * Nutze diesen Funktion um den Pfad zu einer
 * View zurückzuerhalten.
 *
 * @param  string   $view
 * @return string
 */
function view(string $view) : string
{
    return __DIR__ . "/views/${view}.php";
}
