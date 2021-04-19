# 02 Cross-Site-Scripting \(XSS\)

## Arbeitsauftrag

Erstelle ein Gästebuch mit einer XSS-Sicherheitslücke. Die Sicherheitslücke soll es einem Angreifer möglich machen, alle Besucher auf google.com umzuleiten, die das Gästebuch ansehen möchten.

Nutze als Basis für dein Proof of Concept den Inhalt der `xss.zip` Datei.

{% hint style="info" %}
[https://github.com/IctBerufsbildungZentralschweiz/modul-307/blob/master/Tag%203/03%20Security%20Aufgaben/01%20Gruppenarbeit/xss.zip](https://github.com/IctBerufsbildungZentralschweiz/modul-307/blob/master/Tag%203/03%20Security%20Aufgaben/01%20Gruppenarbeit/xss.zip)
{% endhint %}

## Lösungshilfe

* Versuche herauszufinden, was ein Besucher für eine Nachricht eingeben muss, um alle zukünftigen Besucher des Gästebuchs auf google.com umzuleiten. \(Tipp: JavaScript spielt hierbei eine wichtige Rolle, Stichwort [`document.location.href`](https://www.google.com/search?q=document.location.href+redirect)\)

Wie kannst Du dieses Problem verhindern? Was sind andere «Schäden», die ein Angreifer mit dieser Attacke anrichten kann?

