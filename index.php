<?php
$title = "crud films";
ob_start();
//connexion a la base de donnée
$user = "root";
$pass = "";
//Essaie de te connecter
try {
    $BD = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //Fonction static de la classe PDO pour debug la connexion en cas d'erreur
    $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Erreur de connexion a PDO MySQL :" . $exception->getMessage());
}

?>


<?php
//requete sql pour affihcer tout les elements de la base de données  
$sql = "SELECT * FROM films";
// je stock la requete dans une variable
$liste = $BD->query($sql);

?>

<h1>liste des films</h1>
<a href="ajouterfilm.php">ajouter un film</a>

<?php
while ($row = $liste->fetch())
{ 
echo  '<p>' . $row['id_film'] . '-' . $row['titre'] . ' ' . $row['duree'] . ' heure ' . $row['datefilm'] . '</p>' . ' <a href="">detail</a> ' . ' <a href="">update</a> '. ' <a href="">delete</a> ';
}
?>

<?php
$content = ob_get_clean();
require "template.php";
?>