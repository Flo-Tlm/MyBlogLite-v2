<?php
include('./bdd.php');
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/listing.css">
    <title>Liste des Posts</title>

</head>

<body>
    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <!-- <a href="#">Contact </a> -->
            <a href="./login.php" style="float:right">Login</a>
        </div>
    </header>
    <div class="liste_post">
        <div class="postlist">
            <h1>Liste des Posts</h1>
            <ul style="list-style-type:none;">
                <?php while ($post = $posts->fetch()) { ?>
                    <li>
                        <a href="modifier-post.php?id=<?= $post['id'] ?>">Editer ce post</a><a href="Articles.php?id=<?= $post['id'] ?>">Voir ce post</a> <br>
                        <h2><?= $post['Titre'] ?></h2>
                        <img src="<?= $post['images'] ?>" width="100" />
                        <p><?= $post['contenu'] ?></p>
                        <span>&#8205; </span>
                        <p><?= $post['date_time'] ?></p>
                        <a href="fonction/supprimer.php?id=<?= $post['id'] ?>"> Supprimer ce Post</a></br>
                    </li>
                <?php } ?>

            </ul>
            <div id="btn2"><a href="./fonction/creation.php">Créer un nouveau post</a></div>
        </div>
    </div>