# Konzerttickets
Die Firma «Tikitas», ein Händler von Konzerttickets, ist an eure Webagentur herangetreten und möchte die Verkäufs- und Rechnungs-Abläufe vereinfachen. Dazu soll ein Webtool entwickelt werden, mit dem die Ticket-Verkäufe verwaltet werden können. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Ticket-Käufe sollen erfasst werden können.
2. Bestehende Ticket-Käufe sollen übersichtlichen angezeigt werden können.
3. Bestehende Ticket-Käufe sollen mutiert werden können.

## Ticket-Käufe erfassen
Verkäufer sollen die Möglichkeiten haben neue Ticket-Käufe über ein Formular zu erfassen. Dabei werden folgende Informationen benötigt:

| Feld       | zwingend? |
|------------|:---------:|
| Name       |     x     |
| Email      |     x     |
| Telefon    |           |
| Treuebonus |     x     |
| Konzert    |     x     |

Da die eingegebenen Informationen später für Marketing-Zwecke (Newsletter & Telemarketing) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-)(

Eine Liste sämtlicher Konzerte, welche in diesem Jahr stattfinden, wurde bereits erfasst und im Projektordner abgelegt: [Konzertliste](src)

Beim Erfassen des Ticket-Kaufs soll sofort berechnet werden, wann das Ticket bezahlt werden muss (das Kauf-Datum ist immer der aktuelle Tag).  Diese Information soll dem Verkäufer noch vor dem Speichern des Ticket-Kaufs angezeigt werden. So kann der Verkäufer den Kunden gleich über die Zahlungs-Frist informieren. Dabei muss der Treuebonus berücksichtig werden (siehe Details bei Treuebonus).

#### Treuebonus
Je nach Alter, Anzahl gekaufter Tickets und Sympathie erhält der Kunde noch einen Treuebonus. Der Treuebonus bestimmt die Grösse des Rabatts, den der Kunde in Anspruch nehmen kann. Als Gegenleistung muss es jedoch die Rechnung schneller einzahlen, als die normalen 30 Tage: 

| Treuebonus  | Verkürzung der Zahlungsfrist | Effektive Zahlungsfrist |
|-------------|:----------------------------:|:-----------------------:|
| kein Rabatt |               0              |            30           |
| 5 % Rabatt  |              -10             |            20           |
| 10 % Rabatt |              -15             |            15           |
| 15 % Rabatt |              -20             |            10           |

## Verkäufe bearbeiten
Neben der Erfassung von neuen Ticket-Käufen sollen auch bestehende Einträge bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld                   |
|------------------------|
| Name                   |
| Email                  |
| Telefon                |
| Konzert                  |
| Zahlungs-Status         |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

#### Zahlungs-Status
Ein Ticket-Kauf verfügt über zwei Status:

1. Der Ticket-Kauf wurde noch nicht beglichen.
2. Der Ticket-Kauf wurde beglichen.

Ein Ticket-Kauf wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Ausleihen anzeigen
Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Ticket-Käufe, die momentan offen sind (also noch nicht bezahlt). Diese soll so sortiert sein, dass der älteste Ticket-Kauf jeweils zu oberst in der Tabelle ist. Wichtig ist für die Verkläufer auf den ersten Blick zu sehen, wer das Ticket gekauft hat, was für ein Ticket gekauft wurde und bis wann das Ticket gezahlt werden sollte.

Damit optisch besser ersichtlich ist, welche Ticket-Käufe gemäss Datum bezahlt sein sollten, soll hinter jedem Eintrag eines der folgenden beiden Icons platziert werden:

* ⏳ = Ticket-Kauf ist noch nicht bezahlt, aber noch innerhalb der Zahlungs-Frist.
* ⌛ = Ticket-Kauf ist noch nicht bezahlt und nicht mehr in der Zahlungs-Frist.

## Zusätzliche Features
Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Zahlungs-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Einträge auswählen kann, und für alle anschliessend per Knopfdruck den Status ändern kann.