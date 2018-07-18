<?php
include('config.php');

// if(isset($_POST['page']) && !empty($_POST['page'])){
//     $page=$_POST['page'];
//     $page=preg_replace("#[^0-9a-z]#i","", $page);
//     mysqli_query($database,"CREATE TABLE $page (id int NULL AUTO_INCREMENT PRIMARY KEY,item_name varchar(255),item_variable varchar(255),item_values varchar(255))") ;
// }

// if(isset($_POST['pageitem_name']) && !empty($_POST['pageitem_name'])&&isset($_POST['pageitem_variable']) && !empty($_POST['pageitem_variable'])&&isset($_POST['pageitem_values']) && !empty($_POST['pageitem_values'])){
// $pageitem_name=$_POST['pageitem_name'];
// $pageitem_name=preg_replace("#[^0-9a-z]#i","", $pageitem_name);
// $pageitem_variable=$_POST['pageitem_variable'];
// $pageitem_variable=preg_replace("#[^0-9a-z]#i","", $pageitem_variable);
// $pageitem_values=$_POST['pageitem_values'];

// mysqli_query($database,"INSERT INTO $page(item_name,item_variable,item_values)VALUES('$pageitem_name','$pageitem_variable','$pageitem_values')") ; 
// }

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

<form action="cms.php" method="post">
<input type="file" name="upload">
<button type="submit" name="form" value="upload">UPLOAD</button>
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
<button  type="submit" name="form" value="save" >save</button>
<h1>Search Page</h1>
<input type="text" name="search_page" placeholder="กรอกชื่อเพจเพื่อดูรายละเอียด">
<button  type="submit" name="form" value="search" >SEARCH PAGE</button>



<?php
  if(isset($_POST['form'])){
        if ($_POST['form'] == 'search') {
        if(isset($_POST['search_page']) && !empty($_POST['search_page'])){        
        $search_page=$_POST['search_page'];
        $search_page=preg_replace("#[^0-9a-z]#i","", $search_page);             
        $page_query=mysqli_query($database,"SELECT * from $search_page " );
        $count = mysqli_num_rows($page_query);
            if($count==0){
                echo "No have";
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
            $hero_image=($_POST['upload']) ; 
        mysqli_query($database,"UPDATE homepage set item_values = '$hero_image' where id like '4' ");
   }
    }
 ?>
  

</form>

</body>
</html>



