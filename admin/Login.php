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
   
    $username=$fm->validation($_POST['username']);
    $password=$fm->validation($_POST['password']);

    $username=mysqli_real_escape_string($db->link,$username);
     $password=mysqli_real_escape_string($db->link,md5($password));
    
    $query="SELECT * FROM user_table WHERE username='$username' AND password='$password'   ";
    $result=$db->select($query);
    if($result != false){
    	$value=$result->fetch_assoc();
    	
    	         Session::init();
                Session::set("login",true);
                Session::set("userid", $value['id']);
                Session::set("name", $value['name']);
                Session::set("username",$value['username']);
                Session::set('userRole',$value['role']);
                
                header("Location: index.php");

    	  
    	}
    else{echo "<span style='color:red;font-size:20px;'> username and password not matched...!! </span>";}

}



?>

		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username"  name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input style="margin-left: 110px; width:150px; height: 40px;" type="submit" name="Login" value="Login" />


			</div>
		</form><!-- form -->
		<div class="button"> 
           <button style="width:250px;height:40px;background:#fc7;border-radius:5px;" ><a href="Forgotpassword.php">Forgoten password!!</a></button> 
       </br>
			<a href="#">Training with shibbir-it</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>