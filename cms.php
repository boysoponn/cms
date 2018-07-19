<?php 
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/bliud/css/cms.css">
    <script src="/bliud/js/main.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
</head>
<body>

<?php 
if(isset($_SESSION['username'])){ ?>

    <div class="cms">
    <form action="cms.php" method="post">    
    <div style="float:right">
        <h1><?=$_SESSION['username']?></h1>
        <button  name="form" value="logout">LOGOUT</button>
    </div>
        <h1>EDIT PAGE homepage</h1>
        <input list="browser" name="edit_browser" placeholder="เลือกไอเทม">
        <datalist id="browser">
        <?php 
        $item_query=mysqli_query($database,"SELECT item_name from homepage ");
        $count = mysqli_num_rows($item_query);
            while($row = mysqli_fetch_array($item_query)){
                $item_name = $row['item_name'];?>
                <option value="<?=$item_name?>"> 
            <?php } ?>   
        </datalist>
        <input type="text" name="edit_value" placeholder="กรอกข้อมูลใหม่ได้เลยค้าบบ">
        <button  type="submit" name="form" value="save" >save</button><br>
        <input type="file" name="upload">
        <button type="submit" name="form" value="upload">UPLOAD</button>
        <h1>Search Page</h1>
        <input type="text" name="search_page" placeholder="กรอกชื่อเพจเพื่อดูรายละเอียด">
        <button  type="submit" name="form" value="search" >SEARCH PAGE</button>

    <?php 
    if(isset($_POST['form'])){
        if ($_POST['form'] == 'logout') {
            unset($_SESSION['username']);
           ?> <script>refresh_page_cms();</script> <?php
        }
        if ($_POST['form'] == 'search') {
            if(isset($_POST['search_page']) && !empty($_POST['search_page'])){        
            $search_page=$_POST['search_page'];
            $search_page=preg_replace("#[^0-9a-z]#i","", $search_page);             
            $page_query=mysqli_query($database,"SELECT * from $search_page " );
            $count = mysqli_num_rows($page_query);
                if($count==0){
                    echo "No have this page";
                }else{
                while($row = mysqli_fetch_array($page_query)){
                    $all_item_values = $row['item_values']; 
                    $all_item_name = $row['item_name'];
                    $all_item_id = $row['id'];?>
                    <p>ID =<?=$all_item_id?>&nbsp;&nbsp;&nbsp;<?=$all_item_name?></p>
                    <!-- <input type="text" value="<?=$all_item_values?>"> -->
                    <textarea name="pageitem_values" cols="50" rows="3"values=""><?=$all_item_values?></textarea>
            <?php 
                }     
                }
            }
        }elseif ($_POST['form'] == 'save'){
             $edit_browser=$_POST['edit_browser'];
             $edit_value=$_POST['edit_value'];
             mysqli_query($database,"UPDATE homepage set item_values = '$edit_value' where item_name like '$edit_browser'");
        
        }elseif ($_POST['form'] == 'upload'){  
            $edit_browser=$_POST['edit_browser'];
            $hero_image=($_POST['upload']) ; 
        mysqli_query($database,"UPDATE homepage set item_values = '$hero_image' where item_name like '$edit_browser' ");
        unset($_SESSION['username']);
        }
    }?>
    </form>
    </div>
<?php 
}else { 
?>
<div class="login">
<form action="" method="post">
    <p>Username</p>
    <input type="text" name="login_ID">
    <p>Password</p>
    <input type="password" name="login_password">
    <br><br><br>
    <button type="submit"id="button">SUBMIT</button>
    <?php 
        if(isset($_POST['login_ID'])&&!empty($_POST['login_ID']) && isset($_POST['login_password'])&&!empty($_POST['login_password'])){
            $login_ID=$_POST['login_ID'];
            $login_password=$_POST['login_password'];
            $login_ID=preg_replace("#[^0-9a-z]#i","", $login_ID);
            $login_password=preg_replace("#[^0-9a-z]#i","", $login_password);
            $query_username= mysqli_query($database,"SELECT * from id where username = '$login_ID' ") or die("Can't search");
            $count = mysqli_num_rows($query_username);
                if($count==0){
                    echo "No this username";
                }else{
                while($row = mysqli_fetch_array($query_username)){
                    $usernameID = $row['username'];
                    $passwordID = $row['pass'];
                        if($usernameID==$login_ID){
                            if($passwordID==$login_password){
                                $_SESSION['username']=$usernameID;?>
                                <script>refresh_page_cms();</script>            
                                <?php 
                            }else{
                            echo "Password is wrong";
                            }
                        }
                }
                }
        } ?>
</form>
</div>
<?php 
}
?>
</body>
</html>



