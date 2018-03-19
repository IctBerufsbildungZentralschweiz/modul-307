# PHP

> PHP (rekursives Akronym und Backronym für «PHP: Hypertext Preprocessor», ursprünglich «Personal Home Page Tools») ist eine Skriptsprache mit einer an C und Perl angelehnten Syntax, die hauptsächlich zur Erstellung dynamischer Webseiten oder Webanwendungen verwendet wird.
>
> PHP wurde erstmals 1995 von seinem Entwickler, Rasmus Lerdorf, veröffentlicht.

[Wikipedia](https://de.wikipedia.org/wiki/PHP)

Aktuell ist PHP als Version 7 verfügbar.

## Wer nutzt PHP?

Einige der grössten Websites der Welt...

* Facebook (HHVM)
* Wikipedia (HHVM)
* Flickr
* Tumblr
* Yahoo
* Sourceforge
* Mailchimp
* Fotolia
* Imgur
* Uber
* ...

Und natürlich die grossen CMS...

* Wordpress
* Drupal
* Typo
* Joomla
* ...

> PHP wird auf etwa 244 Millionen Websites eingesetzt (Stand: Januar 2013), wird auf über 82 % aller Websites als serverseitige Programmiersprache verwendet (Stand: Januar 2015) und ist damit die am häufigsten verwendete Sprache zum Erstellen von Websites - Tendenz steigend. Die Programmiersprache ist sie bei den meisten Webhostern vorinstalliert.

## Was genau ist PHP?

PHP ist eine serverseitige Scriptsprache und erlaubt dem Entwickler Logik in seine Webpages zu integrieren.

Mit PHP können Daten von verschiedensten Quellen verarbeitet werden:

* Datenbanken
* Dateisystem
* HTTP-Requests
* Entfernte APIs
* u. v. m.

## Wie funktioniert PHP?

PHP setzt sich aus der Scriptsprache und dem dazugehörigen Interpreter zusammen.

Der Webserver (in unserem Fall Apache) verfügt über ein PHP-Modul. Dieses Modul versteht PHP-Code, es kann ihn also interpretieren.

Beim Aufruf einer Webpage durch den Besucher lädt der Webserver das gewünschte Script und schickt es an das PHP-Modul. Dort wird der PHP-Code  verarbeitet. Dabei können Script-Ausgaben entstehen. Diese Ausgaben werden in die aufgerufene Seite eingefügt und anschliessend an den Browser des Besuchers gesendet.

![Szene 8](https://raw.githubusercontent.com/IctBerufsbildungZentralschweiz/modul-307/master/Tag%201/02%20Client-Server-Infrastruktur/res/08.jpg)

### Aufruf über Webserver

Hier ein Beispiel eines PHP-Scripts, wie es auf dem Server abgespeichert ist. Mittels dem `echo`-Konstrukt wird HTML-Code direkt in das Dokument ausgegeben.

```php
<!DOCTYPE html>
<html>
<head>
    <title>Ein PHP-Beispiel</title>
</head>
<body>

<?php
     echo '<p>Diese Ausgabe wurde von PHP generiert.</p>';
?>

</body>
</html>
```


Wir rufen das Script über den Link `http://localhost/script.php` im Browser auf. Es wird nun vom PHP-Modul verarbeitet.

Nach der Verarbeitung wird das Dokument ohne den ursprünglichen PHP-Code an den Browser gesendet. Nur dessen Ausgabe ist noch vorhanden.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Ein PHP-Beispiel</title>
</head>
<body>

<p>Diese Ausgabe wurde von PHP generiert.</p>

</body>
</html>
```

Das resultierende Dokument wird vom Browser also wie normales HTML behandelt. Dass darin einmal PHP-Code vorhanden war, weiss dieser nicht.

PHP ermöglicht es, die Ausgabe von HTML-Code an Bedingungen zu knüpfen. So können dynamische Dokumente erstellt werden.
