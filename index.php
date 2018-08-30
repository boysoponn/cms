<?php 
$actual_link = "$_SERVER[REQUEST_URI]";
$actual_link_path=explode("/",$actual_link);
$title=explode(".",$actual_link_path[1])
?>
<head>
<title><?= $title[0] ?></title>
<script src="bliud/js/main.js"></script>

</head>
<?php
include('./template/master.php');
?>
