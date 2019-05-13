<?php

ini_set('display_errors', 1);
session_start();
$filename = "../XML/characters.xml";

$idUser = $_SESSION["id"];


//Cerca le note Con id User Uguale a quello che fa la richiesta
$lastID =0;
$xml=simplexml_load_file($filename) or die("Errore: Non posso aprire il file");

$xmlResp="<char>\n";

foreach($xml->children() as $id) { 
    if($id->idUser == $idUser){
        // COMPONI QUELLO CHE DEVI INVIARE
         $xmlResp= $xmlResp."<name>". $id->name ."</name> \n";
         $xmlResp= $xmlResp."<class>". $id->name ."</class> \n";
         $xmlResp= $xmlResp."<level>". $id->name ."</level> \n";
    } 
} 

$xmlResp=$xmlResp."</char>";

echo $xmlResp;

?>