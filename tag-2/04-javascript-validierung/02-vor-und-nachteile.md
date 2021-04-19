# Vor- und Nachteile clientseitiger Validierung

## Vorteile

* Fehler können direkt bei der Eingabe validiert werden und müssen nicht zuerst an den Server gesendet werden
* Entlastung des Servers, da ungültige Anfragen vor dem Versand abgefangen werden

## Nachteile

* Duplizierte Logik zwischen Client und Server
* Kann einfach umgangen werden

## Fazit

Die clientseitige Validierung ist primär für Usability-Zwecke gut. Sie gibt dem Benutzer ein direktes Feedback bei Fehleingaben.

Für Sicherheit sorgt die clientseitige Validierung nicht, da diese sehr einfach durch das Deaktivieren von JS umgangen werden kann.

Für eine POST-Anfrage werden eigentlich weder das Formular noch ein Browser benötigt. Eine Anfrage mit nicht validierten Daten kann von diversen Quellen kommen und sollte daher **immer** mindestens serverseitig validiert werden.

