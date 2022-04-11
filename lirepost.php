<?php
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

function lireFullpost()
{

  include('./bdd.php');
  if (isset($_GET['id']) and !empty($_GET["id"])) {
    $get_id = htmlspecialchars($_GET['id']);
    $post = $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $post->execute(array($get_id));

    if ($post->rowCount() == 1) {
      $post = $post->fetch();
      $id = $post['id'];
      $titre = $post['Titre'];
      $contenu = $post['contenu'];
      $image_post = $post['images'];
      $post_vues = $post['vues'];
      $date_time = $post['date_time'];
      $avatar = $post['avatar'];
      $role = $post['role'];
      $pseudo = $post['auteur'];

      $date = date_create($post['date_time']);
    } else {
      die('Cet article n\' existe pas!');
    }
  } else {
    die('erreur');
  } { ?>

  <div class="redace">
    <div class="t">
      <div class="k">
        <div class="p">
          <img src=" <?= $avatar ?>" alt="">
        </div>
        <div class="t">
          <p><?= $pseudo ?></p>
          <p><?= $role ?></p>
        </div>

      </div>

        <div class="div1">
        <p>
          <h1 id="tj"> <?= $titre ?> </h1> <div id="ey">
          <p><span><i class="fa-solid fa-eye"></i><?= $post_vues ?></i></span> </p>
          <p><i class="fa-solid fa-clock"></i><?= date_format($date, 'd/m/Y H:i'); ?></p></div>
        </p>
          <img id="robot" src="<?= $image_post ?>"></img>        
         
         </div>

        <div class="div2">

          <h5><?= $contenu ?></h5>
        </div>
      </div>
    </div>
    


<?php
    $bdd->connection = null;
  }
} ?>