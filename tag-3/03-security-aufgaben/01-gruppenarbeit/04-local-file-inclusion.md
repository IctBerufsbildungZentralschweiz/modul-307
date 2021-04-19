# 04 Local File Inclusion

## Arbeitsauftrag

Erstelle eine Website, auf der via Local File Inclusion deine MySQL-Zugangsdaten ausgelesen werden können.

## Lösungshilfe

* Erstelle eine einfache Website, die über den GET-Parameter `content` dynamisch Inhalte anzeigt. Bsp: `index.php?content=home`, `index.php?content=contact`

```php
<h2>Seite</h2>
<?php include($_GET['content']); ?>
```

* Die Inhaltsdateien mit den Texten sollen in einem Ordner `contents` abgelegt werden. Es existiert also folgende Verzeichnisstruktur:

```text
/ 
|-- contents/
|-- contents/home.txt
|-- contents/contact.txt
|-- index.php
```

Erstelle nun einen Ordner `geheim` und speichere deine MySQL-Zugangsdaten in die Datei `mysql.txt` ab.

```text
/ 
|-- geheim/
|-- geheim/mysql.txt
|-- contents/
|-- contents/home.txt
|-- contents/contact.txt
|-- index.php
```

Wie kann ein Angreifer nun an deine Zugangsdaten gelangen \(ohne sie direkt im Browser aufzurufen\)? Wie kannst du dieses Problem verhindern? Was kannst du über diese Lücke sonst noch anstellen? Welche Dateien auf deinem Computer müssen immer geheim bleiben?

