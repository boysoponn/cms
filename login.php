<?php
include('config.php');
if(isset($_POST['login_ID'])&&!empty($_POST['login_ID']) && isset($_POST['login_password'])&&!empty($_POST['login_password'])){
$login_ID=$_POST['login_ID'];
$login_password=$_POST['login_password'];
$login_ID=preg_replace("#[^0-9a-z]#i","", $login_ID);
$login_password=preg_replace("#[^0-9a-z]#i","", $login_password);

$query_username= mysqli_query($connect,"SELECT * from id where username = '$login_ID' ") or die("Can't search");

 $count = mysqli_num_rows($query_username);
 
if($count==0){
    echo "No this username";
}else{
 while($row = mysqli_fetch_array($query_username)){
    $usernameID = $row['username'];
    $passwordID = $row['pass'];
    if($usernameID==$login_ID){
        if($passwordID==$login_password){
        echo "Login suscess";
        }else{
        echo "Password is wrong";
        }
    }
}
}
}


?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form action="" method="post">
    <p>Username</p>
    <input type="text" name="login_ID">
    <p>Password</p>
    <input type="password" name="login_password">
    <br><br><br>
    <button type="submit">SUBMIT</button>
</form>
</body>
</html>