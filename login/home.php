<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

     <!DOCTYPE html>

     <html>

     <head>

          <title>HOME</title>

          <link rel="stylesheet" type="text/css" href="login.css">

     </head>

     <body>

          <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
          <a href="../Crud/crud.php">CRUD article</a> </br>
<p>
          <a href="./login_index.php">Logout</a>

     </body>

     </html>

<?php

} else {

     header("Location: index.php");

     exit();
}

?>