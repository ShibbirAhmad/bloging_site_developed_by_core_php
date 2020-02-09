   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
       <?php

if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == 'NULLL'){
    echo "<script> window.location='Postlist.php'; </script>";
}else{
    $edit_id=$_GET['viewpostid'];
}

 ?> <div class="grid_10">
    
            <div class="box round first grid">
            <h2>View Post</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
  echo "<script> window.location='Postlist.php'; </script>"; 

}


           ?>

     <form action="" method="post" >
<?php

     $query="SELECT * FROM tbl_post WHERE id='$edit_id'  " ; 
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
                    <input type="text" readonly name="title" value="<?php echo $presult ['title'];  ?>" class="medium" />
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
       

                <option 

 <?php   
      if($presult['cat'] == $result['id']){
          ?>
              selected="selected"
          <?php 
      }

        ?>
                value="<?php echo $result['id'];?>"><?php echo $result ['name'];?></option>
               <?php  }?>
            </select>
        </td>
    </tr>


    <tr>
        <td>
            <label>Image</label>
        </td>
        <td>

       <img src="<?php echo $presult['image'];?>" height="80px" width="200px" />     

        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
     <?php echo $presult ['body'];  ?>

             </textarea>
        </td>
    </tr>

   <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
            <input type="text" name="tags" value=" <?php echo $presult ['tags'];  ?>" class="medium" />
        </td>
    </tr>

    <tr>
        <td>
            <label>Author</label>
        </td>
        <td>
            <input type="text" readonly name="author" value=" <?php echo $presult ['author'];  ?>" class="medium" />


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
        