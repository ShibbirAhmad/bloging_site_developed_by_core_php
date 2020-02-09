<?php include "lib/Database.php"; ?>
<?php include "config/config.php";
      include "helpers/Format.php";
      $db=new Database();
      $fm=new Format();
 ?>
<!DOCTYPE html>
<html>
<head>
  
  <?php 

if(isset($_GET['menuid'])) {
	$title_id=$_GET['menuid'];

	$query="SELECT * FROM tbl_page WHERE id='$title_id' ";
	$title=$db->select($query);
	if($title){
		while($result =$title->fetch_assoc()){
	
    
    ?> 
	<title><?php echo $result['name']; ?>-<?php echo TITLE; ?></title>

    <?php
		
} } }elseif (isset($_GET['id'])) {
		$post_id=$_GET['id'];

		$query="SELECT * FROM tbl_post WHERE id='$post_id' ";
	$post=$db->select($query);
	if($post){
		while($result =$post->fetch_assoc()){
	

    ?> 
	<title><?php echo $result['title']; ?>-<?php echo TITLE; ?></title>

    <?php
		
} } }
else {
	?>
<title><?php echo  $fm->title() ;?>-<?php echo TITLE; ?></title>

	<?php 
}


  ?>
	<?php include "script/meta.php"; ?>
	<?php include "script/css.php"; ?>
<?php include "script/js.php"; ?>




</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
     
			<div class="logo">
				  <?php 

        $query="SELECT * FROM tbl_title_slogan WHERE id='1' ";
        $selecting=$db->select($query);
        if($selecting){
            while($result=$selecting->fetch_assoc()){

         ?>
				<img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
				<h2><?php echo $result['name']; ?></h2>
				<p><?php echo $result['slogan'] ;?></p>
		   <?php }} ?>

		   	</div>
  
		</a>
		<div class="social clear">
			<div class="icon clear">
            <?php 
				 $query="SELECT * FROM tbl_social WHERE id='1' ";
        $selecting=$db->select($query);
        if($selecting){
            while($result=$selecting->fetch_assoc()){
                         
            	?>
				<a href="<?php echo $result['facebook'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['twiter'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['linkdin'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['google'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
          <?php 
         }  }

          ?>

			</div>
			<div class="searchbtn clear">
			<form action="Search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php $path=$_SERVER['SCRIPT_FILENAME'] ; 
          $current_page=basename($path, '.php');
	 ?>
	<ul>
	
       <li><a <?php if($current_page=='index'){ echo 'id="active"' ;} ?>
        href="index.php">Home</a></li>
		<?php	
        $query="SELECT * FROM tbl_page  ";
        $selecting=$db->select($query);
        if($selecting){
         
            while($result=$selecting->fetch_assoc()){
                
 ?>
		<li>
			<a  <?php if(isset($_GET['menuid']) && $_GET['menuid']==$result['id'])  
        {
        	echo 'id="active"';
        }
			?> href="Page.php?menuid=<?php echo $result['id'];  ?>"><?php echo $result ['name']; ?></a></li>

		<?php }} ?>
		<li><a  <?php if($current_page=='Contact'){ echo 'id="active"' ;} ?>
			href="Contact.php">Contact</a></li>
</div>

