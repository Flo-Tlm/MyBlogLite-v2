<?php
include('.././bdd.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="../css/creation.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="topnav">
            <a href="../listing.php">Retour a la liste</a>

        </div>
    </header>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p><span>Nouveau Post Publié</span></p>";
    ?>
        <div class="forms">
            <form class="myform" action="./creation.php" method="POST">
                <p><label for="nom"> Titre :</label><br>
                    <input type="texte" name="Titre" id="">
                </p>
                <p><label for="nom">Contenu :</label><br> <input type="texte" name="contenu" id=""></p>
                <p><label for="nom"> vues :</label><br> <input type="texte" name="vues" id=""></p>
                <p><label for="nom"> auteur:</label><br> <input type="texte" name="auteur"></p>
                <p><label for="nom"> images :</label><br> <input type="texte" name="images" id=""></p>
                <p><label for="nom"> avatar :</label><br> <input type="texte" name="avatar" id=""></p>
                <p><label for="nom"> Rôle :</label><br> <input type="texte" name="role" id=""></p>

                <p><input type="submit" value="Ajouter cet article"></p>

        </div>
        </form>
        </div>
        <?php
        $contenu =  htmlspecialchars($_POST['contenu']);
        $vues =  htmlspecialchars($_POST['vues']);

        // $requete = "INSERT INTO `article`(`Titre`, `contenu`, `vues`, `pseudo` , `images` , `avatar` , `role`,`date_time`) VALUES (NULL, '" . $_POST['Titre'] . "','" . $contenu . "','" . $_POST['vues'] . "','" . $_POST['pseudo'] . ",'" . $_POST['images'] . "','" . $_POST['avatar'] . "','" . $_POST['role'] . "'";

        $requete = "INSERT INTO `article`(`Titre`, `contenu`, `vues`,`auteur`,`images`,`avatar`, `role`, `date_time`) VALUES ('" . $_POST['Titre'] . "','" . $_POST['contenu']  . "','" . $_POST['vues'] . "','" . $_POST['auteur'] . "','" . $_POST['images'] . "','" . $_POST['avatar'] . "','" . $_POST['role'] . "', NOW() )";
        $resultat = $bdd->query($requete);
        if ($resultat) {
            echo "<span>L'article a bien étè ajouter</span>";
        } else {
            echo "<span>L'article n'a pas étais ajouter</span>";
        }

        ?>
    <?php

    } else {

    ?>
        <div class="forms">
            <form class="myform" action="./creation.php" method="POST">

                <p><label for="nom"> Titre :</label> <br> <input type="texte" name="Titre" id=""></p>
                <p><label for="nom">Contenu :</label> <br> <input type="texte" name="contenu" id="" style=></p>
                <p><label for="nom"> vues :</label> <br> <input type="texte" name="vues" id=""></p>
                <p><label for="nom"> auteur:</label> <br> <input type="texte" name="auteur"></p>
                <p><label for="nom"> images :</label> <br> <input type="texte" name="images" id=""></p>
                <p><label for="nom"> avatar :</label> <br> <input type="texte" name="avatar" id=""></p>
                <p><label for="nom"> Rôle :</label> <br> <input type="texte" name="role" id=""></p>

                <p><input type="submit" value="Ajouter cet article"></p>

        </div>
        </form>


        </div>
        <?php

        ?>
    <?php
    }

    ?>

    <footer>
        <div class="footer">
            
        </div>
    </footer>

</body>

</html>






<div>