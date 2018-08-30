<?php 
    if (isset($_POST['title']) && !empty($_POST['title'])){
          $hero_title=$_POST['title'];
          mysqli_query($connect,"UPDATE homepage set item_values = '$hero_title' where item_name like 'title'");
    }
    if (isset($_POST['description']) && !empty($_POST['description'])){
          $hero_description=$_POST['description'];
          mysqli_query($connect,"UPDATE homepage set item_values = '$hero_description' where item_name like 'description'");
    }   
    if (isset($_FILES['uploaded_file']) && !empty($_FILES['uploaded_file'])){
          $hero_image=$_FILES['uploaded_file']['name'] ;
          $path = "uploads/";
          $path = $path . basename( $_FILES['uploaded_file']['name']);
          move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path);
          mysqli_query($connect,"UPDATE homepage set item_values = '$hero_image' where item_name like 'image' "); 
    }

?>

<div class="content">
<?php include('a.php'); ?>
</div>
<div class="headbar_menu">
  <li><button id="logout" value="logout">LOGOUT</button></li>
 
  <li>welcome : <?php echo $_SESSION['username'] ?> </li>
</div>

<ul class="sidebar-menu">
    <li><span class="nav-section-title"></span></li>
    <li class="have-children">
      <a id="hero" href="#" ><span class="fa fa fa-folder"></span>Hero</a>
        <div id="content_hero"class="cms_form" action="" method="post" enctype="multipart/form-data"> 
          <div  class="form-group-cms">
            <input type="text" class="form-cms" name="title" id="title">
            <label> Title</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <input type="text" class="form-cms" name="description" id="description">
            <label>description</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <label class="image_label">Image</label>
            <button class="input-file">
              <input type="file" id="file-input"/>
              <label for="file-input">UPLOAD</label>
            </button>
          </div>
          <button class="save" id = "formsubmit" name="save" value="save" >Save</button><br>  
        </div>  
    </li>
    <li class="have-children">
      <a href="#"><span class="fa fa fa-folder"></span>Intro</a>
        <div class="cms_form" action="" method="post" enctype="multipart/form-data"> 
          <div class="form-group-cms">
            <input type="text" class="form-cms" name="title" id="title">
            <label> Title</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <input type="text" class="form-cms" name="description" id="description">
            <label>description</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <label class="image_label">Image</label>
            <button class="input-file">
              <input type="file" id="file-input"/>
              <label for="file-input">UPLOAD</label>
            </button>
          </div>
          <button class="save" id = "formsubmit" name="save" value="save" >Save</button><br>  
        </div>  
    </li>
    <li class="have-children">
      <a href="#"><span class="fa fa fa-folder"></span>Highlight</a>
        <div class="cms_form" action="" method="post" enctype="multipart/form-data"> 
          <div class="form-group-cms">
            <input type="text" class="form-cms" name="title" id="title">
            <label> Title</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <input type="text" class="form-cms" name="description" id="description">
            <label>description</label>
            <div class="input-border"></div>
          </div>
          <div class="form-group-cms">
            <label class="image_label">Image</label>
            <button class="input-file">
              <input type="file" id="file-input"/>
              <label for="file-input">UPLOAD</label>
            </button>
          </div>
          <button class="save" id = "formsubmit" name="save" value="save" >Save</button><br>  
        </div>  
    </li>
  </ul> 
