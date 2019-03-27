<?php
setcookie('SessionID', 'xIXslkdxals983zv', time() + 60 * 60);

$view = $_GET['page'] ?? 'home.php';

if($view === 'guestbook.php') {
    include 'controller/guestbook.php';
}

include 'templates/app.php';