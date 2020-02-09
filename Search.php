<?php 

include "inc/Header.php";
?>
</div>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">


<div class="samepost clear">
<?php
$db=new Database();
$fm=new Format();

 if(!isset($_GET['search']) || $_GET['search']==NULL) {
               header("Location:404.php");
          }else{

            $search=$_GET['search'];

          }
            $query="SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body  LIKE '%$search%' ";
            $post=$db->select($query);
            if($post){
           while($result=$post->fetch_assoc()){
        ?>      
	<h2><a href="Post.php?id=<?php echo $result['id']; ?>"> <?php echo $result['title']; ?> </a></h2> 
	<h4> 
	 <?php echo $fm->FormatDate($result['date']); ?> By <a href="#"> <?php echo $result['author']; ?> </a></h4>
	 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
	
     <?php echo $fm->textshorten($result['body']) ; ?>
	
	<div class="readmore clear">
		<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
	</div>


			<?php 

          }
          	}else{
          		?>
      <p>No related Post found...</p>
          		
         <?php 	}
          
			?>



</div>


</div>
		

<?php include "inc/Sidebar.php"; ?>


</div>

<?php include "inc/Footer.php" ;?>

