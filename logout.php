<?php
// set the expiration date to one hour ago
setcookie("account_present_MATK",null, time() - 3600,"/");
header("Location: login.php");
?>

