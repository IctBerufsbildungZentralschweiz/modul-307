# 01 Validierung

Die Validierung eines Formulars in JavaScript findet clientseitig statt.

Wir möchten die Validierung also ausführen, bevor das Formular an den Server versendet wird.

## Der `load` Event

Mit dem `load` Event gehen wir sicher, dass der Code innerhalb dieser Funktion erst ausgeführt wird, wenn die komplette Seite vom Client geladen wurde:

```javascript
window.addEventListener("load", function(){
    // Code wird erst ausgeführt, wenn Seite geladen wurde.
});
```

Die Unterschiede zwischen verschiedenen Load-Events sind auf \[[https://javascript.info/onload-ondomcontentloaded](https://javascript.info/onload-ondomcontentloaded)] gut beschrieben. Hauptsächlich geht es darum, ob nur das HTML-Dokument geladen sein muss oder auch alle zusätzlichen Dateien (Bilder, JS, CSS etc.).

## Der `submit` Event

Wird ein Formular versendet, wird vom Browser ein `submit` Event für das abgesendete Formular ausgelöst.

Auf dieses Event können wir reagieren:

```javascript
window.addEventListener("load", function(){
    document.querySelector('#formular').addEventListener('submit', function(evt) {
      console.log('Formular wird jetzt versendet.');
    });
});
```

Der Event-Handler wird ausgeführt, bevor das Formular an den Server versendet wird.

## Umsetzung einer Validierung

Ähnlich wie in PHP, kannst du im `submit` Event deine Formular-Daten validieren.

Wie Du Fehlermeldungen ausgibst, ist dir überlassen. Diese können einfach als Liste am Formularanfang oder direkt «inline» bei den jeweiligen Formularfeldern dargestellt werden.

Auch die Methode um Fehlermeldungen zu sammeln oder darzustellen ist dir überlassen. Hierfür gibt es zahlreiche Möglichkeiten.

### Formular mit Platzhalter für Fehlerliste

```markup
<form action="login" id="loginForm">

    <p id="errorList"></p> <!-- via CSS ausblenden -->
    <fieldset>
        <div class="form-group">
            <label for="username">Benutzername</label>
            <input type="text" id="username" required>
        </div>
    
        <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" id="password" required>
        </div>
        </fieldset>
    <input id="submit" type="submit" value="Formular absenden">
</form>
```

### Validierung und bei Fehler den `submit`-Vorgang abbrechen!

Die übergebene Variable `evt` hat eine Methode `preventDefault`. Falls Fehler vorhanden sind, kannst du mittels `evt.preventDefault()` verhindern, dass das Formular an den Sever versendet wird. Siene Beispiel oben.

```javascript
window.addEventListener("load", function(){
    document.querySelector('#loginForm').addEventListener('submit', function(evt) {

        var errors  = [];

        // Username validieren
        if(document.querySelector('#username').value === '') {
            errors.push('Bitte gib einen Benutzernamen ein.');
        }

        // Passwort validieren
        var password = document.querySelector('#password').value;
        if(password.length < 6) {
            errors.push('Bitte gib ein Passwort ein, welches mindestens 6 Zeichen lang ist.');
        }
        if(password == password.toLowerCase()) {
            errors.push('Das Passwort muss mindestens einen Grossbuchstaben enthalten.');
        }

        // Das Formular ist nur dann `valid` wenn 0 Fehler vorhanden sind.
        if(errors.length > 0) {
            renderErrors(errors); /* Ausgabe: Siehe unten */
            evt.preventDefault();
        }
        else {
            // Alles OK -> Error-Liste verstecken!
            errorList.style.display = "none";
        }
    });
});
```

### Ausgabe der Fehlerliste

Alle Fehler werden gebündelt im Platzhalter  ausgegeben:

```javascript
    /**
     * Gib die Einträge im `errors` Array mit <br> getrennt 
     * in einem Platzhalter aus.
     *
     * @param array errors
     */
    function renderErrors(errors) {

        var errorList = document.querySelector('#errorList');

        // Alle Fehler mit einem <br> getrennt ausgeben
        errorList.innerHTML = errors.join('<br>');

        // Versteckte Liste anzeigen
        errorList.style.display = "block";
    }
```

## Zusatz für Fortgeschrittene

### Inline-Fehler

Folgendes Script gibt die Fehlermeldungen direkt beim zugehörigen Feld aus:

```javascript
window.addEventListener("load", function(){
    document.querySelector('#inlineForm').addEventListener('submit', function(evt) {

        // Bei einfachen Validierungen kann z. B. auch ein
        // Array für die Felder und Fehlermeldungen
        // verwendet werden. Dieses kann dann in einer forEach
        // Schleife verarbeitet werden.
        var fields = [
            {id: 'username', message: 'Bitte gib einen Benutzernamen ein.'},
            {id: 'password', message: 'Bitte gib ein Passwort ein.'},
        ];
        // Alle vorhandenen Fehlerklassen entfernen
        document.querySelectorAll('.has-error').forEach(element => element.classList.remove('has-error'));
        // Alle vorhandenen Fehlermeldungen entfernen
        document.querySelectorAll('label .error-msg').forEach(element => element.remove());
        fields.forEach(function(field) {
            var fieldElement = document.querySelector('#' + field.id);
            if(fieldElement.value === '') {
                //Wir stoppen das Senden des Formulars durch den Browser, sobald wir einen Fehler entdecken.
                evt.preventDefault();

                // Eine Fehlermeldung generieren
                var errorMessage = document.createElement("span");
                errorMessage.classList.add("error-msg");
                errorMessage.textContent = field.message;

                // Die .has-error Klasse kann in CSS z. B.
                // rot formatiert werden, damit die fehlerhaften
                // Felder direkt ersichtlich sind.
                const formGroup = fieldElement.parentElement // .form-group
                formGroup.classList.add('has-error') // Fehlerklasse hinzufügen
                formGroup.querySelector('label') // Das <label> auswählen
                    .append(errorMessage); // Fehlermeldung hinzufügen
            }
        });
    });
});
```
