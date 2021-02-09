<?php
$title = "crud films";
//ob_start pour appeler mon template
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
// 1 requete sql pour affihcer tout les elements de la base de données  
$sql = "SELECT * FROM films";
// 2 je stock la requete dans une variable
$liste = $BD->query($sql);

?>

<h1>liste des films</h1>
<a href="ajouterfilm.php">ajouter un film</a>

<?php
// 3 je fais une boucle while ou foreach pour lister les elements de la table

while ($row = $liste->fetch())
{ 

 ?>
 <ul>
    <li><?=$row['id_film']?></li>
    <li><?=$row['titre']?></li>
    <li><?=$row['duree']?></li>
    <li><?=$row['datefilm']?></li>
 </ul>
 
<a href="detail.php?id_film=<?=$row['id_film']?> " >detail</a>
<a href="updatefilm.php?id_film=<?=$row['id_film']?> ">update</a>
<a href="delete.php?id_film=<?=$row['id_film']?> " >delete</a> 
<?php
}
?>

<?php
$content = ob_get_clean();
require "template.php";
?>