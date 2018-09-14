<?php
include("bd.php");

if (isset($_POST['user']) and !empty($_POST['user']) and isset($_POST['title']) and !empty($_POST['title']) and isset($_POST['body']) and !empty($_POST['body'])) {
    $req = $bdd->prepare('INSERT INTO billet(user, title, body) VALUES(:user, :title, :body)');
    $req->execute(array(
    'user' => htmlspecialchars($_POST['user']),
    'title' => htmlspecialchars($_POST['title']),
    'body' => $_POST['body']
  ));

    header('Location: index.php');
} else {
    echo "non";
}
