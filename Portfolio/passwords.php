<?php
$USERS["test"] = "pass";
$USERS["connor"] = "kennedy";
$USERS["julia"] = "Password1";
 
function check_logged(){
     global $_SESSION, $USERS;
     if (!array_key_exists($_SESSION["logged"],$USERS)) {
          header("Location: login.php");
     };
};
?>