<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM country WHERE continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir les continents
 * 
 * @return liste d'objets ayant un attribuet nommé continent
 */
function getContinents()
{
    global $pdo;
    $row = 'SELECT DISTINCT continent FROM country';
    return $pdo->query($row)->fetchAll();
}

/**
 * Obtenir les continents
 * 
 * @return liste d'objets ayant comme résultat $search
 */
function search($search) {
    global $pdo;

    $sql = "SELECT DISTINCT Code, Name, Continent, Region, LocalName, Population FROM country WHERE Code LIKE '%$search%' OR Name LIKE '%$search%' OR Continent LIKE '%$search%' OR Region LIKE '%$search%' OR LocalName LIKE '%$search%'";
    return $pdo->query($sql)->fetchAll();
}

function getInfoCountries($pays)
{
    global $pdo;
    $query = "SELECT * FROM country WHERE Name = '$pays';";
    return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir la liste de tous les utilisateurs
 * 
 * @return liste d'objets ayant comme résultat tous les users
 */
function getAllUsers()
{
    global $pdo;

    $raw = 'SELECT * FROM login';
    return $pdo->query($raw)->fetchAll();
}

/**
 * Ajouté un utilisateur 
 * 
 * @return nothing
 */
function Adduser()
{

    $user = $_POST["user"];
    $pass = $_POST["password"];
    $type = $_POST['Type'];

    global $pdo;

    $query = "INSERT INTO login VALUES(NULL, '$user', '$pass', '$type')";
    $prep = $pdo->prepare($query);
    $prep->execute();
}

/**
 * Supprimer un utilisateur
 * 
 * @send requete qui supprime l'user en question et @return nothing
 */
function deleteUser($id)
{
    global $pdo;
    $query='DELETE FROM login WHERE idlog = :id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id);
    $prep->execute();
}


/**
 * Modifier un utilisateur
 * 
 * Récupère les paramètres et les mets a jours si nécessaire.
 */
function updateUser($info)
{
    global $pdo;
    $user = $info['user'];
    $pass = $info['pass'];
    $Type = $info['Permission'];
    $idlog = $info['idlog'];
    $query = "UPDATE login SET user='$user', password='$pass', Type='$Type' WHERE idlog='$idlog';";
    $prep = $pdo->prepare($query);
    $prep->execute();
}

/**
 * Obtenir les informations d'un user via sont id
 * 
 * @return liste de paramètres d'un objet .
 */
function getInfoUser($id)
{
    global $pdo;
    $iduser = $id;
    $sql ="SELECT * FROM login WHERE idlog = $id;";
    return $pdo->query($sql)->fetchAll();
}