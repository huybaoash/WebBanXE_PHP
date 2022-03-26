
<<style>
#carcompany_item:hover {
  background-color: #F0F0F0;
}
</style>
<?php 
     require_once("entities/carcompany.class.php");
    include_once("header.php");
    

    
    include_once("menu.php");
    
   
    
?>

<?php 
    $lstHangXE = CarCompany::toPublicList();

?>


<div class="container tt" style ="padding-right: 0px;padding-left: 200px;">
	<div class="col-md-10">
	            <fieldset>
                    <?php 
                        foreach ($lstHangXE as $hangxe) {?>

                            <a href ="contract_list.php?&MAHSX=<?php echo $hangxe["MAHSX"]; ?>">
                                <div id = "carcompany_item" class=" col-lg-4 col-md-4 col-sm-6 col-xs-12 " style = "border: 0.5pt solid black;height:180px">
                                    <div style = "text-align: center;">
                                        <img src="<?php echo $hangxe["HINHANH"]; ?>" alt="<?php echo $hangxe["TENHSX"]; ?>" style="width:140px;height:140px">
                                    </div>
                                    
                                    <div style = "text-align: center;margin-top:10px  ">
                                        <label><?php echo $hangxe["TENHSX"]; ?></label>
                                    </div>
                                </div>
                            </a>

                    <?php     }
                    ?>
	            </fieldset>
	</div>
</div>

<?php include_once("footer.php"); ?>