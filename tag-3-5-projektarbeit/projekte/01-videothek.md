# Videothek

Die Videothek «Vidicted» ist an eure Webagentur herangetreten und möchte ihre internen Abläufe vereinfachen. Dazu soll ein Ausleih-Webtool entwickelt werden, mit dem der Video-Ausleih verwaltet werden kann. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Ausleihen sollen erfasst werden können.
2. Bestehende Ausleihen sollen übersichtlichen angezeigt werden können.
3. Bestehende Ausleihen sollen mutiert werden können.

## Ausleihen erfassen

Angestellte sollen die Möglichkeiten haben neue Ausleihen über ein Formular zu erfassen. Dabei werden folgende Informationen benötigt:

| Feld | zwingend? |
| :--- | :---: |
| Name | x |
| Email | x |
| Telefon |  |
| Mitgliedschafts-Status | x |
| Ausgeleihtes Video | x |

Da die eingegebenen Informationen später für Marketing-Zwecke \(Newsletter & Telemarketing\) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-\)\(

Eine Liste sämtlicher Videos, welche in der Videothek vorhanden sind wurde bereits erfasst und im Projektordner abgelegt: [Videoliste](https://github.com/IctBerufsbildungZentralschweiz/modul-307/tree/a7ffb3b379a75c7c306b125e512297895b0f829d/Tag%203-5%20Projektarbeit/Projekte/01%20Videothek/src/README.md)

Beim Erfassen des Video-Ausleihs soll sofort berechnet werden, wann das Video wieder zurück gebracht werden muss \(das Ausleih-Datum ist immer der aktuelle Tag\). Diese Information soll dem Verkäufer noch vor dem Speichern angezeigt werden. So kann der Verkäufer den Kunden gleich über das Rückgabe-Datum informieren. Dabei muss der Mitgliedschafts-Status im Vidicted-Club berücksichtig werden \(siehe Details bei Mitgliedschaftsstatus\).

### Mitgliederstatus

Der Mitgliedschafts-Status bestimmt die Anzahl Zusatz-Tage, an denen das Video zusätzlich zu den normalen 30 Ausleih-Tagen für Nichtmitglieder, ausgeliehen werden darf:

| Mitgliedschaft | Zusätzliche Ausleihtage | Gesamte Ausleihtage |
| :--- | :---: | :---: |
| keine | +0 | 30 |
| Bronze | +10 | 40 |
| Silber | +20 | 50 |
| Gold | +40 | 70 |

## Ausleihen bearbeiten

Neben der Erfassung von neuen Ausleihen sollen auch bestehende Einträge bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld |
| :--- |
| Name |
| Email |
| Telefon |
| Video |
| Ausleih-Status |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

### Ausleih-Status

Ein Video-Ausleih verfügt über zwei Status:

1. Das Video ist ausgeliehen.
2. Das Video wurde zurückgebracht.

Ein Ausleihe wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Ausleihen anzeigen

Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Ausleihen, welche momentan offen sind \(also noch nicht zurückgebracht\). Diese soll so sortiert sein, dass die älteste Ausleihe jeweils zu oberst in der Tabelle ist. Wichtig ist für die Mitarbeitenden auf den ersten Blick zu sehen, wer das Video ausgeliehen hat, was für ein Video ausgeliehen wurde und bis wann das Video zurück gebracht werden sollte.

Damit optisch besser ersichtlich ist, welche Ausleihen gemäss Datum zurück sein sollten, soll hinter jedem Eintrag eines der folgenden beiden Icons platziert werden:

* 😁 = Video ist noch ausgeliehen, aber noch innerhalb der Ausleih-Frist.
* 😠 = Video ist noch ausgeliehen und nicht mehr in der Ausleih-Frist.

## Zusätzliche Features

Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Ausleih-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Einträge auswählen kann, und für alle anschliessend per Knopfdruck den Ausleih-Status ändern kann.

