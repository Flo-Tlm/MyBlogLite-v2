<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './bdd.php';

//démarre une nouvelle session
session_start() ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login system</title>

    <link rel="stylesheet" href="./css/login.css" />
</head>
<body>
    




<?php

        $mysqli = new mysqli("localhost", "root", "", "margoulab");
        if ($mysqli->connect_errno) {
            echo "Problème de connexion à la base de données !";
            exit();
        }
        
            $requete_sql= "SELECT * FROM admin_login ;" ;

            $result = $mysqli ->query($requete_sql) ;

            while ($row = $result->fetch_assoc())
{
    $article [] = $row;
}

$result->free_result();

$mysqli->close();

if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_POST['user'])) {

    $_SESSION['login'] = $_POST['user'] ;
   
    if(($_POST['user'] == '') && ($_POST['pass'] == '')) {

        printf('<p class="rien">Veuillez compléter tous les champs...</p><br />');
    }

        else {
            $loginsaisi =htmlspecialchars ($_POST['user']) ;
          
            $mdpsaisi = hash("sha512", ($_POST['pass']));
          
         
            for ($i=0; $i<count( $article) ; $i++){

                if (($article[$i]["Username"] == $loginsaisi) AND ($article[$i]["Password"] == $mdpsaisi) ) {

                    $_SESSION['userid'] = $article[$i]["id"] ;
                    
                   
                    

                        header('Location: home.php');
                       


                }
                else {
                    echo "<p>Votre mot de passe ou pseudo est incorrect</p>";
                }
            
            }
        }
        
        


        



}


?>
    <div class="loginpage">
    
    <div id="frm">
        <h1>Login</h1>
        <form name="f1" action="login.php" onsubmit="return validation()" method="POST">
            <p>
                <label> UserName: <br></label>
                <input type="text" id="user" name="user" />
            </p>
            <p>
                <label> Password: <br> </label>
                <input type="password" id="pass" name="pass" />
            </p>
            <p>
                <a href="#"><input type="submit" id="btn" value="Login" /></a>
            </p>
        </form>
    </div>
    
    </div>
</body>

</html>