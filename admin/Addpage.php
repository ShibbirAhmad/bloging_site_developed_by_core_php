   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New Page</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  

     $name=mysqli_real_escape_string($db->link, $_POST['name']);
      $body=mysqli_real_escape_string($db->link, $_POST['body']);
   


if($name=="" || $body=="" ){

    echo "<span class='warning'>filed must not be empty! </span>";
}else
{

$query="INSERT INTO tbl_page(name,body) 
VALUES('$name','$body')";
$inserted=$db->insert($query);
if($inserted){
  echo "<span class='success'>new page added successfully.. </span>";
}else {
  echo "<span class='warning'>new page isn't inserted.. </span>";
}





  }

}


           ?>

     <form action="Addpage.php" method="post" ">

        <table class="form">
                
            <tr>
                <td>
                    <label>Name</label>
                </td>
                <td>
                    <input type="text" name="name"  class="medium" />
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
        