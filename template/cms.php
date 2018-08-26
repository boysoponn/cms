 <?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
</head>
<body>

<div  class="content">
<?php 
if(isset($_SESSION['username'])){ ?>

    <div class="cms">
    <form action="" method="post" enctype="multipart/form-data">    
    <div >
        <p>Welcome , <?=$_SESSION['username']?></p>
        <button  name="form" value="logout">LOGOUT</button>
    </div>
        <h1>EDIT PAGE homepage</h1>
        <input list="browser" name="edit_browser" placeholder="เลือกไอเทม">
        <datalist id="browser">
        <?php 
        $item_query=mysqli_query($connect,"SELECT item_name from homepage ");
            while($row = mysqli_fetch_array($item_query)){
                $item_name = $row['item_name'];?>
                <option value="<?=$item_name?>"> 
            <?php } ?>   
        </datalist>
        <input type="text" name="edit_value" placeholder="กรอกข้อมูลใหม่ได้เลยค้าบบ">
        <button  type="submit" name="form" value="save" >SAVE</button><br>
        <input type="file" name="uploaded_file">
        <button type="submit" name="form" value="upload">UPLOAD</button>
        <h1>Search Page</h1>
        <input type="text" name="search_page" placeholder="กรอกชื่อเพจเพื่อดูรายละเอียด">
        <button  type="submit" name="form" value="search" >SEARCH PAGE</button>

    <?php 
    if(isset($_POST['form'])){
        if ($_POST['form'] == 'logout') {
            unset($_SESSION['username']);
            header("Location: http://soponcms.test/cms.php");
        }
        if ($_POST['form'] == 'search') {
            if(isset($_POST['search_page']) && !empty($_POST['search_page'])){        
            $search_page=$_POST['search_page'];
            $search_page=preg_replace("#[^0-9a-z]#i","", $search_page);             
            $page_query=mysqli_query($connect,"SELECT * from $search_page " );
            $count = mysqli_num_rows($page_query);
                if($count==0){
                    echo "No have this page";
                }else{?> 
                <form action="" method="post"><?php
                while($row = mysqli_fetch_array($page_query)){
                    $all_item_values = $row['item_values']; 
                    $all_item_name = $row['item_name'];
                    $all_item_id = $row['id'];?>
                    <p>ID =<?=$all_item_id?>&nbsp;&nbsp;&nbsp;<?=$all_item_name?></p>                  
                    <textarea name="pageitem_values" cols="50" rows="3"values=""><?=$all_item_values?></textarea>
            <?php 
                }?>
                </form>     
                <?php }
            }
        }elseif ($_POST['form'] == 'save'){
             $edit_browser=$_POST['edit_browser'];
             $edit_value=$_POST['edit_value'];
             mysqli_query($connect,"UPDATE homepage set item_values = '$edit_value' where item_name like '$edit_browser'");
        }elseif ($_POST['form'] == 'upload'&& !empty($_FILES['uploaded_file'])){    
                $edit_browser=$_POST['edit_browser'];
                $hero_image=$_FILES['uploaded_file']['name'] ;
                $path = "uploads/";
                $path = $path . basename( $_FILES['uploaded_file']['name']);
                move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path);
                mysqli_query($connect,"UPDATE homepage set item_values = '$hero_image' where item_name like '$edit_browser' ");
        }
    }?>
    </form>
    </div>
<?php 
$title = get_select('homepage','title');
$description = get_select('homepage','description');
$background_color = get_select('homepage','background_color');
$img = get_select('homepage','hero_image');
?>

<body style="background-color:<?=$background_color?>">

<h1><?=$title?></h1> 
<p><?=$description?></p>
<div class="pic">
<img  src="/uploads/<?=$img?>" alt="">
</div> <?php
}
?>



</body>
</html>



