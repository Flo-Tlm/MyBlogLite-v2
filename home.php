

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
          <a href="../index.php">Page d'acceuil></a> </br>
<p>
          <a href="./logout.php">Logout</a>

     </body>

     </html>

<?php

} else {

     header("Location: home.php");

     exit();
}

?>