<?php
/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 *
 * @return PDO
 */
function connectToDatabase()
{
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=tasklist', 'root', '');
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}