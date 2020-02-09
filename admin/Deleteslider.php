<?php include "../lib/Session.php"; 
  
  Session::cheackSession();

?>
<?php include "../lib/Database.php"; ?>
<?php include "../config/config.php";


      $db=new Database();



if(!isset($_GET['delsliderid']) || $_GET['delsliderid'] == NULL){
    echo "<script> window.location='index.php'; </script>";
}else{
    $delete_id=$_GET['delsliderid'];
}
   $query="DELETE FROM tbl_page WHERE id='$delete_id' ";
   $deleting=$db->delete($query);
   if($deleting){
   	echo "<script> alert('slider  deleted successfully...'); </script>";
   	 echo "<script> window.location='index.php'; </script>";
   }else {
   	        echo "<script> alert('slide isn't deleted ...'); </script>";
   	 echo "<script> window.location='index.php'; </script>";
   }




















      
 ?>