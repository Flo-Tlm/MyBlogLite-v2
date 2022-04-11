<html>
<?php
include './bdd.php';
?>
<link rel="stylesheet" href="./css/login.css" />
<head>
    <title> login system</title>
    
  
</head>

<body>
    <div class="loginpage">
    
    <div id="frm">
        <h1>Login</h1>
        <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">
            <p>
                <label> UserName: <br></label>
                <input type="text" id="user" name="user" />
            </p>
            <p>
                <label> Password: <br> </label>
                <input type="password" id="pass" name="pass" />
            </p>
            <p>
                <a href="listing.php"><input type="submit" id="btn" value="Login" /></a>
            </p>
        </form>
    </div>
    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
    </div>
</body>

</html>