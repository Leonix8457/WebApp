	<?php

	$filename = "../XML/users.xml";

	$uname = $_POST["usr"];
	$psw = $_POST["psw"];

	$xml=simplexml_load_file($filename) or die("Errore: Non posso aprire il file");

	foreach($xml->children() as $user) {

    if($user->usr == $uname ){
        if($user->psw == $psw){
        	session_start();
        	$_SESSION['user'] = $uname;
        	header("Location: ../userhome.php");
        }
    }
} 

	?>