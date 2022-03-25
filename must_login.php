<?php require_once("entities/account.class.php"); ?> 
<?php 
     $account_present = new Account(-1,-1,"","","","","");

     if(!isset($_COOKIE["account_present_MATK"]))
     {
         header("Location: http://localhost/WebBanXE/login.php");
     }
?>