<?php
    require_once 'localsettings.php';

    $host = getenv('DB_HOST');
    $db = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASSWORD');
    $charset = getenv('DB_CHARSET');

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
        //echo "<h1 class='text-danger'>No database found</h1>";        
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    // If you want to insert NEW USERS in MySQL DB please uncomment the following lines
    //$user->insertUser('admin','password');
    //$user->insertUser('sysadmin','password');

?>