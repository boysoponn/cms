<?php
// สำหรับดึงด้วย item_variable เท่านั้น
function get_select($table,$item_variable){
    $connect=new mysqli('localhost', 'root','','sopon');
    $query= mysqli_query($connect,"SELECT * from $table where item_variable like '$item_variable'");
    $row = mysqli_fetch_array($query);
    $item = $row['item_values'];
    return $item;
}
?>