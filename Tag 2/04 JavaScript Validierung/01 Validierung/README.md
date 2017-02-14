# Validierung

Die Validierung eines Formulars in JavaScript findet clientseitig statt.

Wir möchten die Validierung also ausführen, bevor das Formular an den Server versendet wird.

## Der `submit` Event

Wird ein Formular versendet, wird vom Browser ein `submit` Event für das abgesendete Formular ausgelöst.

Wir können jQuery verwenden, um eine Aktion für diesen Event zu definieren.

```js
$(function() {

    $('#formular').on('submit', function() {
        console.log('Formular wurde versendet.');
    });

});
```

Der Event-Handler wird ausgeführt, bevor das Formular an den Server versendet wird.

### Den `submit`-Vorgang abbrechen

Solange die Callback-Funktion nicht `false` zurückgibt, wird das Formular nach dem Ausführen der Funktion wie üblich an den Server versendet.

Um diesen Vorgang abzubrechen, muss die Funktion `false` zurückgeben.

```js
$(function() {

    $('#formular').on('submit', function() {

        // Formular kann nicht mehr abgesendet werden
        return false;

    });

});
```

## Umsetzung einer Validierung

Ähnlich wie in PHP, kannst du im `submit` Event deine Formular-Daten validieren.

Falls Fehler vorhanden sind, kannst du mittels `return false` verhindern, dass das Formular an den Sever versendet wird.

Wie Du Fehlermeldungen ausgibst, ist dir überlassen. Diese können einfach als Liste am Formularanfang oder direkt «inline» bei den jeweiligen Formularfeldern dargestellt werden.

Auch die Methode um Fehlermeldungen zu sammeln oder darzustellen ist dir überlassen. Hierfür gibt es zahlreiche Möglichkeiten.

### Beispiele für Validierung

```html
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

```js
$(function() {

    $('#loginForm').on('submit', function() {

        var errors  = [];

        if($('#username').val() === '') {
            errors.push('Bitte gib einen Benutzernamen ein.');
        }

        if($('#password').val() === '') {
            errors.push('Bitte gib ein Passwort ein.');
        }

        // Das Formular ist nur dann `valid` wenn 0 Fehler vorhanden sind.
        var isValid = errors.length < 1;

        if( ! isValid) {
            renderErrors(errors);
        }

        return isValid;

    });


    /**
     * Wandelt das `errors` Array in eine
     * normale HTML-Liste um.
     *
     * @param array errors
     */
    function renderErrors(errors) {

        var $errorList = $('#errorList');

        // Bestehende <li> entfernen
        $errorList.html('');

        errors.forEach(function(error) {
            $errorList.append('<li>' + error + '</li>');
        });

        $errorList.show();
    }

});
```

#### Inline-Fehler


```js
$(function() {

    $('#loginForm').on('submit', function() {

        var isValid = true;

        // Bei einfachen Validierungen kann z. B. auch ein
        // Array für die Felder und Fehlermeldungen
        // verwendet werden. Dieses kann dann in einer forEach
        // Schleife verarbeitet werden.
        var fields = [
            {id: 'username', message: 'Bitte gib einen Benutzernamen ein.'},
            {id: 'password', message: 'Bitte gib ein Passwort ein.'},
        ];

        // Alle vorhandenen Fehlerklassen entfernen
        $('.has-error').removeClass('has-error');

        // Alle vorhandenen Fehlermeldungen entfernen
        $('label .error-msg').remove();

        fields.forEach(function(field) {

            var $field = $('#' + field.id);

            if($field.val() === '') {

                isValid = false;

                // Eine Fehlermeldung generieren
                var errorMessage = '<span class="error-msg">'
                                 + field.message
                                 + '</span>';

                // Die .has-error Klasse kann in CSS z. B.
                // rot formatiert werden, damit die fehlerhaften
                // Felder direkt ersichtlich sind.
                $field
                    .parent() // .form-group
                    .addClass('has-error') // Fehlerklasse hinzufügen

                    .find('label') // Das <label> auswählen
                        .append(errorMessage); // Fehlermeldung hinzufügen
            }

        });

        return isValid;

    });

});
```
