   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New Post</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
     $cat=mysqli_real_escape_string($db->link, $_POST['cat']);
     $title=mysqli_real_escape_string($db->link, $_POST['title']);
     $body=mysqli_real_escape_string($db->link, $_POST['body']);
     $tags=mysqli_real_escape_string($db->link, $_POST['tags']);
     $author=mysqli_real_escape_string($db->link, $_POST['author']);
     $userid=mysqli_real_escape_string($db->link, $_POST['userid']);

$permited=array('jpg','png','jpeg','gif','pdf','dock');
$file_name=$_FILES['image']['name'];
$file_size=$_FILES['image']['size'];
$file_tmp=$_FILES['image']['tmp_name'];
$div=explode('.',$file_name);
$file_extn=strtolower(end($div));
$uniqe_file=substr(md5(time()), 0,10).'.'.$file_extn;
$uploaded_file="uploads/".$uniqe_file;
move_uploaded_file($file_tmp, $uploaded_file);
if($cat=="" || $title=="" || $body=="" || $tags=="" || $author=="" || $file_name==""){

    echo "<span class='warning'>filed must not be empty! </span>";
}elseif($file_size>99255775023){

 echo "<span class='warning'>file size should be less than 3 MB </span>";
}
elseif(in_array($file_extn, $permited) == false ){

echo "<span class='warning'>file format should be:-".implode(',',$permited)."</span>";

}else
{



$query="INSERT INTO tbl_post(title,cat,image,body,tags,author,userid) 
VALUES('$title','$cat','$uploaded_file','$body','$tags','$author','$userid')";
$inserted=$db->insert($query);
if($inserted){
  echo "<span class='success'>new post inserted successfully.. </span>";
}else {
  echo "<span class='warning'>new isn't inserted.. </span>";
}





  }

}


           ?>

     <form action="Addpost.php" method="post" enctype="multipart/form-data">

        <table class="form">
                      <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                </td>
            </tr>
         
            <tr>
                <td>
                    <label>Category</label>
                </td>
                <td>
                    <select id="select" name="cat">
                         <option>Select Category</option>
                         
                         <?php 
                $query="SELECT * FROM tbl_category ";
                $Category=$db->select($query);
                while ($result=$Category->fetch_assoc()){

               

                          ?>
                        <option value="<?php echo $result['id'];?>"><?php echo $result ['name'];?></option>
                       <?php  }?>
                    </select>
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
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea class="tinymce" name="body"> </textarea>
                </td>
            </tr>

           <tr>
                <td>
                    <label>Tags</label>
                </td>
                <td>
                    <input type="text" name="tags" placeholder="Enter related tags..." class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Author</label>
                </td>
                <td>
                    <input type="hidden" name="author" value="<?php echo Session::get('username'); ?>" class="medium" />

        <input type="hidden" name="userid" value="<?php echo Session::get('userid'); ?>" class="medium" />


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
        