<?php include('lirepost.php');
 include('bdd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <title>Mes Articles</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/Articles.css" />
  <link rel="stylesheet" href="./css/settings.css" />
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <header>
    <div class="topnav">
      <div class="navbar">

        <div class="logo"><img src="./img/logo45.png" alt="" height="56px"></div>

        <div class="acceuil"><a href="./index.php">Acceuil</a>
          </div>
        <div class="Articles"> <a href="./listeArticles.php">Liste des Articles</a></div>
        
        <div class="log"> <a href="./login.php">Sign in</a></div>
      </div>
    </div>
  </header><br>
  <div class="welc">
    <p>Welcome!</p>
  </div>

  
  <?php lireFullpost();?>
  
  <footer>
    <div class="footer">
      
      <div class="logo"><img src="./img/logo45.png" alt="" height="56px"></div>

      <div class="lg2"><a href="https://www.google.com/intl/fr/gmail/about/"><i class="fa-solid fa-at fa-2x"></i></div></a>
      <div class="lg2"><a href=""><i class="fa-solid fa-phone fa-2x"></i></div></a>
      <div class="lg2"><a href="https://twitter.com/?lang=fr"><i class="fa-brands fa-twitter fa-2x"></i></div></a>
      <div class="lg2"><a href="https://www.instagram.com/?hl=fr"><i class="fa-brands fa-instagram fa-2x"></i></div></a>
      <div class="lg2"><a href="https://fr-fr.facebook.com/"><i class="fa-brands fa-facebook fa-2x"></i></div></a>

    </div>
  </footer>
</body>

</html>