# 02 Vor- und Nachteile

## Vorteile

* Useability: Benutzer erhält ein direktes Feedback bei Fehleingaben. Daten müssen nicht zuerst an den Server gesendet werden.
* Entlastung des Servers, da ungültige Anfragen vor dem Versand abgefangen werden.

## Nachteile

* Keine Sicherheit: Kann einfach umgangen werden (deaktivieren von JS).
* Duplizierte Logik zwischen Client und Server.

## Fazit

Eine Anfrage mit (nicht validierten) Daten vom Client (oder von einem Bot) ist nie ganz sicher und sollte **immer** mindestens serverseitig validiert werden.
