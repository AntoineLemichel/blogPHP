<?php
include("bd.php");
$rep = $bdd->query('SELECT * FROM billet')->fetch();

if($_GET['index'] == $rep['id']){
  if(isset($_POST['user']) AND !empty($_POST['user']) AND isset($_POST['body']) AND !empty($_POST['body'])){
    $req = $bdd->prepare('INSERT INTO commentary(user, body, billet_id) VALUES(:user, :body, :billet_id)');
    $req->execute(array(
      'user' => $_POST['user'],
      'billet_id' => $_GET['index'],
      'body' => $_POST['body']
    ));
    header('Location: blog.php?index=' . $_GET['index']);

} else {
  echo "Les champs sont obligatoire.";
}

} else {
  echo "L'index demander n'existe pas.";
}


 ?>
