<?php include "inc/Header.php"; ?>
<style>
	.warning{
		font-size:20px;font-style:italic;font-family: sans-serif;color:red;
	}
	.success{

		font-size:20px;font-style:italic;font-family: sans-serif;color:green;
	}
</style>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

         <?php  

        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
   
       $firstname=$fm->validation($_POST['firstname']);
       $lastname=$fm->validation($_POST['lastname']);
       $email=$fm->validation($_POST['email']);
       $message=$fm->validation($_POST['message']);

      $firstname=mysqli_real_escape_string($db->link, $firstname);
      $lastname=mysqli_real_escape_string($db->link, $lastname);
      $email=mysqli_real_escape_string($db->link, $email);
      $message=mysqli_real_escape_string($db->link, $message);
      
if($firstname=="" || $lastname=="" || $email=="" || $message==""){

	echo "<span class='warning'>filed must not be empty! </span>";
}
elseif(empty($firstname)) {
         echo "<span class='warning'>First name must not be empty! </span>";
}elseif(empty($lastname)) {
         echo "<span class='warning'>Last name must not be empty! </span>";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          echo "<span class='warning'>Email addres isn't valid! </span>";
}elseif(empty($message)) {

}
else {
   
   $query="INSERT INTO tbl_contact (firstname,lastname,email,message) VALUES ('$firstname','$lastname','$email','$message')" ;
   $inserting=$db->insert($query);
   if($inserting){
   	echo "<span class='success'>Message sent successfully.... </span>";
   }else {
   	echo "<span class='warning'>Message isn't send </span>";
   }

}
   }      ?>
			<div class="about">
				<h2>Contact us</h2>
			<form action="Contact.php" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"  />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name"   />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="message" >  </textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		
   <?php include "inc/Sidebar.php"; ?>

	</div>

	<?php include "inc/Footer.php" ;?>