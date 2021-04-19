# 02-Client-Server-Infrastruktur

## Client und Server

> Ein **Server** ist ein Programm, das mit einem anderen Programm kommuniziert, dem Client. Dabei verschafft der Server dem Client Zugang zu einem Dienst. Hierbei muss abgrenzend beachtet werden, dass es sich bei «Server» um eine Rolle handelt, nicht um einen Computer an sich. Ein Computer kann dementsprechend ein Server und Client zugleich sein.
>
> Ein **Client** kann einen Dienst bei einem Server anfordern, welcher diesen Dienst bereitstellt.

## Kommunikationsprotokoll HTTP

> Hyper Text Transfer Protocol \(HTTP\) ist ein Protokoll für den Transfer von Daten, in unserem Fall Websites \(wie die Website, welche du gerade betrachtest\). Ein Protokoll ist nichts anders als ein Standard etwas zu tun.
>
> Angenommen du trifft den Präsident der Vereinigten Staaten oder die Queen von England. In diesen beiden Fällen gibt es bestimmte Prozeduren, welchen du befolgen musst. Du kannst nicht einfach zu dieser Person hinlaufen und sagen «Hey Alter!» oder «Was geht ab, Brudi!». Es gibt bestimmte Vorschriften beim Gehen, beim Sprechen, bei der Begrüssung und auch bei der Verabschiedung.

## Aufbau einer URL

```text
http://www.website.com/suchen.html?q=Suchbegriff&page=1#treffer-5
```

| Teil | Bezeichnung | Bedeutung |
| :--- | :--- | :--- |
| http:// | Protokoll | Sagt dem Browser, welches Protokoll er zum Aufruf der URL verwenden soll. Andere Protokolle sind z. B. HTTPS oder FTP. |
| www.website.com | Domainname | Sagt dem Browser, zu welchem Server er die Verbindung aufbauen soll. Der Domainname wird via DNS in eine IP-Adresse umgewandelt. |
| /suchen.html | Dateipfad | Sagt dem Browser, welche Datei er ab dem Server aufrufen soll. |
| ?q=Suchbegriff&page=1 | Query-String/Parameter | Parameter, die der Datei übergeben werden. Beginnend mit `?` werden sie jeweils als `schlüssel=wert`-Paare getrennt von `&` der URL angefügt. |
| \#treffer-5 | Anker | Verweist auf eine bestimmte Stelle innerhalb des Dokuments. Diese Stelle kann z. B. mit einem `id="treffer-5"` Attribut in HTML definiert werden. |

## Aufbau eines HTTP-Requests

```text
POST /pfad/zu/script.php HTTP/1.0
User-Agent: Chrome/31.0
Content-Type: application/x-www-form-urlencoded
Content-Length: 32

suchbegriff=test&encoding=utf8
```

Ein HTTP-Request besteht aus einem Header und einem Body. Im Header werden Informationen wie die HTTP-Methode \(`POST`\) oder die zu ladende Datei definiert. Es können auch weitere Details zum Inhalt des Requests angegeben werden \(beispielsweise ein `Content-Type`\).

Im Body eines HTTP-Requests können Daten an den Server mitgesendet werden. Die Daten werden hier im gleichen `Query-String`-Format übergeben, wie man sie auch direkt in der URL übergeben kann.

### Basis Beispiel: Aufruf einer Website

1. Der **Benutzer** öffnet seinen Browser \(den Client\).
2. Der **Benutzer**  öffnet die Website `http://google.ch/`.
3. Der **Client** \(auf Befehl des Benutzers\), sendet eine Anfrage zum **Server** `http://google.ch/` für die Website.
4. Der **Server** erkennt die Anfrage und antwortet dem **Client** mit den Meta-Daten, gefolgt vom Sourcecode der Website.
5. Der **Client** empfängt den Sourcecode der Website und übersetzt diesen in eine für den **Benutzer** lesbare Website.
6. Der **Benutzer** tippt das Suchwort `ICT Berufsbildung` in das Suchfeld und drückt Enter.
7. Der **Client** übermittelt die Daten \(das Suchwort\) zum **Server**.
8. Der **Server** verarbeitet diese Daten und sendet die Resultate am **Client** zurück.
9. Wieder übersetzt der **Client** den erhaltenen Sourcecode vom **Server** zu einer für den **Benutzer** lesbaren Website.

### Erweiterter Ablauf mit HTML, JavaScript und PHP

Wie bereits erwähnt besteht ein Aufruf immer aus einem **Server** und einem **Client**

![Szene 1](../.gitbook/assets/01.jpg)

Der **Server** und der **Client** kommunizieren mit dem HTTP Protokoll untereinander. Damit ist es für den **Client** möglich Anfragen an den **Server** zu senden und die Antwort darauf zu erhalten.

![Szene 2](../.gitbook/assets/02.jpg)

Der **Client** und **Server** müssen keine getrennten Harware-Systeme sein, sondern können auf dem gleichen Rechner installiert werden. Dabei besteht der **Client** aus dem Browser und der **Server** aus einem Webserver.

![Szene 3](../.gitbook/assets/03.jpg)

Der **Client** schickt einen HTTP-Request `http://google.ch` \[1\].

![Szene 4](../.gitbook/assets/04.jpg)

Der **Server** empfängt den Request und stellt darauf die Daten bereit, sprich den Sourcecode \[2\]. Diese Daten schickt er anschliessend dem **Client** zurück \[3\].

![Szene 5](../.gitbook/assets/05.jpg)

Der **Client** empfängt die HTTP-Response des Servers und wandelt den Sourcecode in eine für den Menschen lesbare Form um: Die Website \[4\].

![Szene 6](../.gitbook/assets/06.jpg)

Bestimmte Code-Schnippsel müssen aber nicht einfach nur abgerufen und angezeigt werden, sonder ebenfalls noch interpretiert. Serverseitig hält deshalb ein PHP-Interpretator Ausschau nach PHP-Code, um diesen auszuführen.

![Szene 7](../.gitbook/assets/07.jpg)

Das gleiche passiert nach der Übertragung zum **Client** durch den JavaScript-Interpretator.

![Szene 8](../.gitbook/assets/08.jpg)

Die umhergereichten Daten können beispielsweise im Browser in den Developer Tools \(F12\) unter "Network" betrachtet werden.

