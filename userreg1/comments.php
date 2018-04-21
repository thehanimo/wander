<!doctype html>
<html>
	<body>
		<form action="" method="POST">
			<textarea name="comment" placeholder="Share your experience"></textarea><br>
<?php
	
	session_start();
	
		echo "Commenting as ".$_SESSION["sess_user"];
?>
			<br>
			<input type=submit name="submit">
		</form>
			

<?php
	$conn = new mysqli('localhost','root','','user_registration') or die(mysqli_error($conn));
	if(isset($_POST["submit"]))
	{
		if(!empty($_POST['comment']))
		{
			$user=$_SESSION['sess_user'];
			$comment=$_POST['comment'];
			$sql="insert into bay_comments(comment,username) values('$comment','$user')";
			$result=$conn->query($sql);
			if(!$result)
				echo "Error making comment. Please try again later";
			
		}
		else 
			echo "All fields are required1";
	}
		
	$query=$conn->query("select * from bay_comments order by ID desc");
	$numrows=mysqli_num_rows($query);
	
	if($numrows!=0)
	{
		while($row=mysqli_fetch_assoc($query))
		{
			$dbcomment=$row['comment'];
			$dbusername=$row['username'];	
			echo "<br><br><textarea readonly>".$dbcomment."</textarea><br>- ".$dbusername;
			
		}
		
	}
?>