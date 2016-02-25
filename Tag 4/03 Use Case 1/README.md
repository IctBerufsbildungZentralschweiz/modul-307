# Use Case 1

## Aufgabenstellung

Realisiere das Projekt «bisHop!» gemäss Briefing.

Die Basis für das Formular wurde für bereits für dich erstellt.

Das Projekt wird vom Kunden erst nach Bestehen aller Abnahmetests abgenommen und bezahlt!

## Abnahmetests

```
GEGEBEN SEI    ich bin auf der Bestellseite
               UND habe alles korrekt ausgefüllt
WENN           ich die Bestellung absende
DANN           wird eine Bestätigungsseite angezeigt
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
               UND ich habe nicht alle Kundendaten ausgefüllt 
WENN           ich die Bestellung absende
DANN           wird eine entsprechende Fehlermeldung per JS generiert
               UND das Formular wird nicht abgesendet
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
               UND ich habe JS deaktiviert
               UND ich habe nicht alle Kundendaten ausgefüllt 
WENN           ich die Bestellung absende
DANN           wird eine entsprechende Fehlermeldung für eine
               fehlende Email oder ein fehlendes Passwort per PHP generiert
               UND ich werde nicht auf die Bestätigungsseite umgeleitet
               UND meine Eingaben sind in den Feldern wieder vorausgefüllt
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
               UND ich habe JS deaktiviert
               UND ich habe bei mindestens einem Produkt
               keine Anzahl eingegeben 
WENN           ich die Bestellung absende
DANN           wird die Fehlermeldung "Bitte geben Sie immer Grösse
               und Anzahl ein!" per PHP generiert
               UND ich werde nicht auf die Bestätigungsseite umgeleitet
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
WENN           ich die Anzahl eines Produktes ändere 
DANN           wird das Gesamttotal neu berechnet 
```

```
GEGEBEN SEI    ich bin auf der Bestellseite
WENN           ich noch nichts an der Anzahl geändert habe
DANN           ist das Gesamttotal dennoch bereits korrekt per JS 
               berechnet worden
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
WENN           ich als Anzahl für ein Produkt nichts eingebe
DANN           wird das Gesamtotal ohne dieses Produkt berechnet
```

```
GEGEBEN SEI    ich bin auf der Bestellseite (mit Firefox)
               UND ich habe als Kundennummer "><script>alert('XSS');</script>  
               eingegeben
WENN           ich die Bestellung absende
DANN           wird keine alert Box "XSS" angezeigt
               UND das HTML-Markup wird durch die Eingabe nicht zerstört
```

### Zusatzaufgaben

```
GEGEBEN SEI    ich bin auf der Bestellseite  
               UND ich habe JS deaktiviert
               UND ich habe bei mindestens einem Produkt
               eine grössere Anzahl als 20 eingegeben 
WENN           ich die Bestellung absende
DANN           wird die Fehlermeldung "Die maximale Bestellmenge pro Artikel   
               ist 20 Stück" per PHP generiert
               UND ich werde nicht auf die Bestätigungsseite umgeleitet
```

```
GEGEBEN SEI    ich bin auf der Bestellseite  
WENN           ich bei mindestens einem Produkt eine grössere Anzahl
               als 20 eingebe
               ODER ich bei mindestens einem Proudkt keine Anzahl eingebe
DANN           wird das entsprechende Input-Feld für die Anzahl rot umrandet 
```
