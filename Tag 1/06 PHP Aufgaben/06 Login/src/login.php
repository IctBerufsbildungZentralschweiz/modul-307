<?php
/**
 * Überprüft, ob sich ein Benutzer einloggen kann.
 *
 * @param  string   $username
 * @param  string   $password
 * @return string
 */
function login($username, $password)
{
    // Registrierte Benutzer in Array laden
    $users = include realpath(__DIR__) . '/users.php';
    
    if (array_key_exists($username, $users)) {
        if ($users[$username]['password'] === $password) {
        if ($users[$username]['blocked'] === true) {
            return 'Dieser Benutzer ist gesperrt.';
        } else {
        if ($users[$username]['role'] === 'Administrator') {
            return 'Login okay!';
        } elseif($users[$username]['role'] === 'Publisher') {
            return 'Login okay!';
        } else {
            return 'Nur Administratoren und Publisher dürfen sich einloggen.';
        }   
        }
                } else {
                    return 'Das eingegebene Passwort ist falsch.';
                    }
        } else {
            return 'Dieser Benutzer existiert nicht.';
        }
}

// Tests laden und ausführen
require realpath(__DIR__) . '/../tests/tests.php';