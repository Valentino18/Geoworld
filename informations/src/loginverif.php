<?php
session_start();

include_once('../../inc/connect-db.php');
include_once('./verif.php');

$user = valid_donnees($_POST["user"]);
$pass = valid_donnees($_POST["password"]);

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = htmlentities($donnees);
    $donnees = htmlspecialchars($donnees);
return $donnees;
}

if (empty($user)) {
    header('Location: ../login.php');
} else {
    try {
        global $pdo;
        $stmt = $pdo -> prepare('SELECT user, password, Type FROM login WHERE user = :user');
        $stmt -> bindParam(':user', $user);
        $stmt -> execute();
        while ($rowtab = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($pass == $rowtab['password']) {
                $_SESSION['user']=$user;
                $_SESSION['Type']=$rowtab['Type'];
                    header('Location: ../login.php?succes=1');
                    exit();
            }
        }
        if(empty($_POST['user'])) {
            header('Location: ../login.php');
        } else {
            header('Location: ../login.php?error=0');
        }         
    } catch(PDOException $e){
        header('Location: ../login.php?error=1');
    }
}
    
?>