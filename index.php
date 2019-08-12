<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MYCHAT</title>
</head>
<body>
	<div id="LoginDiv">
		<form id="form1" method="post" action="UserLogin.php">
			
			<table>
				<tr>
					<td>
						<input type="Email" name="UserMailLogin" placeholder="enter mail" required>


					</td> </tr>

					<tr>
						
						<td>
							
							<input type="password" name="UserPasswordLogin" placeholder="enter password" required>
						</td> </tr>

						<tr><td>
							<input type="submit" value="Login">
						</td></tr>			

				<?php 

				if(isset($_GET['error'])){
				 ?>
				

				<tr><td><span style="color:red;">Check Your Email or Password</span></td></tr>
				<?php 
					}
				 ?>

			</table>
		</form>


	</div>

</body>
</html>