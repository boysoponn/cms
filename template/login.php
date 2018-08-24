<div class="group-menu-login">
<button id="login" class="menu-login">login</button>
<button id="register" class="menu-login">register</button>
</div>
<form class="material-form1" action="" method="post">
    <div class="well">
    <h2>Welcome to CMS</h2>
    <div class="form-group">
      <input type="text" class="form-control" name="login_ID" required autocomplete="off">
      <label>Username</label>
      <span class="input-border"></span>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="login_password" required autocomplete="off">
      <label>Password</label>
      <span class="input-border"></span>
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg">LOGIN</button>
    <?php 
        if(isset($_POST['login_ID'])&&!empty($_POST['login_ID']) && isset($_POST['login_password'])&&!empty($_POST['login_password'])){
            $login_ID=$_POST['login_ID'];
            $login_password=$_POST['login_password'];
            $login_ID=preg_replace("#[^0-9a-z]#i","", $login_ID);
            $login_password=preg_replace("#[^0-9a-z]#i","", $login_password);
            $query_username= mysqli_query($connect,"SELECT * from id where username = '$login_ID' ");
            $count = mysqli_num_rows($query_username);
                if($count==0){
                    ?> <p>No have this username</p> <?php
                }else{
                while($row = mysqli_fetch_array($query_username)){
                    $usernameID = $row['username'];
                    $passwordID = $row['pass'];
                        if($usernameID==$login_ID){
                            if($passwordID==$login_password){
                                $_SESSION['username']=$usernameID;
                                header("Location: http://soponcms.test/cms.php");           
                                
                            }else{?> <p>Password is wrong</p> <?php
                            
                            }
                        }
                }
                }
        } ?>
        </div>
</form>



<form class="material-form2" action="" method="post">
<div class="well">
<h2>REGISTER</h2>

<div class="form-group">
    <input class="form-control " type="text"  name="username" required autocomplete="off" />
      <label>Username</label>
      <span class="input-border"></span>
</div>
<div class="form-group">
    <input class="form-control " type="password"  name="password" required autocomplete="off"/>
      <label>password</label>
      <span class="input-border"></span>
</div>
<div class="form-group">
    <input class="form-control " type="text"  name="firstname" required autocomplete="off" />
      <label>firstname</label>
      <span class="input-border"></span>
</div>
<div class="form-group">
    <input class="form-control " type="text"  name="lastname" required autocomplete="off" />
      <label>lastname</label>
      <span class="input-border"></span>
</div>

<button type="submit" name="register" class="correct btn btn-primary btn-lg" value="suscess">Submit</button>
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
    header("Location: http://soponcms.test/cms.php"); 
    }
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

