<?php /**
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

require_once ('./inc/manager-db.php');
require_once 'header.php'; 

if(isset($_GET['search'])):
      $search = $_GET['search'];   
      $getSearch = search($search); 
?>
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1>Page de Recherche</h1>
    <div>
     <table class="table">
         <tr>
           <th>Code</th>
           <th>Name</th>
           <th>Continent</th>
           <th>Region</th>
           <th>LocalName</th>
           <th>Population</th>
         </tr>
         <?php foreach ($getSearch as $recherche): ?>
        <tr>
        <td> <?php echo $recherche->Code ?></td>
            <td> <?php echo $recherche->Name ?></td>
            <td> <?php echo $recherche->Continent?></td>
            <td> <?php echo $recherche->Region ?></td>
            <td> <?php echo $recherche->LocalName?></td>
            <td> <?php echo $recherche->Population?></td>
        </tr>
      <?php endforeach; ?>
     </table>
    </div> 
  </div>
</main>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
else: 
      header('Location: index.php');
endif;
?>