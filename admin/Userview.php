   <?php include "inc/Header.php" ;
         include "inc/Sidebar.php";

      ?>
 <div class="grid_10">
		
     <?php 
   if(!isset($_GET['userviewid']) && $_GET['userviewid']==NULL )
    {
      header("Location:index.php");
    }else {
      $userid=$_GET['userviewid'];
    }
      ?> 

        <div class="box round first grid">
            <h2>Update Post</h2>
          <div class="block">

      <?php 


     if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
   echo "<script>window.location='Userlist.php' ; </script>" ;

}

 ?>

     <form action="" method="post" >
<?php

    $query = "SELECT * FROM     user_table WHERE id='$userid'";
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
                    <input type="text" readonly value="<?php echo $result ['name'];  ?>" class="medium" />
                </td>
            </tr>
         <tr>
                <td>
                    <label>username</label>
                </td>
                <td>
                    <input type="text" readonly value="<?php echo $result ['username'];  ?>" class="medium" />
                </td>
            </tr>
        <tr>
                <td>
                    <label>Email</label>
                </td>
                <td>
                    <input type="email" readonly value="<?php echo $result['email'] ;?>" class="medium" />
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
            <input type="submit" name="submit" Value="OK" />
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
        