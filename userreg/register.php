<!doctype html>  
<html>  
<head>  
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mr+De+Haviland|Neuton" rel="stylesheet">
<title>Register</title>  
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
		
		.c{
		font: 35px 'Indie Flower', cursive;
		
	}
		
            h1 {  
    color: white;  
    font: 75px 'Neuton', serif; 
}  
         h2 {
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
</style>  
</head>  
<body>  
     <div class=boxo>
    <center><h1>Register Yourself</h1></center>  
   <p class=c>Already Registered? Click here to <a href="login.php">Login</a></p>  
 
<form action="" method="POST">  
    <legend>  
    <fieldset>  
          
Username: <input type="text" name="user"><br>  <br>
Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email"><br><br>
Password: <input type="password" name="pass"><br><br>
   
<input class=btn1 type="submit" value="Register" name="submit" />  
              
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
</div> 
</body>  
</html>   