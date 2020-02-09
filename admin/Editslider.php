   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
       <?php

if(!isset($_GET['editslideid']) || $_GET['editslideid'] == 'NULLL'){
    echo "<script> window.location='sliderlist.php'; </script>";
}else{
    $edit_id=$_GET['editslideid'];
}

 ?> <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Update Slide</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
    $title=mysqli_real_escape_string($db->link, $_POST['title']);
     $link=mysqli_real_escape_string($db->link, $_POST['link']);


$permited=array('jpg','png','jpeg','gif','pdf','dock');
$file_name=$_FILES['image']['name'];
$file_size=$_FILES['image']['size'];
$file_tmp=$_FILES['image']['tmp_name'];
$div=explode('.',$file_name);
$file_extn=strtolower(end($div));
$uniqe_file=substr(md5(time()), 0,10).'.'.$file_extn;
$uploaded_file="uploads/slideshow/".$uniqe_file;
if($link=="" || $title=="" ){
  
   echo "<span class='warning'>filed must not be empty! </span>"; }
   else{  

    if(!empty($file_name)){
 

 if($file_size>99255775023){

 echo "<span class='warning'>file size should be less than 3 MB </span>";
}
elseif(in_array($file_extn, $permited) == false ){

echo "<span class='warning'>file format should be:-".implode(',',$permited)."</span>";

}else
{
move_uploaded_file($file_tmp, $uploaded_file);

$query="UPDATE tbl_slide SET title='$title',link='$link',image='$uploaded_file'
 WHERE id='$edit_id' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'> slide updated successfully.. </span>";
}else {
  echo "<span class='warning'>slide isn't updated.. </span>";
}

  }


}else {
  

$query="UPDATE tbl_slide SET title='$title',link='$link'
WHERE id='$edit_id' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'> slide updated successfully.. </span>";
}else {
  echo "<span class='warning'>slide isn't updated.. </span>";
}

}

}


}


           ?>

     <form action="" method="post" enctype="multipart/form-data">
<?php

     $query="SELECT * FROM tbl_slide WHERE id='$edit_id' ORDER BY id DESC " ; 
     $edit_post=$db->select($query);
     if($edit_post)
{
    while ($presult=$edit_post->fetch_assoc()) {

 ?>
        <table class="form">
                      <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $presult ['title'];  ?>" class="medium" />
                </td>
            </tr>
           <tr>
                <td>
                    <label>Link</label>
                </td>
                <td>
                    <input type="text" name="link" value="<?php echo $presult ['link'];  ?>" class="medium" />
                </td>
            </tr>
    <tr>
        <td>
            <label>Upload slide</label>
        </td>
        <td>

       <img src="<?php echo $presult['image'];?>" height="80px" width="200px" />     
            <input type="file" name="image" />
        </td>
    </tr>
    
	<tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Save" />
        </td>
    </tr>
        </table>
                
                <?php         
    }
} ?>

                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>

 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->

       <?php include "inc/Footer.php" ;
           ?>
        