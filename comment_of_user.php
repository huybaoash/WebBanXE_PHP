<style>
    
        .boxDiv:hover {
            margin-top: 0 !important;
        }
</style>

<?php 
     
     require_once("entities/contractcardetailsview.class.php");
	 require_once("entities/contractcart.class.php");
	 require_once("entities/comment_view.class.php");
	 require_once("entities/comment.class.php");
     
     require_once("entities/account.class.php");
     require_once("entities/customer.class.php");
    
?>

<?php 
    $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
    $account_present = reset($account_present);

    $customer_present = Customer::get_customer($account_present["MAKH"]);
    $customer_present = reset($customer_present);

  

	$lstCMT = CommentView::toList_byMAHD(1);
    

    if (isset($_GET["MATK"])) {
        $lstCMT = CommentView::toList_byMATK($_GET["MATK"]);
    }
   
?>


<?php 
     include_once("header.php");
    

    
     include_once("menu.php");
    
    
?>
<div class="container tt" style ="padding-right: 0px;padding-left: 100px;">
<h1>Lịch sử bình luận </h1>
<?php 
    foreach ($lstCMT as $binhluan){ 
        $hopdong = ContractCarDetailsView::get_contract_byMAHD($binhluan["MAHD"]);$hopdong = reset($hopdong);
       

        ?>
        <div class="boxDiv" style="height: auto;">
            <div><?php echo $binhluan["TENTK"]; ?> đã bình luận ở trang [<a href="contract_details.php?&MAHD=<?php echo $binhluan["MAHD"]; ?>"> <?php echo $hopdong["TENXE"]; ?></a>]</div>
            <h4 style="font-weight:bold"><?php echo $binhluan["TENTK"]; ?> # <?php echo $binhluan["NGAYDANG"]; ?> </h4>
            <div style="border: 1px solid rgba(220, 220, 221, 0.918); padding: 20px;background-color:lightgray ">
                <p style="font-size:16px">
                    <?php echo nl2br($binhluan['NDBL']); ?>
                </p>
            </div>
        </div>

<?php } ?>
</div>   
    <?php include_once("footer.php"); ?>

    