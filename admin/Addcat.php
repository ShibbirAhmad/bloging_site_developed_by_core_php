<?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php  

        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
      $adcat=$_POST['name'];
    $adcat=mysqli_real_escape_string($db->link,$adcat);
    if(empty($adcat)){
      echo "<span class='warning'>Field must not be empty!</span>";
    }else{
      $query="INSERT INTO tbl_category(name) VALUES('$adcat')";
      $name=$db->insert($query);
      if($name){
      echo "<span class='success'>Category inseted successfully..!</span>";
      }else{
      echo "<span class='warning'>Category isn't inseted..</span>";
      }
   

    }


  }

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>


       <?php include "inc/Footer.php" ;
           
      ?>