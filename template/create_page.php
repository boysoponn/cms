<html>
<body>
    
<div class="content">
<?php 
if(isset($_SESSION['username'])){ ?>

    <div class="cms">
    <form action="" method="post" enctype="multipart/form-data">    
    <div >
        <p>Welcome , <?=$_SESSION['username']?></p>
        <button  name="create_form" value="logout">LOGOUT</button>
    </div>
        <h1>Create Page </h1> 
        <?php if(isset($_SESSION['pagename'])&&!empty($_SESSION['pagename'])){
          ?>  <input name="page_name" placeholder="Insert page name" value=<?=$_SESSION['pagename']?>>
        <?php }else{ ?>
            <input name="page_name" placeholder="Insert page name" value="">
        <?php } ?>

        <button name="create_form" value="save_page_name">OK</button>

        <h1>Choose control </h1>
        <input list="browser" name="choose_control" placeholder="Choose control">
        <datalist id="browser">
        <?php 
        $contral_query=mysqli_query($connect,"SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='sopon'");       
        while($row = mysqli_fetch_array($contral_query)){
                $contral_name = $row['TABLE_NAME'];?>
                <option value="<?=$contral_name?>"> 
            <?php } ?>   
        </datalist>
        
        <button name="create_form" value="save_contral">save</button>
    <?php 
    if(isset($_POST['create_form'])){
        if ($_POST['create_form'] == 'logout') {
            unset($_SESSION['username']);
            header("Location: http://soponcms.test/create.php");
        }
        elseif ($_POST['create_form'] == 'save_page_name'){
            $create_page=$_POST['page_name'];
            $_SESSION['pagename']=$create_page;
            header("Location: http://soponcms.test/create.php");
            
        }
        elseif ($_POST['create_form'] == 'save_contral'){            
            $create_control=$_POST['choose_control'];
            
        }
    }?>
    </form>
    </div>
<?php 
}
?>

</div>
</body>
</html>