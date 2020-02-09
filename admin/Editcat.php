<?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <div class="grid_10">
		<?php

           if(!isset($_GET['catid']) && $_GET['catid']=NULL){
           	header("Location:Catlist.php");
           }else{ $id=$_GET['catid'];}
		 ?>
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
      $update_cat=$_POST['name'];
    $update_cat=mysqli_real_escape_string($db->link,$update_cat);
    if(empty($update_cat)){
      echo "<span class='warning'>Field must not be empty!</span>";
    }else{
      $query="UPDATE tbl_category SET name='$update_cat' WHERE id='$id' ";
      $name=$db->insert($query);
      if($name){
      echo "<span class='success'>Category updated successfully..!</span>";
      }else{
      echo "<span class='warning'>Category isn't updated..</span>";
      }
   

    }


  

   }            

?>
                 <form action="" method="post">
                 	<?php 
       $query="SELECT * FROM tbl_category WHERE id='$id' ORDER BY id DESC";
       $show_category=$db->select($query);
     	while($result=$show_category->fetch_assoc()){ ?>
              <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>

          <?php 	
           }

          

             ?>
                    </form>         

                     
                </div>
            </div>
        </div>


       <?php include "inc/Footer.php" ;
           
      ?>