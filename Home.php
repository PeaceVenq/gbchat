<?php 
session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>MyChat!</title>
 	<link rel="stylesheet" type="text/css" href="home.css">
 	<script type="text/javascript" src="jquery.js"></script>
 	
 	<script type="text/javascript">
 		$(document).ready(function(){
 			$("#ChatText").keyup(function(e){
 				if(e.keyCode==13){
 					var ChatText=$("#ChatText").val();
 					$.ajax(
 					{
 						type:'POST',
 						url:'InsertMessage.php',
 						data:{ChatText:ChatText},
 						success:function(){
 							$("#ChatMessages").load("DisplayMessages.php");
 							$("#ChatText").val("");
 						}
 					});
 				}
 			});
 			setInterval(function(){
 				$("#ChatMessages").load("DisplayMessages.php");
 			},1500);

 			$("#ChatMessages").load("DisplayMessages.php");
 		});
 	</script>
 </head>
 <body>
 <center><h2 style="color:orange;font-size: 30px;font-family: tahoma;">Welcome <span><?php echo $_SESSION['UserName']; ?></span></h2>
 <br><br>
 <div id="ChatBig">
 	<div id="ChatMessages" class="scrollbar"></div>
 	<textarea id="ChatText" name="ChatText" placeholder="Type your message....."></textarea>
 </div> </center>
 </body>
 </html>