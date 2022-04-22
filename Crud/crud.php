<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liste des Posts</title>
    <link rel="stylesheet" href="../css/crud.css">

</head>

<body>
    <div class="background">

        <div class="container">
            <h2>Liste des Posts</h2>
            <a class="bnt btn-new" href="../fonction/creation.php">Ajouter un article</a>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <th>ID</th>
                            <p>
                            <th>Titre</th>
                            <p>
                                <th>Date</th>
                            <p>
                                <th>Avatar</th>
                            <p>
                                <th>image du post</th>
                            <p>
                                <th>contenu du post</th>
                            <p>
                                <th>Vues</th>
                            <p>
                                <th>Auteur</th>
                            <p>
                                <th>Lecture</th>
                            <p>
                                <th>Editer</th>
                            <p>
                                <th>Suppression</th>
                            <p>
                        </thead>

                        <tbody>
                            <?php include 'database.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM article ORDER BY id DESC';
                            foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td><p>';
                                echo '<td>' . $row['Titre'] . '</td><p>';
                                echo '<td>' . $row['date_time'] . '</td><p>';
                                echo '<td><img src="../'  . $row['avatar'] .'" > </td><p>';
                                echo '<td><img src="../'  . $row['images'] .'"width="300"> </td><p>';
                                echo '<td>' . $row['contenu'] . '</td><p>';
                                echo '<td>' . $row['vues'] . '</td><p>';
                                echo '<td>' . $row['id_auteur'] . '</td><p>';
                                
                                echo '<td>';
                                echo '<a class="btn" href="edit.php?id=' . $row['id'] . '">Lire</a>'; // un autre td pour le bouton d'edition
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Editer</a>'; // un autre td pour le bouton d'update
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Supprimer</a>'; // un autre td pour le bouton de suppression
                                echo '</td><p>';
                                
                                echo '</tr><p>';
                            }
                            Database::disconnect(); //on se deconnecte de la base

                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
  
</body>

</html>