<?php
include './lirepost.php';


?>


<!DOCTYPE html>


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/articles.css">
    <link rel="stylesheet" href="./css/background.css">
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
    <title>Articles</title>
</head>


<body>
    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a href="#">Contact </a>
        </div>
    </header>

    
    


    <div class="container2">
        <div class="post">
            <h1><?= $titre ?>§</h1>
            <p class="post-text"><?= $contenu ?></p>
            <img src="<?= $post['images'] ?>" width="70%" /> </br>

            <div class="social2">
                <p>
                    <span class="auteur"><?= $auteur ?></span>
                    <span class="icon-comms"><?= $post_comms ?></span>
                </p>

            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <h3>Copyright</h3>
        </div>
    </footer>
</body>





</html>