# Use Case 2

## Aufgabenstellung

Realisiere das Projekt «Gewinnspiel» gemäss Briefing.

Die Basis für das Formular wurde für bereits für dich erstellt.

Das Projekt wird vom Kunden erst nach Bestehen aller Abnahmetests abgenommen und bezahlt!

## Abnahmetests

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite
               UND habe alles korrekt ausgefüllt
WENN           ich das Formular absende
DANN           wird eine Bestätigungsseite angezeigt
               UND der Eintrag wurde in der CSV-Datei eingetragen
```

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite
               UND ich verwende einen ungültigen Gewinncode
WENN           ich das Formular absende
DANN           erhalte ich die Fehlermeldung, dass der Code ungültig ist
               UND meine bereits eingetragenen Daten werden im
               Formular wieder angezeigt
```

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite
               UND ich verwende einen bereits verwendeten Gewinncode
WENN           ich das Formular absende
DANN           erhalte ich die Fehlermeldung, dass der Code bereits
               verwendet wurde
               UND meine bereits eingetragenen Daten werden im
               Formular wieder angezeigt
```

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite
               UND ich habe JS deaktiviert
               UND ich fülle nicht alle Felder aus
WENN           ich das Formular absende
DANN           erhalte ich eine Fehlermeldung für jedes nicht ausgefüllte Feld
               UND meine bereits eingetragenen Daten werden im
               Formular wieder angezeigt
```

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite 
               UND ich fülle nicht alle Felder aus
WENN           ich das Formular absende
DANN           wird eine entsprechende Fehlermeldung für jedes Feld
               per JS generiert
               UND das Formular wird nicht abgesendet
```


```
GEGEBEN SEI    ich bin auf der Gewinnspielseite (mit Firefox)
               UND ich habe als Vorname "><script>alert('XSS');</script>
               eingegeben
WENN           ich das Formular absende
DANN           wird keine alert Box "XSS" angezeigt
               UND das HTML-Markup wird durch die Eingabe nicht zerstört
```


### Zusatzaufgaben

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite  
WENN           ich meinen Gewinncode eintippe
DANN           wird automatisch überprüft, ob er mindestens 19 Zeichen
               lang ist. Wenn nicht, wird das Eingabefeld rot umrandet.
```

```
GEGEBEN SEI    ich bin auf der Gewinnspielseite  
WENN           ich meinen Gewinncode eintippe
DANN           wird automatisch überprüft, ob er dem Format
               (XXXX-XXXX-XXXX-XXXX) entspricht.
               Wenn nicht, wird das Eingabefeld rot umrandet.
```
