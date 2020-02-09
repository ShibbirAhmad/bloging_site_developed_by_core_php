     <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
		<tr>
			<th width="7%">Serial</th>
			<th width="13%">Title</th>
			<th width="10%">Catageroy</th>
			<th width="15%">Description</th>
			<th width="10%">Image</th>
			<th width="10%">tags</th>
			<th width="10%">author</th>
			<th width="10%">Date</th>
			<th width="15%">Action</th>


		</tr>
	</thead>
	<tbody>
		
<?php 
	  $query="SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category
      ON  tbl_post.cat = tbl_category.id
       ORDER BY tbl_post.title DESC"; 
    
    $post=$db->select($query);
    if($post){
    	$i=0;
    	while($result=$post->fetch_assoc())

    	{
    		$i++;
		  ?>
		<tr class="odd gradex">
			<td><?php echo $i; ?></td>
			<td><a href="Editpost.php?editpostid=<?php echo $result['id']; ?>"><?php echo $result['title'] ;?></a> </td>
			<td><?php echo $result['name'] ;?></td>
			<td><?php echo $fm->textshorten($result['body'],100) ;?></td>
			<td><img src="<?php echo $result['image'] ;?>" width="60px" height="40px"  /></td>
			<td><?php echo $result['tags'] ;?></td>
			<td><?php echo $result['author'] ;?></td>
			<td ><?php echo $fm->FormatDate($result['date'] );?></td>

			<td>

       <a href="Viewpost.php?viewpostid=<?php echo $result['id']; ?>">View</a>

         <?php  if(Session::get('userid') ==$result['userid'] || Session::get('userRole')=='1' ){ ?> 
			 ||
			<a href="Editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> ||

			<a onclick="return confirm('Are you sure to Delete');" href="Deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>   
      <?php }   ?>
		</td>
		</tr>
		<?php   	}
    } ?>


		</tbody>
				</table>
	
               </div>
            </div>
        </div>
  
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>

        <?php include "inc/Footer.php" ;
             ?>
        