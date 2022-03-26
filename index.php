<?php  
require_once("entities/cartype.class.php");
require_once("entities/contractcardetailsview.class.php");
include_once("header.php");    
        include_once("menu.php"); 
       
        $lstLoaiXE = CarType::toPublicList();
        $lstHD = ContractCarDetailsView::toPublicList();
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
			<c:forEach var = "i" begin = "1" end = "${lstLoaiXE.size()-1}">
				
			</c:forEach>

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
   
        <a href="">
            <div class="col-lg-3 col-md-6 col-sm-6" style = "padding-right: 0px;padding-left: 0px;">
                <div class="boxDiv">
                    <div class="warp-layout_item">
                        <p>HYUNDAI TUCSON NEW 2022 KM KHỦNG</p>

                        <div class="card" style="">

            
                            <img src="zzz" alt="" style="position:relative" />
                            <img src="~/images/unnamed.gif" style="position:absolute; top:1px; right:1px; height:40px; width:40px">
                          
                            <div class="card-body">
                                <label class="card-text">2022 - Mới - Bảo hành 36 tháng</label>
                            </div>

                            <div class="form-group" style="display:inline-flex;    margin-bottom: 5px;">
                             
                                    <p class="Coins-index" style="margin-right:20px; margin-left:10px"><i class="fas fa-coins"></i> 100.000.000đ</p>
                                
								
                                
                                
                            </div>
                            <div class="form-group" style="display:inline-flex;    margin-bottom: 0px;;    margin-top: 20px;">
                             
                                 <p class="" style="margin-right:10px; margin-left:0px"><i class="far fa-clock"></i> Honda - Thành phố Hồ Chí Minh</p>
								
                                
                                
                            </div>
                            
                        </div>



                    </div>
                </div>
            </div>
        </a>


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
                            
                        </div>
                        
                    </div>
                    </a>
                </div>
                
            <?php } ?>            
  			
  		
  			
        	
        
	
</div>


<?php include_once("footer.php");    ?>