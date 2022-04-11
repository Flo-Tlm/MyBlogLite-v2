<?php
include '.././bdd.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $active_id = htmlspecialchars($_GET['id']);

    $active = $bdd->prepare('UPDATE article SET active = TRUE WHERE id = ?');
    $active->execute(array($active_id));
   header('location:../liste.php');
}
 ?>