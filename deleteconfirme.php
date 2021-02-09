<?php
$title = "detail films";
ob_start();
// 1 connexion a la base de donnée
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


//requet sql de suppression 
$sql = "DELETE FROM films WHERE id_film = ?";
//Recup l'id passer dans l'url grace a la super globale $_GET
$id = $_GET['id'];

//Creation d'une requète prépare pour lier l'element ? = $id
$supression = $BD->prepare($sql);
//Bind de $id à ?
$supression->bindParam(1, $id);
//Execution de la reqète
$supression->execute();

//Verification conditionnelle
if($supression){
   
    header("Location:http://localhost/CRUD%20films/index.php");
}else{
    echo "<p>Erreur lors de la supression du produit</p>";
}

?>

<?php
$content = ob_get_clean();
require "template.php";
?>