<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/customEtudiant.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
</head>
<?php
include_once('./src/verifincription.php');
?>
<body>
    <div class="box">
    <form action="./src/registreverif.php" method="POST" >
        <h1>Registre </h1>
        <p class="text-muted"> Please enter your login and password for registre !</p> <input type="text" name="user" placeholder="Username" required pattern="^[A-Za-z0-9-_ '-]+$" maxlenght="15"> <input type="password" name="password" placeholder="Password" required pattern="^\b(?!<).*$(?!>)\b"> <input type="submit" name="" value="Inscription">
        <a href="./login.php"> <p class="text-muted"> Already Have a Log </p> </a>
        <?php
            verif_get();
        ?>
            <div class="github">
                <ul class="social-network social-circle">
                    <li><a href="https://github.com/Enzo2911" class="icoGithub" title="Github"><i class="fab fa-github"></i></a></li>
                </ul>
            </div>
        </form>
</div>
</body>
</html>