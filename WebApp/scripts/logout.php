<?php
header("Refresh: 3; url=http://php5.hensemberger.it/~5d2giovine/index.php");
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');  
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");  
header('Pragma: no-cache');
session_start();
session_unset();
session_destroy();
?>
<html>
    <head>
    </head>
    <body>
        <h2>Logout eseguito</h2>
    </body>
</html>

<?php
    print $_SESSION["usr"];
?>