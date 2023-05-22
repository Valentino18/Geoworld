<?php

function verif_get() {
    if(isset($_GET['error'])) {
        $err = $_GET['error'];
        if($err==0) {
            if (session_start() == 1) {
                session_destroy();
            }
            echo "<center> <p style='color:red'>User Or/& MDP incorrect</p> </center>";
        }
        if($err==1) {
            if (session_start() == 1) {
                session_destroy();
            }
            echo "<center> <p style='color:red'>User Vide</p> </center>";
        }
    }
    if(isset($_GET['succes'])) {
        $succes = $_GET['succes'];
        if($succes==1) {
            echo "<center> <p style='color:green'>Connecté.. Redirection en cours</p> </center>";
            echo "
            <script language='javascript'> 
            setTimeout(function(){ window.location.href = '../index.php'}, 1000);
            </script>
            ";
        }
        if($succes==2) {
            echo "<center> <p style='color:green'>Inscription Effectué // Reconnexion Requis SVP</p> </center>";
        }
    }
    if(isset($_GET['logout'])) {
        if (session_start() == 1) {
            session_destroy();
        }
        $logout = $_GET['logout'];
        if($logout == 1)
            echo "<center> <p style='color:green'>Vos été maintenant déconnecté</p> </center>";
    }
}

?>