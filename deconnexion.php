<?php
session_start();
session_unset();
// REDIRIGE SUR LA PAGE PRECEDENTE
header('Location: ' . $_SERVER['HTTP_REFERER']);
// SINON REDIRECTION CLASSIQUE
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: compte.php');
}