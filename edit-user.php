<!DOCTYPE html>
<html lang="fr">
<?php
/**
 * Users edition page
 *S
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

?>

<?php
require_once('header.php');
require_once('inc/manager-db.php');


if (isset($_GET['edit'])){
  $idUser = $_GET['edit'];
  $user = getInfoUser($idUser);
  }
  
else{
    header('location: panel.php');
}

foreach ($user as $rez):
?>
<form method="post" action="panel.php">
     	ID Utilisateur : <input readonly="readonly" type="text" id="idlog" name="idlog" value="<?php echo $rez->idlog?>"><br>
       User :   <input type="text"  name="user"    value="<?php echo $rez->user?>"><br>
      MDP :   <input type="password"  name="pass"    value="<?php echo $rez->password?>"><br>
		Permission :  <input type="radio" name="Permission"  value="Elève" <?php if($rez->Type=='Elève'){echo'checked';}?>>Elève <br>
		        <input type="radio" name="Permission"   value="Enseignant" <?php if($rez->Type=='Enseignant'){echo'checked';}?>> Enseignant<br>   
            <?php if($_SESSION['Type'] == "Administrateur"): ?>
            <input type="radio" name="Permission"   value="Administrateur" <?php if($rez->Type=='Administrateur'){echo'checked';}?>> Administrateur<br>   
            <?php endif; ?>
            <input type="submit" class="btn btn-primary" name="Update" value="Update">
            </form>
<?php 
endforeach;
?>