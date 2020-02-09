     <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <style type="text/css">
            .leftside{float: left;width:80%;}
            .rightside{float: left;width:20%;}
            .rightside img {height:120px; width:150px;}

        </style>>
        <div class="grid_10">
		
     <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   

     $title=$fm->validation($_POST['title']);
     $slogan=$fm->validation($_POST['slogan']);
    $title=mysqli_real_escape_string($db->link, $_POST['title']);
     $slogan=mysqli_real_escape_string($db->link, $_POST['slogan']);
     


$permited=array('jpg','png','jpeg','gif');
$file_name=$_FILES['logo']['name'];
$file_size=$_FILES['logo']['size'];
$file_tmp=$_FILES['logo']['tmp_name'];
$div=explode('.',$file_name);
$file_extn=strtolower(end($div));
$uniqe_file=substr(md5(time()), 0,10).'.'.$file_extn;
$uploaded_file="uploads/".$uniqe_file;
if($title=="" || $slogan=="" || $file_name==""  ){
  
   echo "<span class='warning'>filed must not be empty! </span>"; }
   else{  

    if(!empty($file_name)){
 

 if($file_size>99255775023){

 echo "<span class='warning'>file size should be less than 3 MB </span>";
}
elseif(in_array($file_extn, $permited) == false ){

echo "<span class='warning'>file format should be:-".implode(',',$permited)."</span>";

}else
{
move_uploaded_file($file_tmp, $uploaded_file);

$query="UPDATE tbl_title_slogan SET name='$title',slogan='$slogan',logo='$uploaded_file' WHERE id='1' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'>title slogan updated successfully.. </span>";
}else {
  echo "<span class='warning'>title slogan isn't updated.. </span>";
}

  }


}else {
  
$query="UPDATE tbl_title_slogan SET name='$title',slogan='$slogan' WHERE id='1' ";
$updated=$db->update($query);
if($updated){
  echo "<span class='success'>title slogan updated successfully.. </span>";
}else {
  echo "<span class='warning'>title slogan isn't updated.. </span>";
}

}

}


}


           ?>



            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                
                <?php 
        $query="SELECT * FROM tbl_title_slogan WHERE id='1' ";
        $selecting=$db->select($query);
        if($selecting){
            while($result=$selecting->fetch_assoc()){

        

                ?>

                 <div class="leftside">
                 <form action="" method="POST" enctype="multipart/form-data">

                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['name']; ?>" 
                                   name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" 
                                name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						 <tr>
                            <td>
                                <label>Title Logo</label>
                            </td>
                            <td>
                                <input type="file"  name="logo" class="medium" />
                            </td>
                        
                        </tr>

						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
 <div class="rightside">
          <img src="<?php echo $result['logo'];?>" alt="logo"   />
</div>

<?php 
            }
        } ?>
                </div>
            </div>
        </div>


           <?php include "inc/Footer.php" ;
             ?>
        