     <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        

        <div class="grid_10">
            <div class="box round first grid">
                <h2>slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
		<tr>
			<th width="7%">Serial</th>
			<th width="13%">Title</th>
			<th width="10%">Image</th>
			<th width="10%">link</th>
			<th width="15%">Action</th>


		</tr>
	</thead>
	<tbody>
		
<?php 
	  $query="SELECT * FROM tbl_slide  "; 
    
    $post=$db->select($query);
    if($post){
    	$i=0;
    	while($result=$post->fetch_assoc())

    	{
    		$i++;
		  ?>
		<tr class="odd gradex">
			<td><?php echo $i; ?></td>
			
			<td><?php echo $result['title'] ;?></td>

			<td><img src="<?php echo $result['image'] ;?>" width="60px" height="40px"  /></td>
		
           <td><?php echo $result['link'] ;?></td>

			<td>

         <?php  if(Session::get('userRole')=='1' ){ ?> 
			<a href="Editslider.php?editslideid=<?php echo $result['id']; ?>">Edit</a> ||

			<a onclick="return confirm('Are you sure to Delete');" href="Deleteslider.php?delsliderid=<?php echo $result['id']; ?>">Delete</a>   
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
        