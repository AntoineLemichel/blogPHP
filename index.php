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
  $reponse = $bdd->query('SELECT * FROM billet');


  while ($donnees = $reponse->fetch()) {
    $commentary = $bdd->query('SELECT count(*) as total FROM commentary WHERE billet_id=' .$donnees['id'])->fetchColumn();

  ?>
  <div class="grid container container-index">
    <div class="ui card">
    <a href="blog.php?index=<?php echo $donnees['id']?>">
    <div class="blog content">
      <p class="ui header content"><?php echo $donnees['title']?></p>
      <div class="body-text">
        <p><?php echo $donnees['body']?></p>
      </div>
      <div class="bottom-blog meta">
        <span class="right floated author">Écrit par : <?php echo $donnees['user']?></span><br>
        <span>Le : <?php echo $donnees['datetime']?></span>
        <i class="right floated comments icon"><?php echo $commentary?></i>
      </div>
     </div>
     </a>
   </div>
 </div>
 <?php
 }
 $reponse->closeCursor();
  ?>
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
