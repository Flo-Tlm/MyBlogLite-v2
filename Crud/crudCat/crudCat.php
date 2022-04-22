<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liste des Catégorie</title>
    <link rel="stylesheet" href="../../css/crudCat.css">

</head>

<body>
    <div class="background">

        <div class="container">
            <h2>Liste des Posts</h2>
            <a class="bnt btn-new" href="../../fonction/creation.php">Ajouter une Catégorie</a>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <th>ID</th>
                            <p>
                            <th>Type</th>
                            <p>
                   
                        </thead>

                        <tbody>
                            <?php include 'databaseC.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM catégorie ORDER BY id DESC';
                            foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td><p>';
                                echo '<td>' . $row['types'] . '</td><p>';
                               
                                
                                echo '<td>';
                                echo '<a class="btn" href="editC.php?id=' . $row['id'] . '">Lire</a>'; // un autre td pour le bouton d'edition
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-success" href="updateC.php?id=' . $row['id'] . '">Editer</a>'; // un autre td pour le bouton d'update
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-danger" href="deleteC.php?id=' . $row['id'] . ' ">Supprimer</a>'; // un autre td pour le bouton de suppression
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