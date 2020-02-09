     <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		<?php 

    
        if($_SERVER["REQUEST_METHOD"]=="POST" ){  

            $facebook=$fm->validation($_POST['facebook']);
            $twiter=$fm->validation($_POST['twiter']);

           $linkdin=$fm->validation($_POST['linkdin']);

           $google=$fm->validation($_POST['google']);

   
    $facebook=mysqli_real_escape_string($db->link, $facebook);
     $twiter=mysqli_real_escape_string($db->link, $twiter);
      $linkdin=mysqli_real_escape_string($db->link, $linkdin);
       $google=mysqli_real_escape_string($db->link, $google);
      
      if($facebook=="" || $twiter=="" || $linkdin=="" || $google=="" ){
  
   echo "<span class='warning'>filed must not be empty! </span>"; 
   }else {
      

$query="UPDATE tbl_social SET facebook='$facebook',twiter='$twiter',
linkdin='$linkdin',google='$google' WHERE id='1' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'> social link updated successfully.. </span>";
}else {
  echo "<span class='warning'>socail link isn't updated.. </span>";
}

   }


}
        ?>
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block"> 

                <?php 
        $query="SELECT * FROM tbl_social WHERE id='1' ";
        $selecting=$db->select($query);
        if($selecting){
            while($result=$selecting->fetch_assoc()){
 ?>            
                 <form action="Social.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $result['facebook'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twiter" value="<?php echo $result['twiter'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkdin" value="<?php echo $result['linkdin'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="google" value="<?php echo $result['google'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>


           <?php include "inc/Footer.php" ;
            
      ?>
        