# 03 Verarbeiten von Formulardaten

## GET vs. POST

Daten können via `GET`- oder `POST`-Methode an einen Server versendet werden.

### GET

Daten, die via `GET`-Methode gesendet werden, werden in der URL als «Query-String» abgebildet. Dazu wird der URL ein `?` angehängt, gefolgt von `variablenname=variablenwert`. Mehrere Parameter werden durch ein `&` voneinander getrennt.

```text
http://www.web.com/script.php?var1=wert1&var2=wert2&var3=wert3
```

Die `GET`-Methode verwenden wir, wenn wir von einem Server spezifische Daten beziehen \(= engl. `to get`\) möchten. So können wir zum Beispiel einem Script mitteilen, welche Datensatz-ID wir laden möchten:

```text
http://www.web.com/zeige-bild.php?id=4
```

### POST

Daten, die via `POST`-Methode gesendet werden, werden im Body des HTTP-Requests eingefügt. Die Daten werden dort im selben Format wie beim `GET`-Request eingefügt, sind jedoch diesmal kein Bestandteil der URL.

**Dies ist besonders beim Versenden von vertraulichen Daten wie Passwörtern wichtig zu unterscheiden:** Via GET übermittelte Daten sind **Bestandteil der URL** und werden somit auch in Logfiles oder Besucherstatistiken geloggt. Werden die Daten via POST an den Server gesendet, bleibt die URL neutral und die Daten werden separat übermittelt.

Die `POST`-Methode verwenden wir, wenn wir Daten an einen Server senden \(= engl. `to post`\) möchten. So können wir einem Script zum Beispiel den Benutzername und das Passwort für ein Login zusenden.

```php
# vom Browser generierter HTTP-Request
POST /login HTTP/1.0
Host: website.com
User-Agent: Mozilla/5.0 (X11; Linux x86_64) ...
Content-Type: application/x-www-form-urlencoded

benutzer=admin&passwort=1234
```

### PUT, PATCH, DELETE, OPTIONS, HEAD, TRACE, CONNECT

Das HTTP-Protokoll definiert noch weitere Methoden als nur `GET` und `POST`. Diese funktionieren grundlegend alle wie die `POST`-Methode, lediglich deren Bedeutung/Anwendungszweck ist anders.

Gemäss HTML-Spezifikation werden nur die `GET`- und `POST`-Methoden für `<form>`-Elemente erlaubt, daher können die anderen Methoden in einem Webbrowser nicht genutzt werden.

## Daten empfangen

Um Daten aus einem HTTP-Request in PHP zu empfangen, können die Superglobals `$_GET` und `$_POST` verwendet werden. «Superglobals» sind von PHP vordefinierte Variablen, die immer und überall verfügbar sind \(also auch in Funktionen oder Klassen\).

```php
function validate() : bool {
    $name = $_GET['name']; // funktioniert ohne `global $_GET`;
    return strlen($name) >= 2;
}
```

```php
// Via GET gesendet
// http://www.google.com/?q=One+Direction

$suchbegriff = $_GET['q'];

echo $suchbegriff; 
// One Direction
```

Das «Decoding» der Daten übernimmt PHP automatisch \(in diesem Fall `+` durch `Leerzeichen` ersetzen\).

```php
// Via POST gesendet
$name = $_POST['name'];
```

### Handelt es sich um einen `POST`-Request?

Unser Code zur Formularverarbeitung soll nur dann ausgeführt werden, wenn ein Formular abgesendet wurde, bzw. ein `POST`-Request an unser Script gesendet wurde:

```php
<?php
if(formular_abgesendet) {
    verarbeite_daten();
}
?>
...
<form ... >
```

Um zu überprüfen, ob es sich beim Request um einen `POST`-Request handelt, können wir auf die `$_SERVER` Superglobale zurückgreifen. `$_SERVER` ist ein Array mit zahlreichen Informationen zu userem Script, unserem Server und auch dem eingehenden HTTP-Request.

```text
<?php
print_r($_SERVER);

Array
(
    [HTTP_HOST] => localhost
    [HTTP_CONNECTION] => keep-alive
    [HTTP_ACCEPT] => text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
    [HTTP_UPGRADE_INSECURE_REQUESTS] => 1
    [HTTP_USER_AGENT] => Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/45.0.2454.101 Chrome/45.0.2454.101 Safari/537.36
    [HTTP_DNT] => 1
    [HTTP_ACCEPT_ENCODING] => gzip, deflate, sdch
    [HTTP_ACCEPT_LANGUAGE] => de,en-US;q=0.8,en;q=0.6
    [HTTP_COOKIE] => PHPSESSID=vbqbfps2ahq0ltccajvsu240c7
    [PATH] => /usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
    [SERVER_SIGNATURE] => <address>Apache/2.4.16 (Ubuntu) Server at localhost Port 80</address>
    [SERVER_SOFTWARE] => Apache/2.4.16 (Ubuntu)
    [SERVER_NAME] => localhost
    [SERVER_ADDR] => 127.0.0.1
    [SERVER_PORT] => 80
    [REMOTE_ADDR] => 10.0.0.10
    [DOCUMENT_ROOT] => /var/www
    [REQUEST_SCHEME] => http
    [CONTEXT_PREFIX] => 
    [CONTEXT_DOCUMENT_ROOT] => /var/www
    [SERVER_ADMIN] => webmaster@localhost
    [SCRIPT_FILENAME] => /var/www/info.php
    [REMOTE_PORT] => 57282
    [GATEWAY_INTERFACE] => CGI/1.1
    [SERVER_PROTOCOL] => HTTP/1.1
    [REQUEST_METHOD] => GET
    [QUERY_STRING] => 
    [REQUEST_URI] => /info.php
    [SCRIPT_NAME] => /info.php
    [PHP_SELF] => /info.php
    [REQUEST_TIME_FLOAT] => 1447781626.979
    [REQUEST_TIME] => 1447781626
)
```

Für diese Abfrage relevant ist der `REQUEST_METHOD`-Schlüssel. Enthält dieser den Wert `POST` werden Daten \(z. B. über ein Formular\) an den Server gesendet.

```php
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    verarbeite_daten();
}
?>
...
<form ... >
```

## Aufgabe: Vearbeitung \(Einzelarbeit\)

Erstelle den neuen Controller `ValidationController.php` und schaue via Routes-Eintrag, dass diese bei der URI `validation` aufgerufen wird.

Überprüfe nun im Controller ob POST-Daten gesendet wurden. Falls ja: Gib diese mit einem `var_dump`-Konstrukt aus. Falls nein: Leite den Besucher zurück zum Formular.

## Aufgabe: Datenzugriff \(Einzelarbeit\)

Betrachte nun das oben ausgegebene assoziative Array und überlege dir, wie du den einzelnen Wert `name` mit einem `echo`-Konstrukt ausgeben kannst.

