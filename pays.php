<?php
/**
 * Home Page
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
<head>
	<meta charset="utf-8">
	<title>Geoworld</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>	
</head>


<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';

$pays=$_GET['Pays'];?>

<center>
    <h1> <?php echo "$pays"; ?></h1><br>
</center>

<?php $desPays = getInfoCountries($pays);?>

<div class="container">
<table class="table">
         <tr>
           <th>Nom</th>
           <th>Region</th>
           <th>Population</th>
         </tr>
         <?php foreach ($desPays as $pays): ?>
        <tr>
            <td> <?php echo $pays->Name ?></td>
            <td> <?php  echo $pays->Region ?></td>
            <td> <?php  echo $pays->Population ?></td>
        </tr>
      <?php endforeach; ?>
     </table>
</div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>