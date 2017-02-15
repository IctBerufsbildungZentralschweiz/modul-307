# Projektarbeit
Bis zum Ende des Kurses habt ihr nun Zeit um eines der folgendes Projekte zu realisieren. Das Projekt ist gleichzeitig auch die Bewertungsgrundlage für diesen Kurs. Das Projekt besteht aus drei Teilen mit folgender Gewichtung:

1. Konzeptionierung (20%)
2. Realisierung (65% + 10% DONTS)
3. Testbericht (5%)


## 1. Konzeptionierung
Während der Konzeptionierung des Projektes erhaltet ihr die projektspezifischen Informationen. Eure Aufgabe in diesem Arbeitschritt ist es, die notwenigen Vorbereitungsaufgaben für die Realisation vorzunehmen. Das Konzept muss um 15.00 Uhr (Zeit kann durch Kursleiter angepasst werden) des letzten Kurstages abegeben werden. Das abgegebene Dokument ist die Bewertungsgrundlage für den Punkt Konzeptionierung.

Folgende Bestandteile muss das Projekt mindestens enthalten:

### Formulare
Sämtliche im Projekt benötigten Formulare sollen skizziert und beschrieben werden. Folgende W-Fragen sind dabei für die Dokumentation zentral:

* Wie sollen die Formularfelder strukturiert werden (Skizze)?
* Was für eine Bezeichnung soll das jeweiligen Formularfeld erhalten?
* Was für Informationen werden in den jeweiligen Formularfeldern erfasst?
* Was für ein Typ von Informationen werden in den jeweiligen Formularfeldern erfasst?

### Validierung
In diesem Schritt sollt ihr euch überlegen, wie die oben definierten Formularfelder validiert werden sollen. Erstellt dazu eine Übersicht mit folgenden Informationen:

* Formular
* Formularfeld
* Validierung(en)

(Doppelte Formularfelder müssen nur einmal aufgeführt werden.)

### Datenbank
Neben der Dateingabe soll auch die Datenspeicherung bereits in diesem Schritt definiert werden. Aus diesem Grund gehört auch die Definition der Datenbank-Tabelle und der dazugehörigen Tabellen-Felder zur Konzeptionierung des Projektes. Folgende Informationen werden dazu gefordert:

* Feld-Bezeichnungen
* Feld-Typ-Definition

### Testfälle
Vor der Übergabe des Projektes an den Kunden soll die komplette Applikation getestet werden. Definiert dazu 10 Testfälle um die Funktionsfähigkeit eurer Applikation möglichst breit zu überprüfen. Geht dabei nach folgendem Schema vor:

```
GEGEBEN SEI   Ich bin als Administrator eingeloggt
WENN          ich einen Benutzer lösche
DANN          wird dieser Benutzer aus der Datenbank gelöscht
```

### Roadmap
Definiert für die Umsetzung des Projektes eine Roadmap für die nächsten beiden Tage. Darin sollte ersichtlich sein, wann ihr welche Projekt-Etappen realisieren wollt. Pflichtelemente für eure Roadmap sind folgende Punkte:
1. Jeden Morgen, zum Start des Kurstages, gibt es ein kurzes Statusupdate sämtlicher Gruppen mit folgenden Fragestellungen:
    * Sind wir auf Kurs?
    * Was ist unser nächster Schritt?
2. Am 4. Kurstag am Nachmittag müsst ihr mit dem Auftraggeber (Kursleiter) einen Termin vereinbaren. An diesem Meeting präsentiert ihr den Zwischenstand eurer Arbeit und könnt offene Fragen an den Auftraggeber stellen.

## 2. Realisierung
Nachdem das Projekt geplant wurde, kann mit der Realisation gestartet werden. Massgebend für die Bewertung ist der Datenbestand, welcher sich bei Kursende auf dem definierten Speichermedium befindet. Zur Projekt-Abgabe gehörden folgende Dokumente:
* Projekt-Files
* Datenbank-Export

## 3. Testbericht
Ebenfalls ein Bestandteil des Projektes ist das Testing anhand der zu Beginn definierten Testfälle. In einem Testbericht sollen folgende Informationen zusammengetragen werden:
* Welche Tests wurden erfolgreich durchgeführt?
* Welche Tests wurde nicht erfolgreich durchgeführt?
* Welche Funktionen konnten noch nicht integriert werden (inkl. Zusatzfunktionen)?

## Präsentation (kein Teil der Bewertung)
Kurzpräsentation (max. 10 Minuten pro Gruppe) der Projekte mit folgenden Inhalten:
* Präsentation der Oberfläche
* Grösste Schwierigkeiten
* Wichtigste Learnings
* Was würde ich das nächste Mal anders machen?

# Bewertungsraster
## Konzept
* Definition des Formulars (3 P)
* Planung der Validierung (2 P)
* Planung der Datenbank (3 P)
* Sinnvolle Einteilung der Arbeiten - Roadmap (2 P)
* Definition der Testfälle (10 P)

## Realisation
### Eintrag erstellen
#### Formular (10 P)
* Vollständigkeit der Felder
* Richtigkeit der Feld-Typen
* Benutzerfreundlichkeit des Formulars / Informationsgruppierung
* Korrekte Bearbeitungsmaske

#### Validierung (11 P)
* Korrekte Validierung der Formularfelder
* Benutzerfreundliche Validierung / Fehlerausgabe

#### Datenspeicherung (9 P)
* Korrekt erstellte Datenbanktabelle
* Korrekte und vollständige Speicherung der Daten
* Korrekte Verknüpfung der Datenbanktabellen

#### Zusatzaufgabe (3 P)

### Eintrag bearbeiten
#### Formular (10 P)
* Vollständigkeit der Felder
* Richtigkeit der Feld-Typen
* Benutzerfreundlichkeit des Formulars / Informationsgruppierung
* Korrekte Bearbeitungsmaske

#### Validierung (4 P)
* Korrekte Validierung der Formularfelder
* Benutzerfreundliche Validierung / Fehlerausgabe

#### Datenmutation (4 P)
* Korrekte und vollständige Speicherung der angepassten Daten

### Einträge anzeigen
#### Liste (11 P)
* Geforderte Informationen werden angezeigt
* Übersichtliche Informationsanzeige / Benutzerfreundlichkeit
* Korrekte Datendarstellung
* Korrekte Verlinkung zu den anderen Ansichten

#### Zusatzaufgabe (3 P)

### DONTS (10 P)
DONTS sind Fehler, welche nicht durch das Bewertungsraster abgedeckt werden und sich negativ auf das Projekt auswirken. Für diese Fehler/DONTS werden euch Punkte abgezogen. Ist euer Applikations-Code frei von DONTS erhaltet ihr die vollen 10 Punkte. 

Enthält euer Code ein oder mehrere DONTS, wird je nach Umfang und Auswirkungen des Fehlers entschieden, wieviel Punkte abgezogen werden. Maximal können euch 10 Punkte für sämtliche DONTS abgezogen werden.

Beispiel: In der View befindet sich die Logik-Komponente für das Überprüfen der gesendeten POST-Daten. => - 2 P

## Testbericht
#### Testfälle (5 P)
* Durchführung der Testfälle
* Dokumentation der Testfälle