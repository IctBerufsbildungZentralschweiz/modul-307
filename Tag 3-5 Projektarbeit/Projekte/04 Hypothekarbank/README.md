# Hypothekarbank
Die Hypothekarbank «HippiBank» ist an eure Webagentur herangetreten und möchte ihre internen Abläufe für den Verleih von Hypotheken vereinfachen. Dazu soll ein Hypotheken-Webtool entwickelt werden, mit dem der Verleih von Hypotheken verwaltet werden kann. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Hypotheken-Verleihe sollen erfasst werden können.
2. Bestehende Hypotheken-Verleihe sollen übersichtlichen angezeigt werden können.
3. Bestehende Hypotheken-Verleihen sollen mutiert werden können.

## Verleihe erfassen
Berater sollen die Möglichkeiten haben neue Verleihe über ein Formular zu erfassen. Dabei werden folgende Informationen benötigt:

| Feld        | zwingend? |
|-------------|:---------:|
| Name        |     x     |
| Email       |     x     |
| Telefon     |           |
| Risikostufe |     x     |
| Hypo-Paket  |     x     |

Da die eingegebenen Informationen später für Marketing-Zwecke (Newsletter & Telemarketing) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-)(

Eine Liste sämtlicher Hypo-Pakete der Bank wurde bereits erfasst und im Projektordner abgelegt: [Hypo-Pakete](src)

Beim Erfassen des Hypotheken-Verleihs soll sofort berechnet werden, wann die Hypothek wieder zurück gezahlt werden muss (das Verleih-Datum ist immer der aktuelle Tag). Diese Information soll dem Berater noch vor dem Speichern angezeigt werden. So kann der Berater den Kunden gleich über das Rückzahlungs-Datum informieren. Dabei muss die Risikostufe des Kunden berücksichtig werden (siehe Details bei Risikostufe).

#### Risikostufe
Die Risikostufe bestimmt die Anzahl Zusatz-Tage, an denen die Hypothek zusätzlich oder abzüglich den normalen 480 Verleih-Tagen verliehen werden darf ‒ also in welchem Zeitraum der Kunde die Hypothek zurückzahlen muss: 

| Risikostufe | Änderung Verleihtage | Gesamte Verleihdauer |
|-------------|:---------------------:|:--------------------:|
| sehr tief   |         + 360         |          840         |
| tief        |         + 180         |          660         |
| normal      |         +/- 0         |          480         |
| hoch        |         - 120         |          360         |
| sehr hoch   |         - 240         |          240         |

## Verleihen bearbeiten
Neben der Erfassung von neuen Verleihen sollen auch bestehende Einträge bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld                   |
|------------------------|
| Name                   |
| Email                  |
| Telefon                |
| Hypo-Paket             |
| Rückzahlungs-Status     |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

#### Verleih-Status
Ein Hypothekar-Verleih verfügt über zwei Status:

1. Die Hypothek wurde ist noch nicht zurückgezahlt.
2. Die Hypothek wurde zurückgezahlt.

Ein Verleih wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Hypo-Verleihe anzeigen
Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Verleihe, welche momentan offen sind (also noch nicht zurückgezahlt). Diese soll so sortiert sein, dass der älteste Verleih jeweils zu oberst in der Tabelle ist. Wichtig ist für die Berater auf den ersten Blick zu sehen, wer die Hypothek entgegengenommen hat, was für ein Paket verliehen wurde und bis wann die Hypothek zurückgezahlt werden sollte.

Damit optisch besser ersichtlich ist, welche Verleihe gemäss Datum zurück sein sollten, soll hinter jedem Eintrag eines der folgenden beiden Icons platziert werden:

* 💸 = Hypothek ist noch verliehen, aber noch innerhalb der Verleih-Frist.
* 🚨 = Hypothek ist noch verliehen und nicht mehr in der Verleih-Frist.

## Zusätzliche Features
Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Verleih-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Einträge auswählen kann, und für alle anschliessend per Knopfdruck den Verleih-Status ändern kann.