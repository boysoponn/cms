<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="navbar">
    <a href="register.php">register</a>
    <a class="topic" href="cms.php">cms</a>
    <a href="create_control.php">control</a>
    <a href="create_template.php">template</a>
    <a href="create_page.php">page</a>
    <!-- <div class="detail">
        <?php   
        $get_table_query = mysqli_query($connect,"SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE'AND TABLE_NAME != 'id' AND TABLE_SCHEMA='sopon'"); 
        while($row = mysqli_fetch_array($get_table_query)){           
            $table_name = $row['TABLE_NAME']; ?>
         <a href=""><?=$table_name ?></a>         
        <?php } ?>
    </div> -->
</div>
</body>
</html>