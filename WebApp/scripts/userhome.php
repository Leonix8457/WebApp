<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}
?>
<html>
	<head>
	</head>
	<body>
		<?php
			if(isset($_SESSION['user'])){
				echo "<h1>Benvenuto ".$_SESSION['user']."</h1>";
			}
		?>
	</body>
</html>