	
<div class="slidersection templete clear">
        <div id="slider">
        	<?php 
        $query="SELECT * FROM tbl_slide  LIMIT 5 " ;
        $slide=$db->select($query);
        while ($result=$slide->fetch_assoc()) {
     
        

        	 ?>
            <a href="<?php echo $result['link']; ?>"><img src="admin/<?PHP echo $result['image']; ?>" alt="loading slide " title="<?PHP echo $result['title']; ?>" /></a>
            
        <?php } ?>
        </div>
