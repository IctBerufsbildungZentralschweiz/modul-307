<?php

$database = 'database/guestbook.txt';

// Datenbankfile erstellen, falls nicht vorhanden
if( ! file_exists($database)) {
    touch($database);
}

// Einträge laden
$guestbookEntries = json_decode(file_get_contents($database), true);

// Falls keine Einträge vorhanden ein leeres Array verwenden
if($guestbookEntries === null) {
    $guestbookEntries = [];
}

$errors   = [];
$newEntry = false;

$name     = $_POST['name'] ?? '';
$message  = $_POST['message'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($name === '') {
        $errors[] = 'Bitte gib einen Namen ein.';
    }

    if($message === '') {
        $errors[] = 'Bitte gib eine Nachricht ein.';
    }

    if(count($errors) === 0) {
        
        saveToDatabase($name, $message);
        
        // Bestätigungsnachricht anzeigen
        $newEntry = true;

        // Formularfelder leeren
        $name     = '';
        $message  = '';
    }

}

function saveToDatabase(string $name, string $message)
{
    global $database, $guestbookEntries;

    $newEntry = ['name' => $name, 'message' => $message];

    // Eintrag an Anfang von Array einfügen
    array_unshift($guestbookEntries, $newEntry);

    // Daten in File schreiben
    file_put_contents($database, json_encode($guestbookEntries));
}