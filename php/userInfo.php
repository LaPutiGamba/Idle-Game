<?php 
	// Start the session.
	session_start(); 
	include "connectDB.php";

	function userRegister() {
		global $servername, $username, $password, $dbname;

		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection.
			if (!$conn) die("Connection failed: " . mysqli_connect_error());

			// ERROR MYSQL COMPROBAR
			// Insert USER data.
			$sql = "INSERT INTO USERS (username, password, email) VALUES ('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["email"]."')";
			
			if (mysqli_query($conn, $sql)) {
				header("Location: ../index.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			// Close connection.
			mysqli_close($conn);
		}
	}

	function userLogIn() {
		global $servername, $username, $password, $dbname;

		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
			// Create connection.
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection.
			if (!$conn) die("Connection failed: " . mysqli_connect_error());

			// Select USER data.
			$sql = "SELECT username, password FROM USERS WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "';";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Set session variables.
				$_SESSION["userConnection"] = $_POST["username"];

				// Redirect to the game file.
				header("Location: arifarm.php");
			} else {
				header("Location: ../index.php");
				$_SESSION["badLoginClass"] = "badLogin";
				echo 
				"<script> 
				const badLoginP = document.createElement('p')
				const badLoginText = document.createTextNode('The username or the password was incorrect.');
				badLoginP.appendChild(badLoginText);
				document.getElementsByClassName('badLogin')[1].appendChild(badLoginP);
				</script>";
			}

			// Close connection.
			mysqli_close($conn);
		}
	}
?>