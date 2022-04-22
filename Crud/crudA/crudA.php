<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liste des auteurs</title>
    <link rel="stylesheet" href="../../css/crudA.css">

</head>

<body>
    <div class="background">

        <div class="container">
            <h2>Liste des auteurs</h2>
            <a class="bnt btn-new" href="../fonction/creation.php">Ajouter un auteur</a>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>ID</th>
                            <p>
                                <th>Pseudo</th>
                            <p>
                                <th>Nom</th>
                            <p>
                                <th>Prenom</th>
                            <p>

                        </thead>

                        <tbody>
                            <?php include 'databaseA.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM auteur ORDER BY id DESC';
                            foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td><p>';
                                echo '<td>' . $row['pseudo'] . '</td><p>';
                                echo '<td>' . $row['nom'] . '</td><p>';
                                echo '<td>' . $row['prenom'] . '</td><p>';



                                echo '<td>';
                                echo '<a class="btn" href="editA.php?id=' . $row['id'] . '">Lire</a>'; // un autre td pour le bouton d'edition
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-success" href="updateA.php?id=' . $row['id'] . '">Editer</a>'; // un autre td pour le bouton d'update
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-danger" href="deleteA.php?id=' . $row['id'] . ' ">Supprimer</a>'; // un autre td pour le bouton de suppression
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