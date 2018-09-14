<!doctype html>
<html class="no-js" lang="fr-FR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP : Blog - Ajout topic</title>
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
  <form class="ui form" action="topic_insert.php" method="post">
    <div class="field required">
      <label>Pseudo :</label>
      <input type="text" name="user" placeholder="Pseudo" required>
    </div>
    <div class="field required">
      <label>Titre :</label>
      <input type="text" name="title" placeholder="Titre" required>
    </div>
    <div class="field required">
      <label>Message : </label>
      <textarea name="body" placeholder="Message" required></textarea>
    </div>
    <button class="ui button blue" type="submit">Envoyer</button>
  </form>
 </body>
 </html>
