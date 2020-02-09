   <?php include "inc/Header.php" ;
         include "inc/Sidebar.php";

      ?>
 <div class="grid_10">
		
     <?php 

      $userid=Session::get('userid');    
      $userrole=Session::get('userRole');

      ?>   <div class="box round first grid">
            <h2>Update Post</h2>
          <div class="block">

      <?php 


     if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
    $name=mysqli_real_escape_string($db->link, $_POST['name']);
    $username=mysqli_real_escape_string($db->link, $_POST['username']);
    $email=mysqli_real_escape_string($db->link, $_POST['email']);
    $details=mysqli_real_escape_string($db->link, $_POST['details']);
   
  

$query="UPDATE    user_table SET name='$name',username='$username',
details='$details',email='$email' WHERE role='$userrole' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'>user profile updated successfully.. </span>";
  
}else {
  echo "<span class='warning'>user profile isn't updated.. </span>";
}

}

 ?>

     <form action="" method="post" >
<?php

    $query = "SELECT * FROM     user_table WHERE id='$userid' AND role='$userrole' ";
     $userdata=$db->select($query);
     if ($userdata){   
    while ($result= $userdata->fetch_assoc()) {

 ?>
        <table class="form">
                      <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo $result ['name'];  ?>" class="medium" />
                </td>
            </tr>
         <tr>
                <td>
                    <label>username</label>
                </td>
                <td>
                    <input type="text" name="username" value="<?php echo $result ['username'];  ?>" class="medium" />
                </td>
            </tr>
        <tr>
                <td>
                    <label>Email</label>
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo $result['email'] ;?>" class="medium" />
                </td>
            </tr>    
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Details</label>
        </td>
        <td>
            <textarea class="tinymce" name="details">
     <?php echo $result ['details'];  ?>

             </textarea>
        </td>
    </tr>

	<tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Update" />
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
        