# JavaScript


> JavaScript (kurz JS) ist eine Skriptsprache, die ursprünglich für dynamisches HTML in Webbrowsern entwickelt wurde, um Benutzerinteraktionen auszuwerten, Inhalte zu verändern, nachzuladen oder zu generieren und so die Möglichkeiten von HTML und CSS zu erweitern. Heute findet JavaScript auch außerhalb von Browsern Anwendung, so etwa auf Servern und in Microcontrollern.
> 
> JavaScript wurde erstmals am 18. September 1995 mit der Vorversion des Navigator 2.0 veröffentlicht (unter dem Namen LiveScript, entwickelt von Brendan Eich).

[Wikipedia](https://de.wikipedia.org/wiki/JavaScript)

JavaScript ist eine Implementierung des ECMAScript-Standards und wird von allen gängigen Webbrowsern unterstützt.

ECMAScript-Implementierungen wie JScript oder die Node.js Plattform ermöglichen die Anwendung von JavaScript auch serverseitig.

Die 6. Version des ECMAScript-Standards (ES6 oder ECMAScript 2015) wurde 2015 verabschiedet. Der Browser-Support für die neuen Funktionen hinkt hier jedoch etwas hinterher. Die 5. Version des Standards (ES5) ist [in allen gängigen Browsern komplett implementiert](https://kangax.github.io/compat-table/es5/). Funktionen [der aktuellen 6. Version (ES6)](https://kangax.github.io/compat-table/es6/) und [der kommenden 7. Version (ES7 oder ECMAScript 2016)](https://kangax.github.io/compat-table/es7/) stehen nur teilweise zur Verfügung.

Über sogenannte «Transpiler» wie [Babel.js](https://babeljs.io/) können diese neuen Funktionen jedoch heute schon verwendet werden. Die neuen Funktionen werden dabei vom Transpiler so umgeschreiben, dass sie der «alten» ECMAScript 5 Syntax entsprechen, die in allen Browsern unterstützt wird.

## JavaScript vs. Java

> **Java** is to **Java**Script as **car** is to **car**pet.
 
«Java hat mit JavaScript genau so viel zu tun, wie ein Auto mit einem Teppich.»

Trotz der Ähnlichkeit des Namens und der Syntax hat JavaScript nichts mit Java zu tun. Es handeln sich um zwei komplett unterschiedliche Sprachen.

## Was ist JavaScript?

JavaScript ist eine Scriptsprache, die clientseitig oder seit einigen Jahren auch serverseitig Anwendung findet.

Wir werden uns in diesem ÜK in erster Linie auf die clienseitige Anwendung fokussieren. 

JavaScript wird im Browser ausgeführt. Dies ermöglicht die Interaktion mit einer Website ohne für alle Änderungen eine neue Version der Seite vom Server anfordern zu müssen. So können zum Beispiel dynamisch Elemente erstellt oder entfernt werden. Eine weitere Anwendungsmöglichkeit ist die Validierung von Formularen, indem die Eingaben validiert werden, bevor das Formular überhaupt abgeschickt wird.

Mit dem AJAX-Konzept wurde zudem die asynchrone Datenübertragung zwischen Client und Server ermöglicht. So kann zum Beispiel von JavaScript eine Anfrage an den Server gesendet werden um Daten zu laden, auf deren Basis dann nur ein Teil der Website verändert wird. So muss für die teilweise Aktualisierung einer Seite nicht die komplette Webpage erneut vom Server heruntergeladen werden.

Mit der Entwicklung von JavaScript-Frameworks wie Angular, React oder Ember wurde das Erstellen von Single-Page-Applications (SPA) populär. Dabei wird nur beim ersten Aufruf einer Webpage die komplette Seite an den Browser gesendet. Alle weiteren Daten werden dann via JavaScript «häppchenweise» vom Server angefordert und meistens clientseitig gerendert. So kann eine komplette Webapplikation in einer einzigen Webpage (Single Page) umgesetzt werden.

## Wie funktioniert JavaScript

JavaScript wird in den meisten Fällen von einer «JavaScript Engine» ausgeführt. Je nach Browser wird eine andere Engine zur Ausführung von JavaScript verwendet. Daher ist es möglich, dass Code, der in Browser A funktioniert, in Browser B Fehler erzeugt.

Die bekanntesten JavaScript Engines sind

* V8 (Google Chrome, node.js)
* Spidermonkey (Firefox)
* JavaScriptCore (Safari)
* Chakra (IE, Edge)

## Interaktion mit dem Document Object Model

Das Document Object Model ist die Schnittstelle, die der Browser für die Interaktion mit dem HTML-Dokument bereitstellt.

Wird HTML-Code an den Browser gesendet, wird dieser Code geparsed. Daraus erstellt der Browser das DOM. Das DOM enthält eine Representation des Dokuments als Baumstruktur.

![](res/dom.png)

Wenn du in deinem Browser die Option «Quelltext anzeigen» auswählst, siehst du den HTML-Code, der vom Server an den Browser gesendet wurde. Öffnest du die Entwicklertools, arbeitest du mit dem DOM. Dein Browser versucht Fehler im HTML-Code automatisch zu beheben. Daher ist es möglich, dass sich der HTML-Code vom letzendlichen DOM unterscheidet!

Ein primärer Anwendungszweck von JavaScript im Browser ist die Manipulation des DOM. Via JavaScript können die einzelnen Attribute eines Objektes im DOM ausgelesen und verändert werden. Das DOM enthält Position, Grösse, CSS-Styles und diverse andere Attribute zu jedem Element.
