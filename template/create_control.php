<html>
<body>
    
<div class="content">
<?php 
if(isset($_SESSION['username'])){ ?>

    <div class="cms">
    <form action="" method="post" enctype="multipart/form-data">    
    <div>
        <p>Welcome , <?=$_SESSION['username']?></p>
        <button  name="create_control" value="logout">LOGOUT</button>
    </div>
        <h1>Create Control </h1> 
        <?php if(isset($_SESSION['controlname'])&&!empty($_SESSION['controlname'])){
          ?>  <input name="control_name" placeholder="Insert control name" value=<?=$_SESSION['controlname']?>>
        <?php }else{ ?>
            <input name="control_name" placeholder="Insert control name" value="">
        <?php } ?>

        <button name="create_control" value="save_control_name">OK</button>

        <h1>Property control </h1>
        <select name="choose_control"  >
            <option value="text">text</option>
            <option value="textarea">textarea</option>
            <option value="image">image</option>
            <option value="dropdown">dropdown</option>
            <option value="radio">radio</option>
            <option value="checkbox">checkbox</option>
            <option value="date">date</option>
        </select>
        
        
        <button name="create_control" value="save_contral">OK</button>
    <?php 
    if(isset($_POST['create_control'])){
        if ($_POST['create_control'] == 'logout') {
            unset($_SESSION['username']);
            header("Location: http://soponcms.test/create_control.php");
        }
        elseif ($_POST['create_control'] == 'save_control_name'){
            $create_control=$_POST['control_name'];
            $_SESSION['controlname']=$create_control;
            header("Location: http://soponcms.test/create_control.php");           
        }
        elseif ($_POST['create_control'] == 'save_contral'){            
            $create_control=$_POST['choose_control'];
            if($create_control=='dropdown'){?> 
                <p>dropdown</p>
                <p>Label</p>
                <input type="text">
                <p>Value</p>
                <input type="text">
            <?php }
            elseif($create_control=='text'){?> 
                <p>text</p>
                <p>put text</p>
                <input type="text">
            <?php }
            elseif($create_control=='textarea'){?> 
                <p>textarea</p> 
                <p>put text</p>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <button name="gg" type="submit">gg</button>
            <?php }                     
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