   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New Post</h2>
          <div class="block">

<?php 

      if($_SERVER["REQUEST_METHOD"]=="POST" ){  
        echo "<script>window.location='inbox.php';</script>";
     }
 
 ?>
<?php if(!isset($_GET['viewmsgid']) && $_GET['viewmsgid']=NULL){
            header("Location:inbox.php");
           }
           else {
            $view_id=$_GET['viewmsgid'];
           }
           
        $query="SELECT * FROM tbl_contact WHERE id='$view_id' " ; 
          $message=$db->select($query);
          if($message){
         
            while($result=$message->fetch_assoc()){
             

            ?>       

     <form action="" method="post">

        <table class="form">
             <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $result['firstname'].''.$result['lastname']; ?>" readonly  class="medium" />
                </td>
            </tr>
       
        
            <tr>
                <td>
                    <label>Email</label>
                </td>
                <td>
                    <input value="<?php echo $result['email'] ; ?>" readonly name="email" />
                </td>
            </tr>
             <tr>
                <td>
                    <label>Date</label>
                </td>
                <td>
                    <input value="<?php echo $fm->FormatDate($result['date'] ); ?>" readonly  name="date" />
                </td>
            </tr>
            <tr>
                <td >
                    <label>Message</label>
                </td>
                <td>
                    <textarea readonly class="tinymce" name="message"> 
            <?php echo $result ['message']; ?>
                    </textarea>
                </td>
            </tr>

			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Ok" />
                </td>
            </tr>
        </table>
                    </form>
                <?php }} ?>
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
        