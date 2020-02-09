 <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        <div class="grid_10">
            <div class="box round first grid">
            							<?php  if(isset($_GET['seenid'])) {
                               $seenid=$_GET['seenid'];

             $query="UPDATE tbl_contact  SET status='1'  WHERE id='$seenid' ";
             $sending=$db->update($query);
             if($sending) {
             	echo "<span class='success'> message sent to seenbox  </span>";
             }else {
           echo "<span class='warning'> something went wrong!  </span>";
             }

			}elseif (isset($_GET['rseenid'])) {
			   $rseenid=$_GET['rseenid'];

             $query="UPDATE tbl_contact  SET status='0'  WHERE id='$rseenid' ";
             $sending=$db->update($query);
             if($sending) {
             	echo "<span class='success'> message sent to inbox  </span>";
             }else {
           echo "<span class='warning'> something went wrong!  </span>";
             }# code...
						}else {} ?>


                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	<?php $query="SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC " ; 
          $message=$db->select($query);
          if($message){
          	$i=0;
          	while($result=$message->fetch_assoc()){
          		$i++;
         

	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'] ;?></td>
							<td><?php echo $result ['email'] ;?></td>
							<td><?php echo $fm->textshorten($result['message'],30) ; ?></td>
							<td><?php echo $fm->FormatDate($result['date']); ?></td>
							<td><a href="Viewmsg.php?viewmsgid=<?php echo $result ['id'] ;?>">View</a> || 
								<a href="Replymsg.php?replyid=<?php echo $result ['id'] ;?>">Reply</a> ||
								<a  onclick="return confirm('Are you sure  to send ');"  href="?seenid=<?php echo $result ['id'] ;?>"> Seen</a>   </td>
						</tr>
     <?php  }} ?>

			
					
					</tbody>
				</table>
               </div>
            </div>


  <div class="box round first grid">

                <h2>seen box</h2>
                <div class="block"> 
                <?php if(isset($_GET['delmsgid'])) {
                 $delmsgid=$_GET['delmsgid'];
                 $query="DELETE FROM tbl_contact WHERE id='$delmsgid' ";
                 $del=$db->delete($query);
                  if($del){
      echo "<span class='success'>message deleted successfully..!</span>";
      }else{
      echo "<span class='warning'>message isn't deleted.</span>";
      }
   

    }

              ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


	<?php $query="SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC " ;
          $message=$db->select($query);
          if($message){
          	$i=0;
          	while($result=$message->fetch_assoc()){
          		$i++;
         

	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].' '.$result['lastname'] ;?></td>
							<td><?php echo $result ['email'] ;?></td>
							<td><?php echo $fm->textshorten($result['message']); ?></td>
							<td><?php echo $fm->FormatDate($result['date']); ?></td>
                            <td><a onclick="return confirm('Are you sure  to send seen ');" href="?rseenid=<?php echo $result ['id'] ;?>">unseen</a> 
								   </td>
							<td><a onclick="return confirm('Are you sure  to send ');" href="?delmsgid=<?php echo $result ['id'] ;?>">Delete</a> 
								   </td>
						</tr>
     <?php  }}?>

			
					
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


     <?php
            include "inc/Footer.php";
      ?>