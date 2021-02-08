<?php
$title = "ajouter un film";
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

<h1>Ajouter un film ici</h1>

<form action="enregistrerfilm.php" method="POST">
    <label for="titre">titre du film</label>
    <input type="text" name="titre">

    <label for="duree">durée</label>
    <input type="number" name="duree">

    <label for="datefilm">date du film</label>
    <input type="date" name="datefilm">

    <button type="submit">Enregistrer le film</button>
</form>

<?php
$content = ob_get_clean();
require "template.php";
?>