<?php 
include('config.php');
include('db_helper.php');
$url="$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = "$_SERVER[REQUEST_URI]";
$actual_link_path=explode("/",$actual_link);
// if($actual_link == '/'){
//     include('navbar.php');
// }else{
//     include('navbar.php');
// }
if(!isset($_SESSION['username'])){
    include('login.php'); 
}else{
  include('navbar.php');  
}
?>

<html lang="en">
<head>
<title><?= $actual_link ?></title>
<link rel="stylesheet" href="bliud/css/navbar.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="bliud/css/login.css">
    <link rel="stylesheet" type="text/css" href="bliud/css/cms.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

</body>
</html>



