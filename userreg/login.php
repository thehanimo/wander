<!doctype html>  
<html>  
<head>  
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mr+De+Haviland|Neuton" rel="stylesheet">
<title>Login</title>  
    <style>   
        body{  
              
    background: url("NZ.jpg");
	background-size: cover;
	display: flex;
	flex-direction: column;
	justify-content: center;
    color: palevioletred;  
    font: 35px 'Roboto', sans-serif;
      
        }  
            h1 {  
    color: white;  
    font: 75px 'Neuton', serif;
}  
		
	.c{
		font: 35px 'Indie Flower', cursive;
		
	}
	a {
		color: orange;
	}
	.btn1{
	background: linear-gradient(45deg, rgba(245,125,125,65) 0%, rgba(255,69,178,0.65) 51%, rgba(255,13,13,0.65) 100%);
	border-radius: 4px;
	padding: 20px 48px;
	color: #FFFFFF;
	font: 20px 'Neuton', serif;
	text-decoration: none;
	text-transform: uppercase;
	letter-spacing: 1px;
	text-shadow: 0px 2px 4px rgba(0,0,0,0.3);
	-webkit-transition: box-shadow is ease;
	transition: box-shadow is ease;
	
}
.btn1:hover{
	box-shadow: 0px 4px 4px rgba(0,0,0,0.3);
	-webkit-transition: box-shadow is ease;
	transition: box-shadow is ease;
}
	
    h3 {  
    color: indigo;  
    font-family: verdana;  
    font: 46px 'Indie Flower', cursive;
		}
	.boxo{
		border-radius: 4px;
	padding: 20px 48px;
	text-shadow: 0px 2px 4px rgba(0,0,0,0.3);
	background: rgba(0,0,0,0.5);
	width: 700px;
	margin: 0 auto;
	text-align:center;
	position: relative;
	}
</style>  
</head>  
<body>
	<div class="boxo">
     <center><h1>Login</h1></center>  
   <p class=c>Not registered? Click here to <a href="register.php">Register</a></p>    
<form action="" method="POST">  
Username: <input type="text" name="user"><br> <br> 
Password: <input type="password" name="pass"><br> <br>  

<input class=btn1 type="submit" value="Login" name="submit" >
  
</form>
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
    $con=new mysqli('localhost','root','','user_registration') or die(mysql_error());  
    
    $query=$con->query("SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    $row=mysqli_fetch_assoc($query);
      
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: HOME.html");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?> 
</div> 
</body>  
</html>   