   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <?php   
        if(!isset($_GET['replyid']) || $_GET['replyid']==NULL){
          echo "<script>window.location='inbox.php';</script>";
        }else {
            $replyid=$_GET['replyid'];
        }

                    ?>
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New Post</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
    $to= $fm->validation($_POST['to']);  
    $from=$fm->validation($_POST['from']);
    $subject= $fm->validation($_POST['subject']);
    $message=$fm->validation($_POST['message']);
    $sendmail=mail($to, $subject, $message,$from) ;   
   if ($sendmail) {
        echo "<span class='warning'>email sent successfully...</span>";
   }else{
     echo "<span class='warning'>email isn't send...</span>";
   }
  }




           ?>

     <form action="" method="post" >

        <table class="form">
           <?php 
    $query="SELECT * FROM tbl_contact WHERE id='$replyid' " ; 
          $message=$db->select($query);
          if($message){
         
            while($result=$message->fetch_assoc()){
             


            ?><tr>
            
                <td>
                    <label>To</label>
                </td>
                <td>
                    
                    <input type="email" readonly name="to" value="<?php echo $result['email']; ?>" class="medium" />
                </td>

            </tr>
         <?php }} ?>

           <tr>
                <td>
                    <label>From</label>
                </td>
                <td>
                    <input type="email" name="from"  class="medium" />
                </td>
            </tr>


           <tr>
                <td>
                    <label>Subject</label>
                </td>
                <td>
                    <input type="text" name="subject"  class="medium" />
                </td>
            </tr>
           
            <tr>
                <td>
                    <label>Message</label>
                </td>
                <td>
                    <textarea class="tinymce" name="message"> </textarea>
                </td>
            </tr>

			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Send" />
                </td>
            </tr>
        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
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
        