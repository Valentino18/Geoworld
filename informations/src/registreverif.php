<?php
session_start();

include_once('../../inc/connect-db.php');
include_once('./verifincription.php');

$user = valid_donnees($_POST["user"]);
$pass = valid_donnees($_POST["password"]);

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = htmlentities($donnees);
    $donnees = htmlspecialchars($donnees);
return $donnees;
}

if (empty($user)) {
    header('Location: ../registre.php');
} else {
    try {
        global $pdo;
        $stmt = $pdo -> prepare('SELECT user from login WHERE user = :user');
        $stmt -> bindParam(':user', $user);
        $stmt -> execute();
        while ($rowtab = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($user == $rowtab['user']) {
                header('Location: ../registre.php?error=0');
            } 
                echo "test0";       
        }
        $stmt2 = $pdo -> prepare('INSERT INTO  login (user, password) VALUES (:user, :password)');
        $stmt2 -> bindParam(':user', $user);
        $stmt2 -> bindParam(':password', $pass);
        $stmt2 -> execute();
        header('Location: ../registre.php?succes=1');
        exit();
    } catch(PDOException $e){
        header('Location: ../registre.php?error=1');
    }
}
    
?>