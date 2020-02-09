   <?php include "inc/Header.php" ;
            include "inc/Sidebar.php";
      ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
            <h2>Add New User</h2>
          <div class="block">

           <?php 


        if($_SERVER["REQUEST_METHOD"]=="POST" ){  
          $username=$fm->validation( $_POST['username']);   
         $designation=$fm->validation( $_POST['designation']);
         $email=$fm->validation( $_POST['email']);

         $password=$fm->validation( md5($_POST['password']));
     
    

if( $username=="" || $designation=="" ||  $password=="" ||  $email==""){

    echo "<span class='warning'>filed must not be empty! </span>";
}else {  


   $query="SELECT * FROM    user_table WHERE email='$email' LIMIT 1 "; 
   $mailchk=$db->select($query);
   if(!false==$mailchk) {
    echo "<span class='warning'> this email already exist!! </span> ";
   }
    

    else
{



$query="INSERT INTO     user_table(username,password,email,role) 
VALUES('$username','$password', '$email','$designation')";
$inserted=$db->insert($query);
if($inserted){
  echo "<span class='success'>new user added successfully.. </span>";
}else {
  echo "<span class='warning'>new user isn't added.. </span>";
}





  }

}
} 


           ?>

     <form action="" method="post" >

        <table class="form">
    <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input type="text" name="username" placeholder="input username ..." class="medium" />
                </td>
            </tr>          
         
            <tr>
                <td>
                    <label>Designation</label>
                </td>
                <td>
                    <select id="select" name="designation">
                         <option>Select Designation</option>
                         
    
                        <option value="1" >Admin </option>
                        
                        <option value="2" >Editor </option>
                        <option value="3" >Author </option>
                   
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email:</label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="input valid email" class="medium" />
                </td>
            </tr>
          <tr>
                <td>
                    <label>password</label>
                </td>
                <td>
                    <input type="password" name="password" placeholder="input password." class="medium" />
                </td>
            </tr>

			<tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" Value="Create" />
                </td>
            </tr>
        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>

 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->

       <?php include "inc/Footer.php" ;
           ?>
        