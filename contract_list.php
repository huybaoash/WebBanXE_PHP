<?php 
     
     require_once("entities/contractcardetailsview.class.php");
    
?>

<?php 
    $lstHD = ContractCarDetailsView::toPublicList();

    if (!isset($_GET["MALOAIXE"])){
        if (!isset($_GET["MAHSX"])){
            if (!isset($_GET["MATK"])){
                header('Location: Location: http://localhost/WebBanXE/');
        
            }else {
                $lstHD = ContractCarDetailsView::toPublicList_byMATK($_GET["MATK"]);
                if (!$lstHD){
            
                    header('Location: Location: http://localhost/WebBanXE/');
                }
            }
    
        }else {
            $lstHD = ContractCarDetailsView::toPublicList_byMAHSX($_GET["MAHSX"]);
            if (!$lstHD){
            
                header('Location: Location: http://localhost/WebBanXE/');
            }
        }      
    }
    else {
        $lstHD = ContractCarDetailsView::toPublicList_byMALOAIXE($_GET["MALOAIXE"]);
        if (!$lstHD){
            
            header('Location: Location: http://localhost/WebBanXE/');
        }
        
    }

    

    
?>


<?php 
     include_once("header.php");
    

    
     include_once("menu.php");
    
    
?>

   
   <div class="container tt">
		<title>Danh sách tài khoản</title>
		<h1>DS giao dịch hợp đồng</h1>
		
		<h3>Tất cả</h3>
        <?php
                
                foreach ($lstHD as $hopdong) { ?>
                
                <div class="row">
                    <a href = "">
                    <div class="panel panel-default" style="width: 900px" >
                        <div class="panel panel-heading">
                            <?php echo $hopdong["TENXE"]; ?>
                        </div>
                        <div class="panel-body">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <p>
                                <img src="<?php echo $hopdong["HINHANH"]; ?>" style="width: 120;height:120" />
                            </p> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                            <p>
                                <strong>Hãng sản xuất: </strong><?php echo $hopdong["TENHSX"]; ?>
                            </p>
                            <p>
                                <strong>Loại xe: </strong><?php echo $hopdong["TENLOAIXE"]; ?>
                            </p>
                            <p>
                            
                                <strong>Giá hợp đồng: </strong><?php echo (number_format($hopdong["GIA"])." đ"); ?>
                            </p>
                        </div>    
                            
                        </div>
                        
                    </div>
                    </a>
                </div>
                
            <?php } ?>            
  		</div>	

          <?php include_once("footer.php"); ?>