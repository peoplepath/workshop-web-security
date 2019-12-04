<?php
$title = 'CSRF demo [FIXED]';
$view  = 'csrf-fixed';

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
    if (($_SESSION['csrf'] ?? 'undef')
        != ($_REQUEST['csrf'] ?? null)) {
        http_response_code(403);
        exit;
    }

    $sql  = 'INSERT INTO `order` (address, dish) VALUES (?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_REQUEST['address'], $_REQUEST['dish']]);
}

// save random token into a the session, it will be verified in the following request
$_SESSION['csrf'] = $csrf = bin2hex(random_bytes(16));

// select all orders, you don't have to prepare statement if there's no user input
$sql = 'SELECT * FROM `order`';

$orders = $pdo->query($sql)->fetchAll();
