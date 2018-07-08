<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
	<title>Logged Out!!!</title>
</head>
<style>
	

                  a{
                  	color:white;
                  	font-family: Arial;
                  }

                  .words{
                  	font-family: Arial;
                  }

                  .position{
                  	 	height: 200px;
					    width: 400px;
					    
					    position: fixed;
					    top: 50%;
					    left: 50%;
					    margin-top: -100px;
					    margin-left: -200px;
                  }

                  button{
			          background-color:#4CAF50;
			          color:white;
			          font-family:'Arial';
			          padding-right: : 5px;
			          width: 100px;
			          height: 50px;
			          border: solid;
					}

				 button:hover {
          			 opacity: 0.8;
    								}

</style>
<body>
<div class="position">
	<center>
		<b>
			<p class="words">You've been logged out from the Requisition System</p>
			<p class="words">Click here to Log In!!!</p>
		</b>
		<button onclick="window.location.href='index.php'">
			LOG IN
		</button>
				
	</center>

</div>


<?php
session_start();
session_destroy();


?>
</body>
</html>
