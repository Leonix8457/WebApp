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
            var s="scripts/showCharacters.php";

            x.onreadystatechange = function(){
                if(x.readyState == 4 && x.status == 200 ) {
                   // var r = x.responseText;
                   // document.getElementById("a").innerHTML = "valore : " + r ;
                   //alert(x.responseText);



                    var char, parser, xmlDoc;
                    char = x.responseText;
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(char,"text/xml");

                    let myCharName = xmlDoc.getElementsByTagName("name");
                    let myCharClass = xmlDoc.getElementsByTagName("class");
                    let myCharLevel = xmlDoc.getElementsByTagName("level");


                    for(let i=0; i<myCharName.length; i++){
                        let newDiv = document.createElement("input");
                        newDiv.type = "radio";
                        newDiv.name = "charSelect";
                        newDiv.value = myCharName[i].childNodes[0].nodeValue;
                        newDiv.id = "div" + i; 
                        newDiv.className = "charNode";
                        let nodoNome = document.createTextNode(myCharName[i].childNodes[0].nodeValue);
                        let nodoClasse = document.createTextNode(myCharClass[i].childNodes[0].nodeValue);
                        let nodoLivello = document.createTextNode(myCharLevel[i].childNodes[0].nodeValue);
                        let br = document.createElement("br");

                        newDiv.appendChild(nodoNome);
                        newDiv.appendChild(nodoClasse);
                        newDiv.appendChild(nodoLivello);
                        document.getElementById("showCharacters").appendChild(newDiv);
                        document.getElementById("showCharacters").appendChild(br);


                        //alert(myChar[i].childNodes[0].nodeValue);
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
        <form id ="showCharacters">

        </form>

	</body>
</html>