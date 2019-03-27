# Cross-Site-Scripting (XSS)

## Arbeitsauftrag 

Erstelle ein Gästebuch mit einer XSS-Sicherheitslücke. Die Sicherheitslücke soll es einem Angreifer möglich machen, alle Besucher auf google.com umzuleiten, die das Gästebuch ansehen möchten.

Nutze als Basis für dein Proof of Concept den Inhalt der `xss.zip` Datei.

## Lösungshilfe

* Versuche herauszufinden, was ein Besucher für eine Nachricht eingeben muss, um alle zukünftigen Besucher des Gästebuchs auf google.com umzuleiten. (Tipp: JavaScript spielt hierbei eine wichtige Rolle, Stichwort [`document.location.href`](https://www.google.com/search?q=document.location.href+redirect))

Wie kannst Du dieses Problem verhindern? Was sind andere «Schäden», die ein Angreifer mit dieser Attacke anrichten kann?
