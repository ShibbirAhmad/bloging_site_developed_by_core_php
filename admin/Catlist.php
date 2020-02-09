   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
            <div class="box round first grid">
              <?php if(isset($_GET['delid'])) {
                 $delete=$_GET['delid'];
                 $query="DELETE FROM tbl_category WHERE id='$delete' ";
                 $del=$db->delete($query);
                  if($del){
      echo "<span class='success'>Category deleted successfully..!</span>";
      }else{
      echo "<span class='warning'>Category isn't deleted.</span>";
      }
   

    }

              ?>
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				            
				$query="SELECT * FROM tbl_category ";
				$post=$db->select($query);

				if($post){
                         $i=0;
				while($result =$post->fetch_assoc()){
                     $i++;
                	?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="Editcat.php?catid=<?php echo $result['id'];?>">Edit</a>
							 || <a  onclick="return confirm('Are you sure to Delete');" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php }  } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
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