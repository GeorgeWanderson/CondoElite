<?php
session_start();


function login($username, $password) {
    global $pdo;
    

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['username'] = $usuario['username'];
        return true;
    }
    
    return false;
}


function isAuthenticated() {
    return isset($_SESSION['user_id']);
}


function checkAuthentication() {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit();
    }
}


function logout() {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}


function getAuthenticatedUserId() {
    return $_SESSION['user_id'] ?? null;
}


function getAuthenticatedUsername() {
    return $_SESSION['username'] ?? null;
}
