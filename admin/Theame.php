<?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>change theame</h2>
               <div class="block copyblock"> 
                <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
      $theame=$_POST['theame'];

    $update_theame=mysqli_real_escape_string($db->link,$theame);
    
      $query="UPDATE tbl_theame SET theame='$update_theame' WHERE id='1' ";
      $name=$db->update($query);
      if($name){
      echo "<span class='success'>theame updated successfully..!</span>";
      }else{
      echo "<span class='warning'>theame isn't updated..</span>";
      }
  

   }            

?>
                 <form action="" method="post">
                 	<?php 
       $query="SELECT * FROM tbl_theame WHERE id='1' ";
       $show_theame=$db->select($query);
     	while($result=$show_theame->fetch_assoc()){ ?>
              <table class="form">					
                <tr>
                    <td>
                        <input <?php if($result ['theame'] =='Default') { echo "checked" ; } ?> type="radio" name="theame" value="Default" class="medium" /> Default
                    </td>
                </tr>

                <tr>
                            <td>
                                <input <?php if($result ['theame'] =='black'){echo "checked" ; } ?>  type="radio" name="theame" value="black" class="medium" /> Dark
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input <?php if($result ['theame'] =='green'){echo "checked" ; } ?>  type="radio" name="theame" value="green" class="medium" /> Green
                            </td>
                        </tr>
		<tr> 
                <td>
                    <input type="submit" name="submit" Value="change" />
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