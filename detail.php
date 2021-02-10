<?php
$title = "detail films";
ob_start();
// 1 connexion a la base de donnée
$user = "root";
$pass = "";
//Essaie de se connecter
try {
    $BD = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //Fonction static de la classe PDO pour debug la connexion en cas d'erreur
    $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Erreur de connexion a PDO MySQL :" . $exception->getMessage());
}

?>

<h1>Detail film</h1>
<a href="index.php">retour</a>


<?php
// 2 Requètes SQL pour selectionner un element (un film)
$sql = "SELECT * FROM films WHERE id_film = ?";
// 3 Creation d'une requète péparée avec la fonction prepare de PDO qui execute la requète SQL
$requete_insertion = $BD->prepare($sql);
//Passage du ? à la valeur de $_GET['id_film']
$id = $_GET['id_film'];
// 4 je bind (lier) les parametres
$requete_insertion->bindParam(1, $id);
// 5 j'excute la requete 
$requete_insertion->execute();
// 6 j'affiche mon element avec fetch (pour charger les resultats)
$resultat = $requete_insertion->fetch();
// branche vince
if($resultat){
    ?>
<ul>
    <li><?= $resultat['id_film'] ?></li>
    <li><?= $resultat['titre'] ?></li>
    <li><?= $resultat['duree'] ?></li>
    <li><?= $resultat['datefilm'] ?></li>
 </ul>    
 
  <?php
}else{
    echo "<p>Erreur : cet ID n'existe pas</p>";
}
?>

<?php
$content = ob_get_clean();
require "template.php";
?>
