   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">

      <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                       <?php 

    
        if($_SERVER["REQUEST_METHOD"]=="POST" ){  

            $copyright=$fm->validation($_POST['copyright']);
            $copyright=mysqli_real_escape_string($db->link, $copyright);
   
      
      if($copyright==""  ){
  
   echo "<span class='warning'>filed must not be empty! </span>"; 
   }else {
      

$query="UPDATE tbl_copyright SET copyright='$copyright' WHERE id='1' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'> copyright is updated successfully.. </span>";
}else {
  echo "<span class='warning'>copyright isn't updated.. </span>";
}

   }


}
        ?>
                    <?php 
        $query="SELECT * FROM tbl_copyright WHERE id='1' ";
        $selecting=$db->select($query);
        if($selecting){
            while($result=$selecting->fetch_assoc()){
 ?>
                 <form  action="Copyright.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="copyright" value="<?php echo $result['copyright'];?>" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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


      <?php include "inc/Footer.php" ;
           
      ?>
        