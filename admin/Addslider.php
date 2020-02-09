   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New slide</h2>
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
move_uploaded_file($file_tmp, $uploaded_file);
if($file_name=="" || $title==""){

    echo "<span class='warning'>filed must not be empty! </span>";
}elseif($file_size>99255775023){

 echo "<span class='warning'>file size should be less than 3 MB </span>";
}
elseif(in_array($file_extn, $permited) == false ){

echo "<span class='warning'>file format should be:-".implode(',',$permited)."</span>";

}else
{


$query="INSERT INTO tbl_slide(title,image,link) 
VALUES('$title','$uploaded_file','$link')";
$inserted=$db->insert($query);
if($inserted){
  echo "<span class='success'>new slide inserted successfully.. </span>";
}else {
  echo "<span class='warning'>new slide isn't inserted.. </span>";
}





  }

}


           ?>

     <form action="" method="post" enctype="multipart/form-data">

        <table class="form">
                <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Enter slide Title..." class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input type="file" name="image" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Link</label>
                </td>
                <td>
                    <input type="text" name="link" placeholder="Enter slide link.." class="medium" />
                </td>
            </tr>
			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Save" />
                </td>
            </tr>
        </table>
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
        