<?php
$title = 'CSRF demo';
$view  = 'csrf';

session_start();

if (isset($_REQUEST['login'])) {
    $_SESSION['login'] = true;
    header('Location: ?');
    exit;
}

// continue only if user is login
if (empty($_SESSION['login'])) {
    return;
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['login']);
    header('Location: ?');
    exit;
}

if (isset($_REQUEST['dish'])) {
    $sql  = 'INSERT INTO `order` (address, dish) VALUES (?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_REQUEST['address'], $_REQUEST['dish']]);
}

// select all orders, you don't have to prepare statement if there's no user input
$sql = 'SELECT * FROM `order`';

$orders = $pdo->query($sql)->fetchAll();
