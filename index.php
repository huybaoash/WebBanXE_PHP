<?php  
require_once("entities/cartype.class.php");
require_once("entities/contractcardetailsview.class.php");
require_once("entities/contractcart.class.php");
require_once("entities/account.class.php");

?>
<?php       
        $lstLoaiXE = CarType::toPublicList();
        $lstHD = ContractCarDetailsView::toPublicList();
        $lstHD_TOP4_OrderByDate = ContractCarDetailsView::toPublicList_Limit4_OrderByDate();
        if (isset($_POST["btn_addtocart"])) {
            if(!isset($_COOKIE["account_present_MATK"]))
            {
                header("Location: http://localhost/WebBanXE/login.php");
            }
            
            $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
            $account_present = reset($account_present);
    
            $hopdong = ContractCarDetailsView::get_contract_byMAHD($_POST["MAHD"]);
            $hopdong = reset($hopdong);
    
            
    
            
                
                if ($hopdong["MATK"] == $account_present['MATK']){
                    header("Refresh:0");
                }
                else{
                    $giohang = new ContractCart(-1,$hopdong["MAHD"],$account_present["MATK"]);
                    $lstgiohang = ContractCart::toList();
                    $dem=0;
        
                    foreach($lstgiohang as $item_giohang){
                        if ($item_giohang["MAHD"] == $giohang->getMAHD() && $item_giohang["MATK"] == $giohang->getMATK()){
                            $dem++;
                        }
                    }
        
                    if ($dem >= 1){
                        header("Refresh:0");
                    }
                    else{
                        $giohang -> add();
                    }
                }
    
                
                
    
                
           
            
        }
?>

<?php
include_once("header.php");    
include_once("menu.php"); 
?>

<!--  
<?php echo $loaixe["MALOAIXE"]; ?>
<?php echo $loaixe["TENLOAIXE"]; ?>
<?php echo $loaixe["HINHANH"]; ?>
<?php echo $loaixe["TRANGTHAI"]; ?>

<?php echo $hopdong["MATK"]; ?>
<?php echo $hopdong["TENTK"]; ?>
<?php echo $hopdong["MAHD"]; ?>
<?php echo $hopdong["DIADIEM"]; ?>
<?php echo $hopdong["GIA"]; ?>
<?php echo $hopdong["NGAYLAP"]; ?>
<?php echo $hopdong["TRANGTHAI"]; ?>
<?php echo $hopdong["MAXE"]; ?>
<?php echo $hopdong["TENXE"]; ?>
<?php echo $hopdong["HINHANH"]; ?>
<?php echo $hopdong["BAOHANH"]; ?>
<?php echo $hopdong["NAMSANXUAT"]; ?>
<?php echo $hopdong["MALOAIXE"]; ?>
<?php echo $hopdong["TENLOAIXE"]; ?>
<?php echo $hopdong["MAHSX"]; ?>
<?php echo $hopdong["TENHSX"]; ?>


-->    


    
<style>
    .card-text{
        font-weight:inherit;
 
    }
    .card-text:hover{
        cursor:pointer;
    }
</style>
<title>Trang chủ</title>
<div class="container tt">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			

            <?php
                
                for ($x = 1; $x < count($lstLoaiXE); $x++) { ?>
                
                <li data-target="#myCarousel" data-slide-to="<?php echo $x ?>"></li>
                
            <?php } ?>

		</ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
			<div class="item active">
	                <img src="<?php echo $lstLoaiXE[0]["HINHANH"]; ?>" alt="<?php echo $lstLoaiXE[0]["TENLOAIXE"]; ?>" style="width:1600px;height:720px">
	                
	                <div class="carousel-caption">
	                    <h3><?php echo $lstLoaiXE[0]["TENLOAIXE"]; ?></h3>
	                </div>
            </div>
            
            <?php
                
                for ($x = 1; $x < count($lstLoaiXE); $x++) { ?>
                
                <div class="item">
		                <img src="<?php echo $lstLoaiXE[$x]["HINHANH"]; ?>" alt="<?php echo $lstLoaiXE[$x]["TENLOAIXE"]; ?>" style="width:1600px;height:720px">
		                <div class="carousel-caption">
		                    <h3><?php echo $lstLoaiXE[$x]["TENLOAIXE"]; ?></h3>
		                </div>
            	</div>
                
            <?php } ?>

           
				
			
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="row" id="RowTT">
    <h3>DÒNG XE MỚI NHẤT</h3>
    <?php
                
                foreach ($lstHD_TOP4_OrderByDate as $hopdong) { ?>
                        <a href="contract_details.php?&MAHD=<?php echo $hopdong["MAHD"] ?>">
                            <div class="col-lg-3 col-md-6 col-sm-6" style = "padding-right: 0px;padding-left: 0px;">
                                <div class="boxDiv" style = "height: auto;">
                                    <div class="warp-layout_item">
                                        <p style="height: 30px;"><?php echo $hopdong["TENXE"]; ?></p>

                                        <div class="card" >

                            
                                            <img src="<?php echo $hopdong["HINHANH"]; ?>" alt="" style="position:relative" />
                                            
                                        
                                            <div class="card-body" style="padding-left:  10px;">
                                                <label class="card-text"><?php echo $hopdong["NAMSANXUAT"]." - Bảo hành ".$hopdong["BAOHANH"]." tháng"; ?></label>
                                            </div>

                                            <div class="form-group" style="display:inline-flex;    margin-bottom: 5px;">
                                            
                                                    <p class="Coins-index" style="margin-right:20px; margin-left:10px"><i class="fas fa-coins"></i> <?php echo (number_format($hopdong["GIA"])." đ"); ?></p>
                                                
                                                
                                                
                                                
                                            </div>
                                            <div class="form-group" style="display:inline-flex;    margin-bottom: 0px;;    margin-top: 20px;">
                                            
                                                <p class="" style="margin-right:10px; margin-left:0px;height: 50px;"><i class="far fa-clock"></i> <?php echo $hopdong["TENLOAIXE"]." - ".$hopdong["TENHSX"]." - ".$hopdong["DIADIEM"]; ?></p>
                                                
                                                
                                                
                                            </div>
                                            
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </a>
                
                <?php } ?>  
        


	</div>
	<div class="btn_more"></div>
	    
    <h3>Tất cả</h3>
   
            <?php
                
                foreach ($lstHD as $hopdong) { ?>
                
                <div class="row">
                    <a href="contract_details.php?&MAHD=<?php echo $hopdong["MAHD"] ?>">
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
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <br/>
                            <form method="post" enctype='multipart/form-data'>
                                <input value="<?php echo $hopdong["MAHD"]; ?>" name="MAHD" style ="display:none;" />
                                <button class="btn btn-warning" name = "btn_addtocart" type="submit"><i class="fa fa-shopping-cart" style="font-size:24px;"></i> Thêm vào giỏ hợp đồng</button>

                            </form>
                            <br/>
                        </div> 
                        </div>
                        
                    </div>
                    </a>
                </div>
                
            <?php } ?>            
  			
  		
  			
        	
        
	
</div>


<?php include_once("footer.php");    ?>