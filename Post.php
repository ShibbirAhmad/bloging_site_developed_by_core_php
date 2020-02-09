<?php include "inc/Header.php"; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

    <?php 

$db=new Database();
$fm=new Format();


          if(!isset($_GET['id']) || $_GET['id']==NULL) {
               header("Location:404.php");
          }else{

            $id=$_GET['id'];
          	$query="SELECT * FROM tbl_post WHERE id=$id";
          	$post=$db->select($query);
          	if($post){
           while($result=$post->fetch_assoc()){
              
         
    ?>
              
				<h2><?php echo $result['title']; ?></h2>
				<h4> 
				<p> <?php echo $fm->FormatDate($result['date']); ?> By</p> <a href="#"> <?php echo $result['author']; ?> </a></h4>
				<a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $result['body']; ?>

				
				<div class="relatedpost clear">

					<?php  
                 $ctg=$result ['cat'];
					 $query="SELECT * FROM tbl_post WHERE cat=$ctg";
          	$post=$db->select($query);
          	if($post){
           while($rresult=$post->fetch_assoc()){  
                
          
           	?>
					<h2>Related articles</h2>
					<a href="Post.php?id=<?php $rresult['id'];?>"><img src="admin/<?php echo $rresult['image'];?>" alt="post image"/></a>
          <?php  } }else{
          	echo "No related post available";
          } 
?>

				</div>


			<?php 

          }
          	}else{
          		header("Location:404.php");
          	}
          }
			?>
			
	</div>

		</div>
		<?php include "inc/Sidebar.php" ;?>

	</div>

	<?php include "inc/Footer.php" ; ?>