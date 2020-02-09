<?php include "../lib/Session.php"; 
  
  Session::cheacklogin();

?>
<?php include "../lib/Database.php"; ?>
<?php include "../config/config.php";
      include "../helpers/Format.php";

      $db=new Database();
      $fm=new Format();
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

<?php if($_SERVER["REQUEST_METHOD"]=="POST" ){
   
    $email=$fm->validation($_POST['email']);
    $email=mysqli_real_escape_string($db->link,$email);

    if(empty($email)){
         echo "<span style='color:red;font-size:20px;'>field must not be empty exist...!! </span>";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
     echo "<span style='color:red;font-size:20px;'>this email address isn't valid...!! </span>";

    }else { 
    $query="SELECT * FROM tbl_user WHERE email='$email' LIMIT 1   ";
    $mailchk=$db->select($query);
    if($mailchk != false){
    	while($value=$mailchk->fetch_assoc()){ 
    	$userid=$value['id'];
      $username=$value['username'];
    }
    
    $txt=substr($email, 0,4);
    $rand=rand(10000,99999);
    $newpassword="$txt$rand";
   
   $to="$email";
   $from="shibbirahamad416979@gmail.com";
   $headers="From:$form\n";
   $headers.='MIME-VERSION: 1.0'."\r\n" ;
   $headers.='Content-type: text/html; charset=iso-8859-1' ."\r\n";
   $subject="your password";
   $message="your username is:".$username ."and password is".$newpassword."please visit website to login";
   $sendmail=mail($to, $subject, $message,$headers);

   if($sendmail){
     echo "<span style='color:green;font-size:20px;'>email has sent ...!! </span>";
   }else {
     echo "<span style='color:red;font-size:20px;'>email isn't send...!! </span>";
   }

    $password=md5($newpassword);
    $query="UPDATE tbl_user SET password='$password' WHERE id='$userid'  ";
    $updating=$db->update($query);

    	      
    	}
    else{
      echo "<span style='color:red;font-size:20px;'>this email addres isn't exist...!! </span>";}
       }

}



?>

		
    <form action="" method="post">
      <h1>password recovery</h1>
      <div>
        <input type="text" placeholder="input valid email address"  name="email"/>
      </div>
    
    <div>
        <input style="margin-left: 110px; width:150px; height: 40px;" type="submit" name="send" value="send email" />



			</div>
		</form><!-- form -->
		<div class="button"> 
           <button style="width:250px;height:40px;background:#fc7;border-radius:5px;" ><a href="Login.php">Login!!</a></button> 
       </br>
			<a href="#">Training with shibbir-it</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>