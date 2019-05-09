	<?php
    
    session_start();
	$filename = "../XML/users.xml";

	$uname = $_POST["usr"];
	$psw = $_POST["psw"];

	$xml=simplexml_load_file($filename) or die("Errore: Non posso aprire il file");
    $canGoOn = 0;

	foreach($xml->children() as $user) {
    if($user->usr == $uname ){
        if($user->psw == $psw){
            $canGoOn=1;
            $usr_id = (string)$user->id;
            $usr_email = (string)$user->email;
            break;
        	//header("Refresh: 3; url=../userhome.php");
            }
        } 
    } 

    if($canGoOn==0){
        echo "Username e/o Password Errati\n";
    }
    else{
        
        $_SESSION["user"] = strval($uname);
        $_SESSION["email"] = strval($usr_email);
        $_SESSION["id"] = strval($usr_id);

        echo "loginsuccessful";

    }


?>