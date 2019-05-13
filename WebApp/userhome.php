<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.html");
	}
?>
<html>
	<head>
		<script>

        function showCharacters() {

            x = new XMLHttpRequest();
            var s="../../back-end/PersonalReminder/showNotes.php";

            x.onreadystatechange = function(){
                if(x.readyState == 4 && x.status == 200 ) {
                   // var r = x.responseText;
                   // document.getElementById("a").innerHTML = "valore : " + r ;
                   //alert(x.responseText);



                    var char, parser, xmlDoc;
                    char = x.responseText;
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(char,"char/xml");

                    let myChar = xmlDoc.getElementsByTagName("char");

                    for(let i=0; i<myChar.length; i++){
                        let nodo = document.createTextNode(myChar[i].childNodes[0].nodeValue);
                        document.getElementById("showCharacters").appendChild(nodo);
                        let br = document.createElement("br");
                        document.getElementById("showCharacters").appendChild(br);
                        //alert(LeMieNote[i].childNodes[0].nodeValue);
                    }



                }
                else{
                    console.log(x.readyState);
                }
            }
            x.open("POST", s, true);
            x.setRequestHeader("Content-type", "application/json");
            x.send();

        }

    </script>
	</head>
	<body onload="showCharacters(<?php echo $_SESSION['id']; ?>)">
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