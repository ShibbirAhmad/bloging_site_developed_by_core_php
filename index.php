
<?php 

include "inc/Header.php";
?>
<?php include "inc/Slider.php"; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

 <!--pagination -->

 <?php 
 
$db=new Database();
$fm=new Format();

  $per_page=3;
if(isset($_GET['page'])){
 
 $page=$_GET['page'];
   

}else{
	$page=1;
}
$start_page=($page-1)*$per_page;


$query="SELECT * FROM tbl_post LIMIT  $start_page, $per_page";
$post=$db->select($query);

if($post){

while($result =$post->fetch_assoc()){


 ?>

			<div class="samepost clear">

				<h2><a href="Post.php?id=<?php echo $result['id']; ?>"> <?php echo $result['title']; ?> </a></h2> 
				<h4> 
				<p><?php echo $fm->FormatDate($result['date']); ?> By </p> <a href="#"> <?php echo $result['author']; ?> </a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				
		         <?php echo $fm->textshorten($result['body']) ; ?>
				
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>

			<?php } ?><!-- while loop end here -->
<!--pagination-->
     
<?php } else { header("Location:404.php");} ?>

<?php
 
   $query="SELECT * FROM tbl_post  ";
   $result=$db->select($query);
   $total_row=mysqli_num_rows($result);
   $total_page=ceil($total_row/$per_page);




 echo "<span style='display:block;text-align:center;font-size:18px;margin-top:10px;padding:5px;' > <a href='index.php?page=1'>". 'First page' ."</a>";
                for($i=1; $i<=$total_page; $i++){

                echo "<a href='index.php?".$i."'>".$i."</a> " ;
                }
         echo "<a href='index.php?page=$total_page'>".'Last page'." </a></span>" ;?>

 <!--pagination -->

</div>
	
				
		</div>
		<?php include "inc/Sidebar.php"; ?>
			</div>
<?php include "inc/Footer.php" ;?>

