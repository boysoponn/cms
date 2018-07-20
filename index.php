<?php
include('config.php');
?>
<html>
<head>
    <script src="/bliud/js/main.js"></script>
    <link rel="stylesheet" href="/bliud/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register to my world</title>
</head>
<body>
<form action="" method="post">
<h1>REGISTER TO MY WORLD</h1>
<p class="formtext" id="username">Username</p>
<input type="text"  name="username" require placeholder="Input Username"/>
<p class="formtext"id="password" >Password</p>
<input type="password" name="password" placeholder="Input Password"/>
<p class="formtext" id="firstname">First Name</p>
<input type="text" name="firstname" placeholder="Input First Name"/>
<p class="formtext" id="lastname" >Last Name</p>
<input type="text" name="lastname" placeholder="Input Last Name"/>
<div style="margin-top:20px;"></div>
<button type="submit" name="register" class="correct" value="suscess">SUBMIT</button>
</form>
<?php 

if(isset($_POST['register'])){
    if(isset($_POST['username'])&& !empty($_POST['username']) &&isset($_POST['password'])&& !empty($_POST['password']) &&isset($_POST['firstname'])&& !empty($_POST['firstname'])&&isset($_POST['lastname'])&& !empty($_POST['lastname'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=preg_replace("#[^0-9a-z]#i","", $username);
    $password=preg_replace("#[^0-9a-z]#i","", $password);
    $firstname=preg_replace("#[^0-9a-z]#i","", $firstname);
    $lastname=preg_replace("#[^0-9a-z]#i","", $lastname);
    $query_signto= mysqli_query($connect,"INSERT INTO id(username,pass,firstname,lastname)VALUES('$username','$password','$firstname','$lastname' )") ;
    ?>
    <script>refresh_page_cms();</script>
<?php }
    if(empty($_POST['username'])){ ?>
       <script> required_usename(); </script>
    <?php }
    if(empty($_POST['password'])){ ?>
        <script> required_password(); </script>
    <?php }
    if(empty($_POST['firstname'])){ ?>
        <script> required_firstname(); </script>
    <?php }
    if(empty($_POST['lastname'])){ ?>
        <script> required_lastname(); </script>
    <?php }
}

?>
</body>
</html>