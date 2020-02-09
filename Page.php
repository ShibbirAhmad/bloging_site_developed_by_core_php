<?php include "inc/Header.php"; ?>

<?php

if(!isset($_GET['menuid']) || $_GET['menuid'] == NULL){
    echo "<script> window.location='index.php'; </script>";
}else{
    $menuid=$_GET['menuid'];
}

  ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
	<?php		
        $query="SELECT * FROM tbl_page WHERE id='$menuid' ";
        $selecting=$db->select($query);
        if($selecting){
         
            while($result=$selecting->fetch_assoc()){ 

            	?>
			<div class="about">
				<h2><?php echo  $result ['name']; ?></h2>
	
				<p><?php echo $result ['body'] ;?></p>
				
	</div>
	<?PHP }} ?>

		</div>
		
<?php include "inc/Sidebar.php"; ?>

	</div>

<?php include "inc/Footer.php"; ?>
