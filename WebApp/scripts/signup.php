<?php

ini_set('display_errors', 1);

$filename = "C:\Apache24\htdocs\WebApp\XML\users.xml";

$LastID = 0;
$uname = $_POST["username"];
$email = $_POST["email"];
$ddn = $_POST["ddn"];
$psw = $_POST["password"];

$xml=simplexml_load_file($filename) or die("Errore: Non posso aprire il file");

echo "Registrazione Effettuata!\n";

foreach($xml->children() as $users){}

$xmldoc = new DOMDocument();
$xmldoc->load($filename);

$lenght = sizeof($xml);

$LastID = ($users->id)+1;
	
$firstchild = $xmldoc->getElementsByTagName('UsersDB')->item(0);
$newPage = $xmldoc->createDocumentFragment();
$newPage->appendXML(' <users>
<id>'. $LastID .'</id>
<usr>'. $uname .'</usr>
<email>'. $email .'</email>
<psw>'. $psw .'</psw>
<ddn>'. $ddn .'</ddn>
</users>

');
    $firstchild->appendChild($newPage);
    $xmldoc->save($filename);


?>