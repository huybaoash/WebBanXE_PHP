<?php require_once("entities/account.class.php"); ?> 
<?php 
     $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
     $account_present = reset($account_present);

     if ($account_present["CHUCVU"] != "Người Quản Trị")
        header("Location: http://localhost/WebBanXE/");
?>