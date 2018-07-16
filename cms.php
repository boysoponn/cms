<?php
include('config.php');



// if(isset($_POST['page']) && !empty($_POST['page'])){
//     $page=$_POST['page'];
//     $page=preg_replace("#[^0-9a-z]#i","", $page);
//     mysqli_query($database,"CREATE TABLE $page (id int NULL AUTO_INCREMENT PRIMARY KEY,item_name varchar(255),variable_name varchar(255),item_values varchar(255))") ;
// }



// if(isset($_POST['pageitem_name']) && !empty($_POST['pageitem_name'])&&isset($_POST['pageitem_variable']) && !empty($_POST['pageitem_variable'])&&isset($_POST['pageitem_values']) && !empty($_POST['pageitem_values'])){
// $pageitem_name=$_POST['pageitem_name'];
// $pageitem_name=preg_replace("#[^0-9a-z]#i","", $pageitem_name);
// $pageitem_variable=$_POST['pageitem_variable'];
// $pageitem_variable=preg_replace("#[^0-9a-z]#i","", $pageitem_variable);
// $pageitem_values=$_POST['pageitem_values'];

// mysqli_query($database,"INSERT INTO $page(item_name,variable_name,item_values)VALUES('$pageitem_name','$pageitem_variable','$pageitem_values')") ; 
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
<h1>CREATE PAGE</h1>
<input type="text" name="search_page">
<button  type="submit" name="form" value="search" >SEARCH PAGE</button>

<?php
$search_page = $_POST['search_page'];
if(isset($_POST['form'])){
    if(isset($_POST['search_page']) && !empty($_POST['search_page'])){
    
        if ($_POST['form'] == 'search') {
        $search_page=$_POST['search_page'];
        $search_page=preg_replace("#[^0-9a-z]#i","", $search_page);
        $page_query=mysqli_query($database,"SELECT * from $search_page " );
        $count = mysqli_num_rows($page_query);
            if($count==0){
                echo "No have";
            }else{
            while($row = mysqli_fetch_array($page_query)){
                $all_item_values = $row['item_values']; 
                $all_item_name = $row['item_name'];?>
                <h1><?=$all_item_name?></h1>
                <input type="text" name="<?php echo $row['item_name']; ?>"value="<?=$all_item_values?>">
                <!-- <textarea name="pageitem_values" cols="50" rows="5"values=""><?=$all_item_values?></textarea> -->
            <?php             
            } 
            }  
        }
    }
} 
   if (isset($_POST['ss'])) {
           echo( $search_page);
  
    $pageitem_values=$_POST['pageitem_values'];
    mysqli_query($database,"UPDATE $search_page  SET item_values = $pageitem_values  ") ; 
    
     } ?>
    <button  type="submit" name="ss" value="save" >save</button>

    <?php 
    
    
    
    
  

?>
</form>

</body>
</html>



<!-- <h1>CREATE ITEM</h1>
<div id="form_new_item">
<p>Item name</p>
<input type="text" name="pageitem_name">
<p>variable name</p>
<input type="text" name="pageitem_variable">
<p>input value</p>
<textarea name="pageitem_values" cols="30" rows="10"></textarea>
<button type="submit" name="create_item" >SUBMIT</button> 
</div> -->
