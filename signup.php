<!DOCTYPE html>
<html>
<head>
	<title>MyChat</title>
</head>
<body>
	<div id="signupdiv">

		<form id="form2" method="post" action="Insert User.php">
			
			<h2>SignUp here dude !</h2>
			<table>
					

				<tr>
					<td>
						<input type="text" name="UserName" placeholder="Enter user name" required>

					</td>
				</tr>
				<tr>
					<td>
						<input type="email" name="UserMail" placeholder="Enter your email" required>

					</td>
				</tr>
				<tr>
					<td>
						<input type="password" name="UserPassword" placeholder="Enter your password" required>

					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="SignUp">
					</td>
				</tr>
			<?php 
				if(isset($_GET['success']))
				{
					?>
					<tr> <td> </td><td> <span style="color:green;"> Registration Success </span></td>
					</tr>
			<?php } ?> 

			 
			</table>
		</form>
		

	</div>

</body>
</html>