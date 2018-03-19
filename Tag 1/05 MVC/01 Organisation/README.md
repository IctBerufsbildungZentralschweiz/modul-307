# Projekt-Organisation
## Schritt 1: Top-Level-Struktur
Erstelle die Verzeichnisse `app`, `core` und `public`.

### app-Verzeichnis
In diesem Verzeichnis sind sämtliche applikationsspezifischen Dateien zu finden.

Beispiele:
* Models
* Views
* Controllers

### core-Verzeichnis
In diesem Verzeichnis sind sämtliche allgemeinen Dateien zu finden. Sprich sämtliche Dateien, welche für das Projekt genutzt werden, jedoch nicht spezifisch dafür geschrieben wurden.

Beispiele:
* Router
* Helpers
* Datenbank-Verbindung
* Query-Builder

### public-Verzeichnis
In diesem Verzeichnis sind sämtliche öffentlichen Dateien zu finden. Sprich sämtliche Dateien, welche von überall aus zugänglich sein müssen.

Beispiele:
* CSS
* Images
* Javascript

Die aktuelle Ordner Struktur sieht nun so aus:

```php
projekt/
 | app/                 # Neu
 | core/                # Neu
 | public/              # Neu
```
## Schritt 2: Second-Level-Struktur

### app-Verzeichnis
Erstelle nun im app-Verzeichnis für jede der drei MVC-Komponenten ein Ordner: `Moels`, `Views` und `Controllers`

### public-Verzeichnis
Erstelle nun im public-Verzeichnis für die Styles und Bilder je einen separaten Ordner: `css`, `images` und `js`

Die aktuelle Ordner Struktur sieht nun so aus:
```php
projekt/
 | app/
 | app/Models/          # Neu
 | app/Controllers/     # Neu
 | app/Views/           # Neu
 |
 | core/
 |
 | public/
 | public/css/          # Neu
 | public/images/       # Neu
 | public/js/           # Neu
 |
 | index.php
 | index.view.php
 | functions.php
```
