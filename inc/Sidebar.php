<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php

					$db=new Database();
$fm=new Format();


			$query="SELECT * FROM tbl_category ";
          	$post=$db->select($query);
          	if($post){
           while($result=$post->fetch_assoc()){
              ?>
						<li><a href="Posts.php?category=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>

			<?php } } else { ?>					
                  <li><a href="#">No category created</a></li>

              <?php } ?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
                <div class="popular clear">

                	<?php $query="SELECT * FROM tbl_post LIMIT 5";
          	              $post=$db->select($query);
          	 if($post){
           while($result=$post->fetch_assoc()){
              ?>
         
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				
		         <?php echo $fm->textshorten($result['body'],125) ; ?>
				
				<?php } } else { header("Location:404.php");} ?>
					</div>
					
	
			</div>
			
		</div>
