<?php
include("bd.php");
 ?>
<!doctype html>
<html class="no-js" lang="fr-FR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP : Blog</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/semantic.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <a href="index.php">Index</a>

  <?php
  $reponse = $bdd->query('SELECT * FROM billet WHERE id=' . $_GET['index']);
  while ($donnees = $reponse->fetch()) {
  ?>
  <div class="ui text main container">
    <h1 class="ui header"><?php echo $donnees['title'] ?></h1>
 </div>
 <div class="ui text container">
  <p><?php echo $donnees['body'] ?></p>

   <div class="overlay">
      <div class="ui labeled icon vertical menu">
        <span class="item">Écrit par : <?php echo $donnees['user'] ?></span>
        <span class="item">Le : <?php echo $donnees['datetime'] ?></span>
      </div>
    </div>
 </div>

 <?php
 }
 $commentary = $bdd->query('SELECT * FROM commentary WHERE billet_id=' .$_GET['index']);
 $index = $_GET['index'];

 while($donnees_commentary = $commentary->fetch()){
   ?>
   <div class="ui card main container">
     <p class="ui header"><?php echo $donnees_commentary['user'] ?></p>
  <div class="ui container">
   <p><?php echo $donnees_commentary['body'] ?></p>
   <hr>
 </div>

    <div class="overlay">
         <span class="item">Le : <?php echo $donnees_commentary['datetime'] ?></span>
     </div>
  </div>

   <?php
 }
 $commentary->closeCursor();
 $reponse->closeCursor();
  ?>
  <div class="ui main container card">
  <form action="commentary.php?index=<?php echo $_GET['index']?>" method="post" class="ui form">
    <div class="ui input grid container">
      <div class="field required">
       <label>Pseudo :</label>
        <input class="ui input" type="text" name="user" placeholder="Pseudo">
      </div>
      <div class="field required">
        <label>Message :</label>
        <textarea name="body" rows="8" cols="40" placeholder="Message"></textarea>
      </div>
     <input type="submit" value="Envoyer" class="ui button blue">
   </div>
  </form>
  </div>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/semantic.min.js"></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <!-- <script src="https://www.google-analytics.com/analytics.js" async defer></script> -->
</body>

</html>
