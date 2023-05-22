<?php
 /**
 * Search Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

global $pdo;

require_once ('./inc/manager-db.php');
require_once 'header.php'; 

if($_SESSION['Type'] == "Administrateur" ||  $_SESSION['Type'] == "Enseignant"):

if(isset($_POST['Add'])) {
    Adduser();
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  deleteUser($id);
}

if(isset($_POST['Update'])){
  $info = $_POST;
  print_r($info);
  updateUser($info);
}

$Listuser = getAllUsers();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/tableaudebord.css" rel="stylesheet">
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Tableau de Bord</title>
</head>
<body>
      <ul>
          <div id="tableutil" class="container">
              <h1>Tableau de tous les logins :</h1><br>
              <table border="1" width="100%">
    <th>Id</th>
    <th>User</th>
    <th>Password</th>
    <th>Permissions</th>
    <th>Modifier</th> 
    <th>Supprimer</th> 

<?php foreach ($Listuser as $User):  ?> 

    <tr> 
	
        <td><?php echo $User->idlog ?></td> 
        <td><?php echo $User->user ?></td> 
        <td><input type="password" value=" <?php echo $User->password ?> " /> </td>
        <td><?php echo $User->Type ?></td>
        <td><a href="edit-user.php?edit=<?php echo $User->idlog; ?>">Modifier</a></td> 
        <td><a href="./panel.php?delete=<?php echo $User->idlog ?>" onClick="return(confirm('Etes-vous sur de vouloir supprimer <?php echo $User->user ?> ?'));">Supprimer</a></td> 
   
    </tr>
<?php endforeach ; ?>
</table>
<br> <br> <br>
<button class="btn btn-warning"  data-toggle="modal" data-target="#Modal1"> Ajouté un Utilisateur.</button>
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <p class="text-muted modal-title"> Please enter your login and password for registre !</p> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="./panel.php" method="POST" >
      <input type="text" name="user" placeholder="Username" required pattern="^[A-Za-z0-9-_ '-]+$" maxlenght="15"> <input type="password" name="password" placeholder="Password" required pattern="^\b(?!<).*$(?!>)\b"> 
      <br>
      <select id='Type' name='Type'> 
                <option value='Administrateur'>Administrateur</option>
                <option value='Enseignant'>Enseignant</option> 
                <option value='Elève'>Elève</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="Add" value="Add" />
      </div>
      </form>
    </div>
  </div>
</div>


          </div>
      </ul>
</body>
<?php 
require_once 'javascripts.php';
require_once "footer.php"; 
else: 
  header('Location: index.php');
endif;
?>
</html>