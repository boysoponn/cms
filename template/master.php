<?php 
include('config.php');
// include('navbar.php');
$url="$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = "$_SERVER[REQUEST_URI]";
$actual_link_path=explode("/",$actual_link);
if($actual_link == '/'){
    include('cms.php'); 
}else{
    include($actual_link_path[1]);
}
if(!isset($_SESSION['username'])&&$actual_link !== '/register.php'){
    include('login.php'); 
}
?>

<html lang="en">
<head>
<title><?= $actual_link ?></title>
    <!-- <link rel="stylesheet" href="bliud/css/register.css">
    <link rel="stylesheet" href="bliud/css/navbar.css"> -->
    <link rel="stylesheet" href="bliud/css/login.css">
    <!-- <link rel="stylesheet" type="text/css" href="bliud/css/cms.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

</body>
</html>



