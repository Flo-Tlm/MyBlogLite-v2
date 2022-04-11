<?php
include '.././bdd.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);

    $suppr = $bdd->prepare('DELETE FROM article WHERE id = ?');
    $suppr->execute(array($suppr_id));
   header('location:../listing.php');
}
 ?>