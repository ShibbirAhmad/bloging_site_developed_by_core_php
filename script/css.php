<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<?php 

 $query="SELECT * FROM tbl_theame WHERE id='1' ";
       $show_theame=$db->select($query);
     	while($result=$show_theame->fetch_assoc()){
     	if($result['theame']== 'default') { 
    ?>
   <link rel="stylesheet"  href="theame/Default.css" >
  <?php 	}elseif($result['theame']== 'black'){?> 
   <link rel="stylesheet"  href="theame/black.css" >
  <?php } elseif($result['theame']== 'green'){ ?>
  <link rel="stylesheet"  href="theame/Green.css" >


   <?php } }?>

      
