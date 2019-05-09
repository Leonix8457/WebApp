<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.html");
	}
?>
<html>
	<head>
	</head>
	<body>
		<p>
		<?php
			if(isset($_SESSION['user'])){
				echo "<h1>Benvenuto ".$_SESSION['user']."</h1>";
				echo "<h2>Utente numero ".$_SESSION['id']."</h2>";
				echo "<h2>Email utente ".$_SESSION['email']."</h2>";
			}
		?>
		</p>
	</body>
</html>