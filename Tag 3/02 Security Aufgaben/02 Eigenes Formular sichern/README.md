## Eigenes Formular absichern

Wende die gelernten Techniken nun auf dein eigenes Formular an.

Nutze die folgenden Test-Eingaben um zu überprüfen, ob dein Formular vor XSS-Attacken geschützt ist. Nutze zum Testen einen anderen Browser als Chrome, da dieser einfache XSS-Attacken automatisch verhindert.

* Stelle sicher, dass keine Alert-Boxen erscheinen, also kein JavaScript eingeschleust werden kann.
* Stelle sicher, dass kein Teil deiner Eingabe bei der Ausgabe ausserhalb der `input` Felder erscheint. Es muss alles, was du in ein Feld eingegeben hast, wieder 1:1 darin erscheinen. Dein HTML darf also nicht durch Benutzereingaben verändert werden!

```
<script>alert("XSS")</script>
```

```
"><script>alert("XSS")</script>
```

```
>'>"><img src=x onerror=alert('XSS')>.
```
