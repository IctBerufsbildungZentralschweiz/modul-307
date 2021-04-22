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

Die Unterschiede zwischen verschiedenen Load-Events sind auf \[[https://javascript.info/onload-ondomcontentloaded](https://javascript.info/onload-ondomcontentloaded)\] gut beschrieben. Hauptsächlich geht es darum, ob nur das HTML-Dokument geladen sein muss oder auch alle zusätzlichen Dateien \(Bilder, JS, CSS etc.\).

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

### Den `submit`-Vorgang abbrechen

Die übergebene Variable `evt` hat eine Methode `preventDefault`. Wenn diese Methode aufgerufen wird, verhindert dies das Absenden des Formulars.

```javascript
window.addEventListener("load", function(){
    document.querySelector('#formular').addEventListener('submit', function(evt) {
      //Formular wird nicht mehr abgeschickt
      evt.preventDefault();
    });
});
```

## Umsetzung einer Validierung

Ähnlich wie in PHP, kannst du im `submit` Event deine Formular-Daten validieren.

Falls Fehler vorhanden sind, kannst du mittels `evt.preventDefault()` verhindern, dass das Formular an den Sever versendet wird.

Wie Du Fehlermeldungen ausgibst, ist dir überlassen. Diese können einfach als Liste am Formularanfang oder direkt «inline» bei den jeweiligen Formularfeldern dargestellt werden.

Auch die Methode um Fehlermeldungen zu sammeln oder darzustellen ist dir überlassen. Hierfür gibt es zahlreiche Möglichkeiten.

### Beispiele für Validierung

```markup
<form action="submit.php" id="loginForm">

    <ul id="errorList"></ul> <!-- via CSS ausblenden -->

    <div class="form-group">
        <label for="username">Benutzername</label>
        <input type="text" id="username" required>
    </div>

    <div class="form-group">
        <label for="password">Passwort</label>
        <input type="password" id="password" required>
    </div>
</form>
```

#### Ausgabe einer Fehlerliste

```javascript
window.addEventListener("load", function(){

    document.querySelector('#listForm').addEventListener('submit', function(evt) {

        var errors  = [];

        if(document.querySelector('#username').value === '') {
            errors.push('Bitte gib einen Benutzernamen ein.');
        }

        if(document.querySelector('#password').value === '') {
            errors.push('Bitte gib ein Passwort ein.');
        }

        // Das Formular ist nur dann `valid` wenn 0 Fehler vorhanden sind.
        var isValid = errors.length < 1;

        if( ! isValid) {
            renderErrors(errors);
            evt.preventDefault();
        }

    });


    /**
     * Wandelt das `errors` Array in eine
     * normale HTML-Liste um.
     *
     * @param array errors
     */
    function renderErrors(errors) {

        var errorList = document.querySelector('#errorList');

        // Bestehende <li> entfernen
        errorList.innerHTML = "";

        errors.forEach(function(error) {
            const errorMessage = document.createElement("li");
            errorMessage.textContent = error;
            errorList.append(errorMessage);
        });

        errorList.style.display = "block";
    }

});
```

#### Inline-Fehler

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

