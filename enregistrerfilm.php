<?php
$title = "enregistrer un films";
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

// 1 verification si le champ existe et qu'il n'est pas vide avec la methode POST

if(isset($_POST['titre']) && !empty($_POST['titre'])){
    $titre = ($_POST['titre']);

}else{
    echo "<p> Merci de bien remplir le champ</p>";
}

if(isset($_POST['duree']) && !empty($_POST['duree'])){
    $titre = ($_POST['duree']);

}else{
    echo "<p> Merci de bien remplir le champ</p>";
}

if(isset($_POST['datefilm']) && !empty($_POST['datefilm'])){
    $titre = ($_POST['datefilm']);

}else{
    echo "<p> Merci de bien remplir le champ</p>";
}

// 2 j'écris la reqète SQL insert into pour rajouter un film que je mets dans une variable ($sql)

$sql = "INSERT INTO FILMS (titre, duree, datefilm) VALUES (?,?,?)";

// 3 Creation d'une requète péparée avec la fonction prepare de PDO qui execute la requète SQL

$requete_insertion = $BD->prepare($sql);

// 4 puis je bind (lier) les parametre

$requete_insertion->bindParam(1,$titre);
$requete_insertion->bindParam(2,$duree);
$requete_insertion->bindParam(3,$datefilm);

// 5 j'execute la requete
$resultat = $requete_insertion->execute(array($titre, $duree, $datefilm));
// 5 Si l'insertion fonctionne

if($resultat){
    //Message de réusite + bouton de retour à la liste
    header("Location:http://localhost/CRUD%20films/");
}else{
    echo "<p>Erreur: impossible d'enregitrer le film</p>";
}
?>


