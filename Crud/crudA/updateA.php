<?php require 'databaseA.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("Location: crudA.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs
    $titreError = null;
    $photo_avatarError = null;
    $timeError = null;
    $image_postError = null;
    $contenu_postError = null;

    $titre = $_POST['pseudo'];
    $photo_avatar = $_POST['nom'];
    $image_post = $_POST['prenom'];


    $valid = true;
    if (empty($titre)) {
        $titreError = 'Entrer un titre';
        $valid = false;
    }
    if (empty($photo_avatar)) {
        $photo_avatarError = 'Entrer un lien vers l\'image';
        $valid = false;
    }
    if (empty($contenu_post)) {
        $contenu_postError = 'Entrer un contenu';
        $valid = false;
    }

    if (empty($image_post)) {
        $image_postError = 'erreur';
        $valid = false;
    }

    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE auteur SET pseudo = ?, nom = ?, prenom = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($titre, $photo_avatar, $image_post,  $id));
        Database::disconnect();
        header("Location: crudA.php");
    }
} else {

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM auteur where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $titre = $data['pseudo'];
    $photo_avatar = $data['nom'];
    $image_post = $data['prenom'];
    
    Database::disconnect();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud-Update</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>


    <div>
        <h3 class="titre">Renommer auteur</h3>
    </div>
    <div class="container">

        <form method="post" action="crudA.php?id=<?php echo $id; ?>">

            <div class="control-group <?php echo !empty($titreError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>

                <div class="controls">
                    <input name="pseudo" type="text" placeholder="" value="<?php echo !empty($titre) ? $titre : ''; ?>">
                    <?php if (!empty($titreError)) : ?>
                        <span class="help-inline"><?php echo $titreError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

            <div class="control-group <?php echo !empty($photo_avatarError) ? 'error' : ''; ?>">
                <label class="control-label">Lien Avatar:</label>

                <div class="controls">
                    <input name="nom" type="text" placeholder="" value="<?php echo !empty($photo_avatar) ? $photo_avatar : ''; ?>">
                    <?php if (!empty($photo_avatarError)) : ?>
                        <span class="help-inline"><?php echo $photo_avatarError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>



            <div class="control-group <?php echo !empty($image_postError) ? 'error' : ''; ?>">
                <label class="control-label">Lien image post:</label>


                <div class="controls">
                    <input name="prenom" type="text" placeholder="" value="<?php echo !empty($image_post) ? $image_post : ''; ?>">
                    <?php if (!empty($image_postError)) : ?>
                        <span class="help-inline"><?php echo $image_postError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>


            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="crudA.php">Retour</a>
            </div>
            <p>

        </form>
        <p>



    </div>
    <p>


</body>

</html>