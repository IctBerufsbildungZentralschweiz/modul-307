# SQL-Injections

## Arbeitsauftrag 

Erstelle ein Login-Formular mit einer SQL-Injection Sicherheitslücke. Ein Angreifer soll die Möglichkeit haben, sich ohne Passwort als `admin` anmelden zu können.

Nutze als Basis für dein Proof of Concept den Inhalt der `sql.zip` Datei.

## Lösungshilfe

* Erstelle eine Datenbank mit einer `users` Tabelle. Die Tabelle benötigt nur die Spalten `id`, `username` und `password`.
* Erstelle in der Datenbank einen Benutzer `admin` mit Passwort `password`.

Finde heraus, was ein Angreifer in euer Formular eingeben müsste, um sich ohne korrektes Passwort als Admin anmelden zu können. Wie kannst du das Problem verhindern? Kriegst du es hin, dass sogar die komplette `users` Tabelle gelöscht werden kann?

Du findest den für das Login zuständige Code in der Datei `LoginController.php`.


