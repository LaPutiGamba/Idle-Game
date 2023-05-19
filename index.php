<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arifarm</title>
		<link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <link href="style.css" rel="stylesheet" type="text/css">
		<script src="script.js"></script>
    </head>
    
    <body onload="resize(IDscreen)" onresize="resize(IDscreen)">
		<div id="IDscreen">
			<h2>Register</h2>
			<form method="post" action="php/selectFunction.php?selectFunction=1">
				<label>Email</label>
				<input type="email" name="email" required></input><br>
				<label>Username</label>
				<input type="text" name="username" required></input><br>
				<label>Password</label>
				<input type="password" name="password" minlength="8" required></input><br>
				<input type="submit" value="REGISTER"></input>
			</form>

			<h2>Log in</h2>
			<form method="post" action="php/selectFunction.php?selectFunction=2">
				<label>Username</label>
				<input type="text" name="username" class="<?php echo $_SESSION["badLoginClass"]; ?>"></input><br>
				<label>Password</label>
				<input type="password" name="password" class="<?php echo $_SESSION["badLoginClass"]; ?>" minlength="8"></input><br>
				<input type="submit" value="LOG IN"></input>
			</form>
		</div>
    </body>
</html>