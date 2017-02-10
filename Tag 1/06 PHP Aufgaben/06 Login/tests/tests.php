<?php
echo "\n";

/**
 * Testfälle
 */
test('Admin kann sich einloggen',
    login('admin', '6Th43LNMEXVpV9rCesXJdLUL') === 'Login okay!'
);

test("Sue ist gesperrt und kann sich deshalb nicht einloggen",
    login('sue', 'L63h96y8YEkjJCUHSLEthYA8') === 'Dieser Benutzer ist gesperrt.'
);

test("Falsches Passwort wird erkannt",
    login('sue', 'falsches-passwort') === 'Das eingegebene Passwort ist falsch.'
);

test("Nicht registrierter Benutzer wird erkannt",
    login('unbekannter-benutzer', 'falsches-passwort') === 'Dieser Benutzer existiert nicht.'
);

test("Nur Admin und Publisher haben Zugang",
    login('bob', 'nT7rRKpmc589EpTC6Qxe2QfP') === 'Nur Administratoren und Publisher dürfen sich einloggen.'
);

/**
 * Gibt den Namen und das Resultat eines Tests aus.
 *
 * @param string  $name
 * @param boolean $result
 */
function test($name, $result)
{
    echo str_pad($name, '62') . '-> ';
    echo $result === true ? 'OK' : 'FEHLER';

    echo "\n";
}

echo "\n";
