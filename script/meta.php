
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php 
    if(isset($_GET['id'])){
        $post_id=$_GET['id'];

        $query="SELECT * FROM tbl_post WHERE id ='$post_id' " ;
        $key=$db->select($query);
        if($key){
        	while($result=$key->fetch_assoc()) {
      ?>
      <meta name="keywords" content="<?php echo $result['tags'] ; ?>">
      <?php 
        	}
        }else {
    ?>
        	<meta name="keywords" content="<?php echo KEYWORDS ; ?>">
    <?php    }
    }
 
	?>
	
	<meta name="author" content="Delowar">