   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
<style>

.deldiv{}
.deldiv a {border: 1px solid #ddd;
color:red;
cursor: pointer;
font-size: 18px;
padding: 2px 10px;}

</style> 
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Update Page</h2>
          <div class="block">

           <?php 

if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
    echo "<script> window.location='index.php'; </script>";
}else{
    $page_id=$_GET['pageid'];
}


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  

     $name=mysqli_real_escape_string($db->link, $_POST['name']);
      $body=mysqli_real_escape_string($db->link, $_POST['body']);
   


if($name=="" || $body=="" ){

    echo "<span class='warning'>filed must not be empty! </span>";
}else
{

$query="UPDATE tbl_page  SET name='$name' , body='$body' WHERE id='$page_id' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'>page updated successfully.. </span>";
}else {
  echo "<span class='warning'>page isn't updated.. </span>";
}





  }

}


           ?>

     <form action="" method="post" ">
    <?php 

        $query="SELECT * FROM tbl_page WHERE id='$page_id' ";
        $selecting=$db->select($query);
        if($selecting){
         
            while($result=$selecting->fetch_assoc()){
                
 ?>
   
        <table class="form">
                
            <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>"  class="medium" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Content</label>
                </td>
                <td>
                    <textarea class="tinymce" name="body"> 
                  <?php echo $result['body']; ?>

                    </textarea>
                </td>
            </tr>

           
        <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="update" />
                    <span class="deldiv"><a  onclick="return confirm('Are you sure to Delete');"  href="Delpage.php?delpageid=<?php echo $result ['id'] ;?>" >Delete </a></span>
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
        