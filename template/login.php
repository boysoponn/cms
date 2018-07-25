<div class="login">
<form action="" method="post">
    <p>Username</p>
    <input type="text" name="login_ID">
    <p>Password</p>
    <input type="password" name="login_password">
    <br><br><br>
    <button type="submit"id="button">SUBMIT</button>or
    <a href="register.php">Sign up</a><br>
    <?php 
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
                                $_SESSION['username']=$usernameID;
                                header("Location: http://soponcms.test/cms.php");           
                                
                            }else{
                            echo "Password is wrong";
                            }
                        }
                }
                }
        } ?>
</form>
</div>