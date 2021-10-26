# 03 Aufgabe

Erweitere dein Formular mit einer clientseitigen Validierung.

**Bonusaufgabe:** Findest du einen Weg wie du die Validierungslogik des Servers im Client wiederverwenden kannst?

Tipp: Dies kann z.B. via Ajax und einem entsprechenden Controller und Eintrag in der Routing-Tabelle passieren.

```javascript
$("form").on('submit', function(){ $.ajax({url: "seite_xy/validator", // Funktion, welche den Submit entweder zulässt (success:) oder die zurückgegebenen Fehlermeldungen platziert (error:). }); });
```
