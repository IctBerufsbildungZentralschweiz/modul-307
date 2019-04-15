# Früchte-Dörrung
Die Firma «FruttiTutti» hat sich auf die Herstellung von Dörrfrüchten für Drittfirmen spezialisiert. Die Firma ist an eure Webagentur herangetreten und möchte die Verwaltung des Früchte-Dörrprozess vereinfachen. Dazu soll ein Verwaltungs-Webtool entwickelt werden, mit dem Früchte-Dörrungen für Drittanbieter verwaltet werden können. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Dörr-Aufträge sollen erfasst werden können.
2. Bestehende Dörr-Aufträge sollen übersichtlich angezeigt werden können.
3. Bestehende Dörr-Aufträge sollen mutiert werden können.

## Dörr-Aufträge erfassen
Der Verkauf soll die Möglichkeit haben neue Dörr-Aufträge über ein Formular zu erfassen, diese werden anschliessend von der Produktion ausgeführt. Dabei werden folgende Informationen benötigt:

| Feld                   | zwingend? |
|------------------------|:---------:|
| Name                   |     x     |
| Email                  |     x     |
| Telefon                |          |
| Mengen-Kategorie       |     x     |
| Frucht                   |     x     |

Da die eingegebenen Informationen später für Marketing-Zwecke (Newsletter & Telemarketing) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-)(

Eine Liste sämtlicher Früchte, welche durch die Trocknerei verarbeitet werden, wurde bereits erfasst und im Projektordner abgelegt: [Früchte](src)

Beim Erfassen des Dörr-Auftrages soll sofort berechnet werden, wann die Dörrung voraussichtlich fertig ist (das Start-Datum ist immer der aktuelle Tag). Diese Information soll dem Verkäufer noch vor dem Speichern angezeigt werden. So kann der Verkäufer den Kunden gleich über das Datum der Fertigstellung informieren. Dabei muss die Mengen-Kategorie berücksichtig werden (siehe Details bei Mengen-Kategorie).

#### Mengen-Kategorie
Die Menge der verarbeiteten Früchte bestimmt die Anzahl Zusatz-Tage, an denen die Früchte gedörrt werden müssen.

| Mengen-Kategorie | Zusätzliche Dörr-Tage | Gesamte Dörr-Tage |
|----------------|:-----------------------:|:-------------------:|
| 0-5 kg          |            +0           |          5        |
| 5-10 kg          |           +3           |          8        |
| 10-15 kg         |           +7          |          12         |
| 15-20 kg         |           +13          |          18         |

## Aufträge bearbeiten
Neben der Erfassung von neuen Dörr-Aufträgen sollen auch bestehende Aufträge bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld                   |
|------------------------|
| Name                   |
| Email                  |
| Telefon                |
| Frucht                  |
| Dörr-Status         |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

#### Dörr-Status
Ein Dörr-Auftrag verfügt über zwei Status:

1. Die Früchte sind noch in der Dörrung.
2. Die Früchte wurden fertig gedörrt.

Ein Dörr-Auftrag wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Dörr-Aufträge anzeigen
Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Dörr-Aufträge, welche momentan verarbeitet werden (also noch nicht fertig sind). Diese soll so sortiert sein, dass die älteste Dörrung jeweils zu oberst in der Tabelle ist. Wichtig ist für die Mitarbeitenden auf den ersten Blick zu sehen, wer die Dörrung in Auftrag gegeben hat, was für ein Frucht gedörrt wird und bis wann die Dörrung fertig sein sollte.

Damit optisch besser ersichtlich ist, welcher Auftrag gemäss Datum fertig sein sollte, soll hinter jedem Eintrag eines der folgenden beiden Icons platziert werden:

* 🍎 = Frucht ist noch in der Dörrung, aber noch innerhalb der Frist.
* 🥔 = Frucht ist noch in der Dörrung nicht mehr in der Frist.

## Zusätzliche Features
Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Dörr-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Einträge auswählen kann, und für alle anschliessend per Knopfdruck den Status ändern kann.