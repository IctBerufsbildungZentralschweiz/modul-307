# Validierung

Die Validierung eines Formulars in JavaScript findet clientseitig statt.

Wir möchten die Validierung also ausführen, bevor das Formular an den Server versendet wird.

## Der `submit` Event

Wird ein Formular versendet, wird vom Browser ein `submit` Event für das abgesendete Formular ausgelöst.

Wir können JavaScript verwenden, um eine Aktion für diesen Event zu definieren.

```js
document.querySelector('#formular').addEventListener('submit', function() {
    console.log('Formular wurde versendet.');
});
```

Der Event-Handler wird ausgeführt, bevor das Formular an den Server versendet wird.

### Den `submit`-Vorgang abbrechen

Solange die Callback-Funktion nicht `false` zurückgibt, wird das Formular nach dem Ausführen der Funktion wie üblich an den Server versendet.

Um diesen Vorgang abzubrechen, muss die Funktion `false` zurückgeben.

```js
document.querySelector('#formular').addEventListener('submit', function(e) {
    // Formular kann nicht mehr abgesendet werden
    e.preventDefault();
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

document.querySelector('#formular').addEventListener('submit', function(e) {

    var errors  = [];

    if (document.querySelector('#username').value === '') {
        errors.push('Bitte gib einen Benutzernamen ein.');
    }

    if (document.querySelector('#password').value === '') {
        errors.push('Bitte gib ein Passwort ein.');
    }

    // Das Formular ist nur dann `valid` wenn 0 Fehler vorhanden sind.
    var isValid = errors.length < 1;

    if ( ! isValid) {
        renderErrors(errors);
        e.preventDefault();
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

    // Bestehende Fehler entfernen
    errorList.innerHTML = '';

    errors.forEach(function(error) {
        var li = document.createElement('li');
        li.innerText = error;

        errorList.appendChild(li)
    });

    errorList.style.display = 'block';
}

```