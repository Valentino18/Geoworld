<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?>
<?php 
session_start();

if(empty($_SESSION['user'])) {
  header ('location: ./informations/login.php');
}

if(isset($_GET['deconnexion'])) {
  session_unset ();
  session_destroy ();
  header ('location: index.php'); 
}

if(isset($_GET['search'])) {
  $search = $_GET['search'];
  search($search);
}
?>
<!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
<link href="css/custom.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<?php
require_once ('./inc/manager-db.php');
// require_once ('./informations/src/loginverif.php');
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continent</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php foreach(getContinents() as $continent): ?>
            <a class="dropdown-item" href="index.php?continent=<?php echo $continent->continent; ?>"><?php echo $continent->continent; ?></a> 
          <?php endforeach ?>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link size-text">Welcome <?php echo $_SESSION['user']," (", $_SESSION['Type'], " )"; ?> </a>
        </li>
        <li class="nav-item">
          <?php if($_SESSION['Type'] == "Administrateur" ||  $_SESSION['Type'] == "Enseignant"): ?>
            <a class="nav-link size-text" href="./panel.php"> Panel </a>
          <?php endif; ?>
          </li>
        <li class="nav-item">
          <a class="nav-link size-text" href="./index.php?deconnexion=1"> Deconnexion </a>
        </li>
      <?php else: ?>
      <li class="nav-item">
          <a class="nav-link" href="informations/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="informations/registre.php">Registre</a>
        </li>
      <?php endif; ?>
        <!--   
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li>
        -->
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search.php?search=<?php echo $_GET['search']; ?>" method="GET">>
        <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
