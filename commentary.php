<?php
include("bd.php");
$rep = $bdd->query('SELECT * FROM billet WHERE id='.$_GET['index'])->fetch();
if ($_GET['index'] == $rep['id']) {
    if (isset($_POST['user']) and !empty($_POST['user']) and isset($_POST['body']) and !empty($_POST['body'])) {
        $req = $bdd->prepare('INSERT INTO commentary(user, body, billet_id) VALUES(:user, :body, :billet_id)');
        $req->execute(array(
      'user' => htmlspecialchars($_POST['user']),
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
