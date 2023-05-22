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
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if(isset($_GET['continent'])) {
  $continent = $_GET['continent'];
} else { 
  $continent = 'Asie';
}
$desPays = getCountriesByContinent($continent);
?>
<main role="main" class="flex-shrink-0">
  <div class="container">
  <?php if(isset($_GET['continent'])):
  $continent = $_GET['continent']; ?>
    <h1>Les pays en <?php echo $continent ?></h1>
    <div>
    
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
    <?php else: ?>
      <div class="map" id="map">
        <div class="map__image">
            <?php include_once 'map.php'; ?>
        </div>
      </div>
      <?php endif; ?>
  </div>
</main>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
