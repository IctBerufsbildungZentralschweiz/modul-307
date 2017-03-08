# Reparaturwerkstatt
Die Firma WeBau ist ein mittelständiges Bauunternehmen. Das Unternehmen ist an eure Webagentur herangetreten und möchte die internen Abläufe in der Reparatur-Abteilung vereinfachen. Dazu soll ein Verwaltungs-Tool für interne Reparaturaufträge von Werkzeugen entwickelt werden.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Reparaturaufträge sollen erfasst werden können.
2. Bestehende Reparaturaufträge sollen übersichtlich angezeigt werden können.
3. Bestehende Reparaturaufträge sollen mutiert werden können.

## Ausleihen erfassen
Die Angestellten der anderen Abteilungen sollen die Möglichkeiten haben einen neuen Reparaturauftrag über ein Formular zu erfassen. Dabei werden folgende Informationen benötigt:

| Feld                   | zwingend? |
|------------------------|:---------:|
| Name                   |     x     |
| Email                  |     x     |
| Telefon                |          |
| Dringlichkeit          |     x     |
| Betreffendes Werkzeug  |     x     |

Da die eingegebenen Informationen später für Marketing-Zwecke (Newsletter & Telemarketing) genutzt werden sollen, müssen die Email-Adresse und die Telefonnummer vor dem Speichern in die Datenbank überprüft werden. Es soll sichergestellt werden, dass die Email-Adresse ein @-Zeichen enthält und die Telefonnummer nur aus Nummern, Leerzeichen und folgenden Symbolen besteht: +/-)(

Eine Liste sämtlicher Objekte, welche vom Bauunternehmen genutzt werden und somit kaputt gehen können, wurden bereits erfasst und im Projektordner abgelegt: [Werkzeugliste](src)

Damit die Mitarbeiter wissen, wann sie wieder mit dem Werkzeug rechnen können, soll beim Erfassen des Reparaturaufträges sofort berechnet werden, wann das Werkzeug voraussichtlich wieder zurück ist (das Einsende-Datum des Reparaturauftrages ist immer der aktuelle Tag). Diese Information soll dem Mitarbeiter noch vor dem Speichern des Auftrages angezeigt werden. Dabei muss die Dringlichkeit des Reparatur-Status berücksichtig werden (siehe Details bei Dringlichkeit).

#### Dringlichkeit
Die Dringlichkeit bestimmt die Anzahl Tage bis zur Rückgabe des reparierten Werkzeugs. Desto dringlicher der Reparaturauftrag eingestuft wurde, desto mehr Ressourcen wendet die Reparatur-Abteilung dafür auf, desto schneller als die normalen 15 Tage ist das Werkzeug voraussichtlich repariert:

| Dringlichkeit | Zusätzliche Reparaturtage | Gesamte Reparaturdauer |
|---------------|:-------------------------:|:----------------------:|
| sehr tief     |            + 10           |           25           |
| tief          |            + 5            |           20           |
| normal        |           +/- 0           |           15           |
| hoch          |            - 5            |           10           |
| sehr hoch     |            - 10           |            5           |

## Reparaturauftrag bearbeiten
Neben der Erfassung von neuen Reparaturaufträgen sollen auch bestehende Aufträge durch die Reparatur-Abeilung bearbeitet werden können. Folgende Informationen müssen mutiert werden können:

| Feld                   |
|------------------------|
| Name                   |
| Email                  |
| Telefon                |
| Werkzeug               |
| Status der Reparatur   |

Informationen, welche nicht mutiert werden können, sollen während der Bearbeitung eines Eintrages angezeigt werden. Die Daten dieser Felder sind jedoch nicht mutierbar.

#### Reparatur-Status
Ein Reparaturauftrag verfügt über zwei Status:

1. Der Reparaturauftrag ist noch pendent.
2. Der Reparaturauftrag ist abgeschlossen.

Eine Reparatur wird niemals komplett aus der Datenbank gelöscht. Erledigte Einträge werden nicht mehr angezeigt, die Informationen bleiben aber in der Datenbank bestehen.

## Ausleihen anzeigen
Der Kunde wünscht ebenfalls eine Übersicht sämtlicher Reparaturaufträge, welche momentan pendent sind (also noch nicht abgeschlossen). Diese soll so sortiert sein, dass der dringlichste Reparaturauftrag jeweils zu oberst in der Tabelle ist. Wichtig ist für die Mitarbeitenden der Reparatur-Abteilung auf den ersten Blick zu sehen, wer den Reparaturauftrag erteilt hat, was für ein Werkzeug zur Reparatur übergeben wurde und bis wann die Reparatur voraussichtlich abgeschlossen wurde.

Damit optisch besser ersichtlich ist, welche Reparatur-Fristen gemäss angekündigtem Rückgabgedatum eingehalten wurden, soll hinter jedem Auftrag eines der folgenden beiden Icons platziert werden:

* 👍 = Reparatur ist noch nicht fertig, aber noch in der angekündigten Reparatur-Frist.
* 👎 = Reparatur ist noch nicht fertig und nicht mehr in der angekündigten Reparatur-Frist.

## Zusätzliche Features
Falls noch Zeit vorhanden ist, wünscht sich der Auftraggeber, dass er nicht jedes mal in die Bearbeitungsansicht gehen muss, um einen Reparatur-Status zu ändern. Aus seiner Sicht wäre die optimale Lösung, dass er auf der Übersicht mehere Aufträge auswählen kann, und für alle anschliessend per Knopfdruck den Reparatur-Status ändern kann.
