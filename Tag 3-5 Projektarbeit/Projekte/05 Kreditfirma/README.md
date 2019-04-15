# Kreditfirma
Die Kreditfirma «Kredihay» ist an eure Webagentur herangetreten und möchte ihre internen Abläufe zur Verwaltung von Kredit-Raten vereinfachen. Dazu soll ein Raten-Webtool entwickelt werden, mit dem der Kreditverleih verwaltet werden kann. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Kreditverleihe sollen erfasst werden können.
2. Bestehende Kreditverleihe sollen übersichtlichen angezeigt werden können.
3. Bestehende Kreditverleihe sollen mutiert werden können.

## Kreditverleihe erfassen
Angestellte sollen die Möglichkeiten haben neue Verleihe über ein Formular zu erfassen. Dabei werden folgende Informationen benötigt:

| Feld        | zwingend? |
|-------------|:---------:|
| Name        |     x     |
| Email       |     x     |
| Telefon     |           |
| Anzahl Raten |     x     |
| Kredit-Paket  |     x     |

Da die eingegebenen Informationen später für Marketing-Zwecke (Newsletter & Telemarketing) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-)(

Eine Liste sämtlicher Kredit-Pakete, welche in der Kreditfirma angeboten werden, wurde bereits erfasst und im Projektordner abgelegt: [Kredit-Pakete](src)

Beim Erfassen des Kreditverleihs soll sofort berechnet werden, wann der Kredit wieder zurückgezahlt werden muss (das Verleih-Datum ist immer der aktuelle Tag). Diese Information soll dem Mitarbieter noch vor dem Speichern angezeigt werden. So kann der Mitarbeiter den Kunden gleich über das Datum informieren, an dem der komplette Betrag wieder zurück gezahlt wurden muss (falls nicht bereits durch die Ratenzahlung geschehen). Dabei muss die Anzahl Raten für die Rückzahlung berücksichtig werden (siehe Details bei Anzahl Raten).

#### Anzahl Raten
Die Anzahl Raten bestimmt die Anzahl Tage, bis der komplette Kredit wieder zurück bei der Kreditfirma ist. Die Raten müssen jeweils in Abständen von 15 Tagen gezahlt werden. Maximal kann der Kredit mit 10 Raten zurückzahlt werden.

| Anzahl Raten | Gesamte Tage bis zur Rückzahlung |
|--------------|:--------------------------------:|
| 1 Rate       |                +15               |
| 2 Raten      |                +30               |
| 3 Raten      |                +45               |
| x Raten      |               x * 15               |
| 10 Raten     |                150               |

## Kreditverleihe bearbeiten
Neben der Erfassung von neuen Verleihen sollen auch bestehende Einträge bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld                   |
|------------------------|
| Name                   |
| Email                  |
| Telefon                |
| Kredit-Paket           |
| Verleih-Status         |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

#### Verleih-Status
Ein Kreditverleih verfügt über zwei Status:

1. Das Geld ist noch ausgeliehen und wird in Raten zurückbezahlt.
2. Das Geld wurde vollständig zurückbezahlt.

Ein Kreditverleih wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Kreditverleihe anzeigen
Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Verleihe, welche momentan offen sind (also noch nicht vollständig zurück gezahlt). Diese soll so sortiert sein, dass der älteste Verleih jeweils zu oberst in der Tabelle ist. Wichtig ist für die Mitarbeitenden auf den ersten Blick zu sehen, wie der Name des Kunden ist, was für ein Kredit verliehen wurde und bis wann der Kredit vollständig zurück gezahlt werden sollte.

Damit optisch besser ersichtlich ist, welche Kreditverleihe gemäss Datum zurückgezahlt sein sollten, soll hinter jedem Eintrag eines der folgenden beiden Icons platziert werden:

* 🌞 = Geld ist noch ausgeliehen, aber noch innerhalb der Verleih-Frist.
* ⚡ = Geld ist noch ausgeliehen, aber nicht mehr innerhalb der Verleih-First.

## Zusätzliche Features
Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Verleih-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Einträge auswählen kann, und für alle anschliessend per Knopfdruck den Status ändern kann.