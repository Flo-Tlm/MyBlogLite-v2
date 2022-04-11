<?php $con = mysqli_connect("localhost", "root", "", "margoulab");
// test connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo " <error style=color:white;>Connexion BDD OK</error> <br>";
}
?>