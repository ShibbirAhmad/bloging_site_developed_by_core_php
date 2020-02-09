<?php include "../lib/Session.php"; 
  
  Session::cheackSession();

?>
<?php include "../lib/Database.php"; ?>
<?php include "../config/config.php";


      $db=new Database();



if(!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL){
    echo "<script> window.location='index.php'; </script>";
}else{
    $delete_id=$_GET['delpageid'];
}
   $query="DELETE FROM tbl_page WHERE id='$delete_id' ";
   $deleting=$db->delete($query);
   if($deleting){
   	echo "<script> alert('page deleted successfully...'); </script>";
   	 echo "<script> window.location='index.php'; </script>";
   }else {
   	        echo "<script> alert('page isn't deleted ...'); </script>";
   	 echo "<script> window.location='index.php'; </script>";
   }




















      
 ?>