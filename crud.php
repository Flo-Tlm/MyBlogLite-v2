
<?php 
include '../post.php';
include '../connection.php';

$mysqli = connect();
if (!$mysqli) exit;

$tabPost = getAllPost($mysqli);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liste des posts</title>
  </head>
  <body class="text-center table-striped">
    <h1>Liste des 'Posts'</h1>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#id_post</th>
      <th scope="col">user_id</th>
      <th scope="col">Date</th>
      <th scope="col">Texte</th>
      <th scope="col">Image</th>
      <th scope="col">nb_like</th>
      <th scope="col">nb_com</th>
      <th scope="col">censure</th>
      <th scope="col">Read</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>   
    </tr>
  </thead>
  <tbody>
  <?php 
      for($i = 0; $i < count($tabPost);$i++) {
      ?>
    <tr>
      <th scope="row"><?= $tabPost[$i]['id'] ?></th>
      <td><?= $tabPost[$i]['user_id'] ?></td>
      <td><?= $tabPost[$i]['date'] ?></td>
      <td ><?= substr($tabPost[$i]['text'],0 , 35)."..." ?></td>
      <td><?= $tabPost[$i]['image'] ?></td>
      <td><?= $tabPost[$i]['nb_like'] ?></td>
      <td><?= $tabPost[$i]['nb_com'] ?></td>
      <td><?= $tabPost[$i]['censure'] ?></td>
      <td><form action="./readPost.php" method="post"> <input type="hidden" name="id" value="<?= $tabPost[$i]['id'] ?>"> <input type="submit" value="Read"> </form><a href="./readPost.php?id=<?= $tabPost[$i]['id'] ?>" class="btn btn-secondary" role="button">Read</a></td>
      <td><a href="./updatePost.php?id=<?= $tabPost[$i]['id'] ?>" class="btn btn-success" role="button">Update</a></td>
      <td><a href="./deletePost.php?id=<?= $tabPost[$i]['id'] ?>" class="btn btn-danger" role="button">Delete</a></td>
    </tr>
    <?php 
      }
    ?>
  </tbody>
</table>
</div>
</body>
    <!-- Optional JavaScript; choose one of the two! -->
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>