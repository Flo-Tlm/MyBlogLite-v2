<?php require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("Location: crud.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs
    $titreError = null;
    $photo_avatarError = null;
    $timeError = null;
    $image_postError = null;
    $contenu_postError = null;

    $titre = $_POST['Titre'];
    $photo_avatar = "../img/" .$_POST['avatar'];
    $image_post = "../img/" . $_POST['images'];
    $contenu_post =  $_POST['contenu'];

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

        $sql = "UPDATE article SET Titre = ?, avatar = ?, images = ?, contenu = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($titre, $photo_avatar, $image_post, $contenu_post, $id));
        Database::disconnect();
        header("Location: crud.php");
    }
} else {

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM article where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $titre = $data['Titre'];
    $photo_avatar = $data['avatar'];
    $image_post = $data['images'];
    $contenu_post = $data['contenu'];
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
            <h3 class="titre" >Modifier un Post</h3>
        </div>
    <div class="container">

        <form method="post" action="update.php?id=<?php echo $id; ?>">

            <div class="control-group <?php echo !empty($titreError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>

                <div class="controls">
                    <input name="Titre" type="text" placeholder="" value="<?php echo !empty($titre) ? $titre : ''; ?>">
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
                    <input name="avatar" type="file" placeholder="" value="<?php echo !empty($photo_avatar) ? $photo_avatar : ''; ?>">
                    <?php if (!empty($photo_avatarError)) : ?>
                        <span class="help-inline"><?php echo $photo_avatarError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

            <div class="control-group <?php echo !empty($contenu_postError) ? 'error' : ''; ?>">
                <label class="control-label">Contenu du post:</label>

                <div class="controls">
                    <textarea class="textcont" name="contenu" type="textarea" placeholder="" value="<?php echo !empty($contenu_post) ? $contenu_post : ''; ?>"cols="40" rows="10"></textarea></>
                    <?php if (!empty($contenu_postError)) : ?>
                        <span class="help-inline"><?php echo $contenu_postError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>


            <div class="control-group <?php echo !empty($image_postError) ? 'error' : ''; ?>">
                <label class="control-label">Lien image post:</label>


                <div class="controls">
                    <input name="images" type="file" placeholder="" value="<?php echo !empty($image_post) ? $image_post : ''; ?>">
                    <?php if (!empty($image_postError)) : ?>
                        <span class="help-inline"><?php echo $image_postError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>


            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="crud.php">Retour</a>
            </div>
            <p>

        </form>
        <p>



    </div>
    <p>


</body>

</html>