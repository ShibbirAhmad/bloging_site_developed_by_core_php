<?php include "../lib/Session.php"; 
  
  Session::cheackSession();

?>
<?php include "../lib/Database.php"; ?>
<?php include "../config/config.php";


      $db=new Database();



if(!isset($_GET['delpostid']) || $_GET['delpostid'] == 'NULLL'){
    echo "<script> window.location='Postlist.php'; </script>";
}else{
    $delete_id=$_GET['delpostid'];



   $query="SELECT * FROM tbl_post where id='$delete_id' ";
   $selecting=$db->select($query);
    if($selecting) {
    	while ($selected=$selecting->fetch_assoc()){
    		$unlinkimg=$selected['image'];
           unlink($unlinkimg);
    	}
    }

   $query="DELETE FROM tbl_post WHERE id='$delete_id' ";
   $deleting=$db->delete($query);
   if($deleting){
   	echo "<script> alert('post deleted successfully...'); </script>";
   	 echo "<script> window.location='Postlist.php'; </script>";
   }else {
   	        echo "<script> alert('post isn't deleted ...'); </script>";
   	 echo "<script> window.location='Postlist.php'; </script>";
   }

}


















      
 ?>