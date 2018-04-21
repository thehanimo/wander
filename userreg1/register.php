<!doctype html>  
<html>  
<head>  
<title>Register</title>  
    <style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
         h2 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}</style>  
</head>  
<body>  
     
    <center><h1>Register Yourself</h1></center>  
   <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
    <center><h2>Registration Form</h2></center>  
<form action="" method="POST">  
    <legend>  
    <fieldset>  
          
Username: <input type="text" name="user"><br>  <br>
Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email"><br><br>
Password: <input type="password" name="pass"><br><br>
   
<input type="submit" value="Register" name="submit" />  
              
        </fieldset>  
        </legend>  
</form>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass']) && !(empty($_POST['email']))) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $con=new mysqli('localhost','root','','user_registration') or die(mysqli_error($con));  
    
  
    $query=$con->query("SELECT * FROM login WHERE username='".$user."'");
    $query2=$con->query("select * from login where email='".$email."'");
    $numrows=mysqli_num_rows($query);  
    $numrows2=mysqli_num_rows($query2);
    if(($numrows==0) && ($numrows2==0))  
    {  
    $sql="INSERT INTO login(username,password,email) VALUES('$user','$pass','$email')";  
  
    $result=$con->query($sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    }
    if($numrows>0)
		echo "This username is already used";
    if($numrows2>0)
		echo "This email is already used";

  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   