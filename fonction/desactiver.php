<?php
include '.././bdd.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);

    $suppr = $bdd->prepare('UPDATE article SET active = FALSE WHERE id = ?');
    $suppr->execute(array($suppr_id));
   header('location:../liste.php');
}
 ?>