# Applikationssicherheit

Die Sicherheit sollte beim Entwickeln einer Webapplikation immer höchste Priorität haben. Als Entwickler hast du die Verantwortung dafür zu sorgen, dass deine Kunden und deren Daten bei dir gut aufgehoben sind.


## Traue nie Benutzereingaben!

Ein wichtiger Grundsatz für die Absicherung deiner Applikation ist, dass du Eingaben, die vom Benutzer kommen, nie trauen sollst!

Dies beinhaltet unter anderem:

* GET- und POST-Daten 
* Cookies
* Dateiuploads

Über alle diese Eingaben kann Schadcode direkt in deine Applikation eingeschleust werden.

## Ein kleines Beispiel

Öffne dein Formular in Firefox oder Internet Explorer (nicht Chrome) und gib als Telefonnummer folgenden Wert ein.

```
<script>eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1.0.2=\'3://5.4/6\';',7,7,'location|document|href|http|gl|goo|bylFCM'.split('|'),0,{}))</script>
```

## Einige Arten von Sicherheitslücken

Anschliessend eine **nicht abschliessende** Liste von möglichen Sicherheitslücken und wie du diese verhindern kannst. Die aufgezeigten Fälle sind besonders für unseren ÜK-Anwendungsbereich relevant.

Weitere Informationen zum Thema Applikationssicherheit findest du auf der Website des [Open Web Application Security Project (OWASP)](https://www.owasp.org/).

### Cross-Site Scripting (XSS)

Das obenstehende Beispiel ist eine XSS-Attacke. Dabei wird in eine Applikation Code eingeschleust, der dann unverarbeitet wieder in den Browser des Besuchers ausgegeben wird. Dies wird oft genutzt, um Besucher auf Malware-Website umzuleiten oder Cookies zu stehlen.

Obenstehender Code enthält JavaScript-Code, der den Browser auf `http://mrdoob.com/lab/javascript/effects/ie6/` umleitet.

Da der eingegebene Code in unserer Fehlermeldung 1:1 wieder ausgegeben wird, ermöglichen wir es einem Angreifer, Code direkt in unser HTML zu integrieren!

```html
<ul class="errors">
    <li>Die Telefonnummer "<script>eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1.0.2=\'3://5.4/6\';',7,7,'location|document|href|http|gl|goo|bylFCM'.split('|'),0,{}))</script>" ist ungültig.</li>
</ul>
```

Achtung: Das gleiche Problem tritt auch auf, wenn wir unsere Eingabefelder bei fehlerhaften Daten im Formular mit den Eingaben des Benutzers wieder ausfüllen!


```html
<!-- Beispieleingabe -->
("><script>alert('XSS');</script>)

<!-- Output -->
<input type="text" value="("><script>alert('XSS');</script>)">
```

#### XSS verhindern mit htmlspecialchars

PHP bietet einige Möglichkeiten an, die Eingaben des Benutzers sicher wieder auszugeben. Mit der Funktion `htmlspecialchars` werden in HTML verwendete Zeichen wie `<>` oder `"` in so genannte Entities (`&gt;`) umgewandelt.

```php
echo htmlspecialchars('<script type="javascript">');
// &lt;script&gt; type=&quot;javascript&quot;
```

Anwendung im Formular:

```php
<input type="text" value="<?= htmlspecialchars($phone) ?>">

// Neue Ausgabe
<input type="text" value="&quot;&gt;&lt;script&gt;alert('XSS');&lt;/script&gt;">
```

So ist es nicht mehr möglich Schadcode auf der Website einzubinden.

Wichtig beim Verwenden dieser Funktion ist, dass für die HTML-Attribute doppelte Anführungszeichen `"` verwendet werden!

Wird die Funktion in einem Kontext verwendet, in dem auch einfache Anführungszeichen `'` umgewandelt werden sollen, kann `ENT_QUOTES` als 2. Parameter mitgegeben werden.

Zudem ist auch wichtig, dass das Encoding deiner Datei korrekt ist und mit den PHP-Einstellungen übereinstimmt. Weichen die beiden Werte voneinander ab, muss das Encoding als 3. Parameter mitgegeben werden.

Siehe [htmlspecialchars auf php.net](https://secure.php.net/manual/de/function.htmlspecialchars.php)

### Local File Inclusion

Bei der Local File Inclusion wird ein `include` Statement so missbraucht, dass es eine beliebige Datei aus dem Dateisystem lädt.

#### Beispiel

Du hast dir ein eigenes kleines CMS gebastelt. Die verschiedenen Seiten bindest du über ein `include` Statement in dein Template ein. Welche Datei eingebunden werden soll, entscheidest du über den `page` GET-Parameter. Deine URLs sehen also wie folgt aus:

```
http://superman.ch/index.php?page=home.php
http://superman.ch/index.php?page=kontakt.php
http://superman.ch/index.php?page=impressum.php
```

Dein Dateisystem enthält die untenstehenden Dateien. Damit deine E-Banking Zugangsdaten auch vor unerlaubten Zugriff geschützt sind, hast du den direkten Zugriff auf .txt Dateien über deine Webserver-Konfiguration blockiert.

```
 | index.php                # Template
 | home.php                 # Home-Seite
 | kontakt.php              # Kontakt-Seite
 | impressum.php            # Impressum-Seite
 | e-banking-passwd.txt     # ???
```

Dein Template sieht so aus:

```php
<?php
$page = $_GET['page'] ?? 'home.php';

include $page;
?>
```

Dieser Fehler wird teuer, sobald jemand folgende URL aufruft:

```
http://superman.ch/index.php?page=e-banking-passwd.txt
```


#### Local File Inclusion verhindern

Lege immer fest, welche Pfade eingebunden werden dürfen. Füge nie eine Variable von aussen direkt in einen Pfad ein. Verwende niemals komplette Dateienamen in deinen URLs!

```
http://superman.ch/index.php?page=home
http://superman.ch/index.php?page=kontakt
http://superman.ch/index.php?page=impressum
```

```php
<?php
$page = $_GET['page'] ?? 'home';

// Erlaubte Routes
$routes = [
    'home'      => 'home.php',
    'kontakt'   => 'kontakt.php',
    'impressum' => 'impressum.php',
];

$include = '404.php'; // Standard => Fehlerseite!

// Nur wenn die Route existiert...
if(array_key_exists($page, $routes)) {
    // ...die Datei einbinden
    $include = $routes[$page];
}

include $include;
?>
```

### SQL-Injections (nicht ÜK relevant)

Bei einer SQL-Injection wird das unverarbeitete Einfügen von Benutzereingaben in eine SQL-Query missbraucht.

```SQL
SELECT `password` FROM `users` WHERE username = '$username';
```

Wird beispielsweise als Benutzername die SQL-Injection `'; DROP TABLE users; SELECT'` eingegeben, ist die Query so abgeändert worden, dass die komplette `users` Tabelle gelöscht wird.

```SQL
SELECT `password` FROM `users` WHERE username = ''; DROP TABLE users; SELECT '';
```

#### SQL-Injections verhindern

Füge **niemals** Benutzereingaben direkt in eine SQL-Query ein. Verwende die modernen PHP-Erweiterungen [`mysqli`](https://secure.php.net/manual/de/book.mysqli.php) oder [`PDO`](https://secure.php.net/manual/en/book.pdo.php). Funktionen, die mit `mysql_` beginnen, dürfen nicht mehr verwendet werden!

Verwende Prepared Statements: Auf diese Weise werden deine Query und die Benutzereingaben getrennt an den Datenbankserver gesendet und müssen nicht vereint werden. Der DB-Server übernimmt das sichere Handling der Query dann für Dich.

```php
$statement = $dbh->prepare("SELECT `password` FROM `users` WHERE username = :username");
$statement->bindParam(':username', $username);
$statement->execute();

$user = $statement->fetch();
...
```

### Verschlüsselung und Hashing 

Auch Verschlüsselung und Hashing von Daten sind wichtige Aspekte der Sicherheit. 

* Versuche deine Website immer über HTTPS zu betreiben. Nutze Angebote wie [letsencrypt.org](http://letsencrypt.org) um ein kostenloses SSL-Zertifikat zu erhalten.
* Schreibe **niemals** deine eigenen Verschlüsselungsfunktionen. Greife immer auf von Experten erstelle und getestete Bibliotheken zur Verschlüsselung zurück.

#### Hashing von Passwörtern

Speichere **niemals** Passwörter deiner Benutzer als Plaintext in die Datenbank. Versuche auch **niemals** diese zu verschlüsseln!

Nutze die Hashing-Funktionen von PHP (`password_hash`) um den Hash eines Passworts zu generieren. Speichere nur diesen in die Datenbank.

Wenn sich dein Benutzer anmelden möchte, musst du nur den Hash seiner Eingabe mit dem in der Datenbank gespeicherten vergleichen (via `password_verify`). Das Passwort muss somit nie abgespeichert werden.

Beim Generieren eines Hashs gehen Informationen verloren. Somit ist es nicht möglich, vom Hash auf die ursprüngliche Eingabe zurückzuschliessen.

In alten PHP-Tutorials werden oft Hashing-Funktionen wie `md5` oder `sha1` für Passwörter verwendet. Diese dürfen heute **auf keinen Fall** mehr zum Hashen von Passwörtern verwendet werden.

```php
<?php
$hash = password_hash('wreckingball', PASSWORD_DEFAULT);
// $2y$10$Wn1yu.o6.zIWejtVYQivlOBBjerpb3cHDVDvK0Az7ox0M.K9P6kyW

if(password_verify('wreckingball', $hash)) {
    echo 'Passwort ist korrekt!';
}
?>
```