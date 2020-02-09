   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
            <div class="box round first grid">
              <?php if(isset($_GET['delid'])) {
                 $delete=$_GET['delid'];
                 $query="DELETE FROM    user_table WHERE id='$delete' ";
                 $del=$db->delete($query);
                  if($del){
      echo "<span class='success'>one user deleted successfully..!</span>";
      }else{
      echo "<span class='warning'>user isn't deleted.</span>";
      }
   

    }

              ?>
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
              <th>Name</th>
							<th>username</th>
              <th>Email</th>
              <th>Details</th>
              <th>Designation</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				            
				$query="SELECT * FROM     user_table ";
				$post=$db->select($query);

				if($post){
                         $i=0;
				while($result =$post->fetch_assoc()){
                     $i++;
                	?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name'];?></td>
              <td><?php echo $result['username'];?></td>
              <td><?php echo $result['email'];?></td>
              <td><?php echo $result['details'];?></td>
              <td><?php 
        if($result['role'] == '1'){
          echo "Admin";
        }else if($result['role'] == '3'){
          echo "Author";
        }elseif($result['role'] == '2'){
          echo "Editor";
        }

              ?> </td>

							<td><a href="Userview.php?userviewid=<?php echo $result['id'];?>">View</a>
             <?php    if(Session::get('userRole')=='1') { ?>
							 || <a  onclick="return confirm('Are you sure to Delete');" href="?delid=<?php echo $result['id'];?>">Delete</a></td> 

              <?php  }?>
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