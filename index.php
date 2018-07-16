<?php
include('config.php');
// echo $_SESSION['id'];
if(isset($_POST['username'])&& !empty($_POST['username']) &&isset($_POST['password'])&& !empty($_POST['password']) &&isset($_POST['firstname'])&& !empty($_POST['firstname'])&&isset($_POST['lastname'])&& !empty($_POST['lastname'])){
$username=$_POST['username'];
$password=$_POST['password'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=preg_replace("#[^0-9a-z]#i","", $username);
$password=preg_replace("#[^0-9a-z]#i","", $password);
$firstname=preg_replace("#[^0-9a-z]#i","", $firstname);
$lastname=preg_replace("#[^0-9a-z]#i","", $lastname);
$query_signto= mysqli_query($database,"INSERT INTO id(username,pass,firstname,lastname)VALUES('$username','$password','$firstname','$lastname' )") ;
}
 if(isset($_POST['username']) && empty($_POST['username']))     
{
    
}
?>
<html>
<body>

<form action="" method="post">
<h1>REGISTER TO MY WORLD</h1>
<p class="formtext">Username</p>
<input type="text" name="username" require placeholder="Input Username"/>
<p class="formtext">Password</p>
<input type="password" name="password" placeholder="Input Password"/>
<p class="formtext">First Name</p>
<input type="text" name="firstname" placeholder="Input First Name"/>
<p class="formtext">Last Name</p>
<input type="text" name="lastname" placeholder="Input Last Name"/>
<div style="margin-top:20px;"></div>
<button type="submit">ยืนยัน</button><button><a href="login.php">LOGIN</a></button>
</form>

</body>
</html>
<style>
body{
    background-color:blue;
}
form{
    width:30%;
    position:relative;
    margin:auto;
    margin-top:50px;
    text-align:center;
    
}
h1{
    color:#fff;
    font-size:30px;
}
a{
    text-decoration:none;
}
input{
    background-color:#ECF0F1;
    width:100%;
    height:40px;
    border :solid 3px #fff; 
    text-align:center;
    font-size:18px;
}
input::placeholder, input:focus {
    font-size:18px;
}

.formtext{
    color:#fff;
    text-align:center;
    font-size:20px
}
button{
    width:50%;
    margin-top:10px;
    background-color:#ECF0F1  ;
}
</style>