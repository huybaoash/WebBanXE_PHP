<style>
	.small-container1{
    max-width: 100%;
    border: 1px solid rgb(240, 239, 239);
    
	}
	.row_Detail{
	    align-items: center;   
	}
	.single-product{
	    margin: 0px 0px 0px 0px;
	 
	}
	 .small-img-row{
	    display: flex;
	}
	
	.small-img-col {
	    margin-right: 5px;
	    margin-top: 5px;
	    cursor: pointer;
	}
	
	    .small-img-col img {
	        width: 150px;
	        height: 80px;
	    }
	
	
	.single-product .col-2_{
	    padding: 20px;
	  
	}
	.Content_Details{
	    min-width:300px;
	}
	.col-2_ h1{
	    font-size: 25px;
	    margin: 25px 0;
	}
	.CMT {
	    margin-top: 15px;
	    padding: 6px;
	}
	
	/*.Update {
	    margin-left: 75%;
	}*/
	
	.TheLoai{
	    text-align: left;
	    color: rgb(41, 41, 41);
	    background-color: rgb(212, 208, 208);
	    font-size:18px;
	  
	}
	.col-addr{
	    float: left;
	    width: 50%;
	    padding-left: 10px;
	   
	}
	.row-inf:after {
	    content: "";
	    display: table;
	    clear: both;
	    }
	
	.col-addr .infor p{
	    font-size: 14px;
	}
	
	.small-img-rowDV {
	    display: flex;
	} 
	
	.small-img-colDV {
	    margin-right: 5px;
	    margin-top: 5px;
	    cursor: pointer;
	}
	
	    .small-img-colDV img {
	        width: 150px;
	        height: 80px;
	    }
	
	/* 
	    .col-addr .infor p i {
	    color: orangered;
	    font-size: 18px;
	}
	*/
	
	.col-addr .infor p .fa-user-circle {
	    font-size: 18px;
	    color:black;
	}
	
	.fa-phone-square-alt {
	    font-size: 18px;
	    color:blue;
	}
	
	.fa-envelope-square {
	    font-size: 18px;
	    color:#e36523;
	}
	.fa-map-marker-alt {
	    font-size: 18px;
	    color:red;
	}
	
	
</style>


<?php 
     
     require_once("entities/contractcardetailsview.class.php");
	 require_once("entities/contractcart.class.php");

     require_once("entities/car.class.php");
     require_once("entities/account.class.php");
     require_once("entities/customer.class.php");
    
?>

<?php 
    $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
    $account_present = reset($account_present);

    $customer_present = Customer::get_customer($account_present["MAKH"]);
    $customer_present = reset($customer_present);

    $hopdong = ContractCarDetailsView::get_contract_byMAHD(1);
    $customer = Customer::get_customer(1);
    $account = Account::get_account(1);
    $car = Car::get_car(2);

    if (!isset($_GET["MAHD"])) {
        header('Location: Location: http://localhost/WebBanXE/');
    }
    else {
        $hopdong = ContractCarDetailsView::get_contract_byMAHD($_GET["MAHD"]);
        $hopdong = reset($hopdong);

        

        if (!$hopdong){
            
            header('Location: Location: http://localhost/WebBanXE/');
        }
        else{

            $account = Account::get_account($hopdong["MATK"]);
            $account = reset($account);

            $customer = Customer::get_customer($account["MAKH"]);
            $customer = reset($customer);

            $car = Car::get_car($hopdong["MAXE"]);
            $car = reset($car);
        }
        
    }

    if (isset($_POST["btn_addtocart"])) {
		if(!isset($_COOKIE["account_present_MATK"]))
		{
			header("Location: http://localhost/WebBanXE/login.php");
		}
		
		$account_present = Account::get_account($_COOKIE["account_present_MATK"]);
		$account_present = reset($account_present);

		$hopdong = ContractCarDetailsView::get_contract_byMAHD($_POST["MAHD"]);
		$hopdong = reset($hopdong);

		

		if (!$hopdong){
			
			header("Refresh:0");
		}
		else{
			
			if ($hopdong["MATK"] == $account_present["MATK"]){
				header("Refresh:0");
			}


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

   

<div class="container tt" style ="padding-right: 15px;padding-left: 15px;">

	<div class="small-container1 single-product">
        <div class="row_Detail">
            <div class="TheLoai">
                Hãng xe

                <a href=""><?php echo $hopdong["TENHSX"]; ?></a> >
                <a href=""><?php echo $hopdong["TENLOAIXE"]; ?></a>

            </div>

            <div class="Khung-img" style="width: 55%;background-color:  #f5ebeb; margin: 5px auto;">




                <div class="img">
                    <img src="<?php echo $hopdong["HINHANH"]; ?>" width="100%" height="500px" id="ProductImg">

                </div>
            </div>


            <hr style=" margin: 0px 10px; background-color: black;">

            <div class="col-2_">
                <div class="row-inf">
                    <div class="col-addr">
                        <p><strong>Mã Hợp Đồng: <?php echo $hopdong["MAHD"]; ?> </strong></p>
                    </div>

                    <div class="col-addr" style="text-align:right">
                        <p class="Update">Ngày đăng: <?php echo $hopdong["NGAYLAP"]; ?></p>
							
                          <?php 
                                if ($account_present["MATK"] == $account["MATK"]) { ?>  
                                    <a href="contract_edit.php?&MAHD=<?php echo $hopdong["MAHD"]; ?>">Tin của bạn:</strong>[<i>Chỉnh sửa ngay</i>]</a>
                                <?php  }
                           
                          ?>      

                    </div>
                </div>

                <h1><?php echo $hopdong["TENXE"]; ?></h1>
                <div class="row-inf">
                    <div class="col-addr">
                        <div class="infor" style="display:flex;">
                            <p style="padding-right: 30px"><i class="fas fa-user-circle"></i> <?php echo $hopdong["TENTK"]; ?> </p>
                            <a href="">Xem trang >></a>
                        </div>

                        <div class="infor"><p><i class="fas fa-phone-square-alt"></i> <?php echo $customer["SDT"]; ?></p></div>
                    </div>

                    <div class="col-addr">
                        <div class="infor"> <p><i class="fas fa-envelope-square"></i> <?php echo $customer["EMAIL"]; ?> </p> </div>
                        <div class="infor"><p> <i class="fas fa-map-marker-alt"></i> <?php echo $hopdong["DIADIEM"]; ?></p></div>
                    </div>
                </div>


                <h4 style="font-weight:bold">Nội dung</h4>
                <div style="border: 1px solid rgba(220, 220, 221, 0.918); padding: 20px;background-color:rgba(220, 220, 221, 0.918);border-radius:4px;">
                    <p style="font-size:16px">
                    <?php echo nl2br($car['NOIDUNGXE']); ?>
                    </p>
                </div>
                </br>
				
				<div style="height: 240px;">
                	<div class="inf-more" style="margin-top: 10px; ">
                	<p style= "display:inline;">
	                    
						<form method="post" enctype='multipart/form-data'>
							<h4 style="font-weight:bold; width:200px; display:inline;padding-right:400px"> Thông tin sản phẩm </h4>
							<input value="<?php echo $hopdong["MAHD"]; ?>" name="MAHD" style ="display:none;" />
							<button class ="btn btn-warning" style = "padding-top:10px" name = "btn_addtocart" type="submit">
                  				<i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ HỢP ĐỒNG
							</button>      
						</form>
	                
                    </p>
                    
                    <div class="col-addr">
                        <div style="padding-left: 10px; line-height: 0.8rem;padding-top:10px;">
                        	<p style="font-size:16px">Giá: <strong style="color:orangered"> <?php echo (number_format($hopdong["GIA"])." đ"); ?> </strong> </p>
                        </div>
                        
                        <div style="padding-left: 10px; line-height: 0.8rem;padding-top:10px;">
	                        <p style="font-size:16px">Năm sản xuất: <?php echo $car["NAMSANXUAT"]; ?></p>
	
	                    </div> 
	                                           
                        <div style="padding-left: 10px; line-height: 0.8rem;padding-top:10px;">
	                        <p style="font-size:16px">Bảo hành: <?php echo $car["BAOHANH"]; ?> tháng </p>
	
	                    </div>
	                    
	                    <div style="padding-left: 10px; line-height: 0.8rem;padding-top:10px;">
	                        <p style="font-size:16px">Loại xe: <?php echo $hopdong["TENLOAIXE"]; ?></p>
	
	                    </div>
	                    
	                    <div style="padding-left: 10px; line-height: 0.8rem;padding-top:10px;">
	                        <p style="font-size:16px">Hãng: <?php echo $hopdong["TENHSX"]; ?></p>
	
	                    </div>
                    </div>
	            </div>
						
	  						
	                    
	                    
         	</div>
                    
                    
                    
                    
                    <hr />
    	</div>
	</div>
</div>


        
                <div style="padding:10px">
                    <div style="height:50px;border:1px solid #dfdfdf;padding-left:10px;padding-top:5px;background-color:#8785ea">
                        <h4 style="font-weight:bold;color:#e3e2e2">Bình luận</h4>
                    </div>

                    <ul style="border:1px solid lightgray;padding-left:10px">

                            <br />

                            <p style= "display: inline; "><b>huybaoash@gmail.com</b>
                            23/01/2022
                            <a href="">Xóa</a>
                           
                            </p>
                            

                                
                            <br />

                            <p style= "padding-top:10px;">Nội dung 1,2,3,4,5,6,7,8,9</p>

                 
                    </ul>
                    <hr />
                    
                    <?php 
                        

                        if(!isset($_COOKIE["account_present_MATK"])){  ?>
                            <i style="color:#fd9f26;font-size:16px;padding-left:10px">
                        		[Bạn phải đăng nhập mới có thế bình luận.]
                    		</i>
                    <?php    }else {    ?>

                            <div class="CMT">
		                        <form class="form-inline" action="">
		                            <label for="cmt" style="margin-right: 5px;"><?php echo $account_present["TENTK"]; ?></label>
		                            <input type="text" class="form-control" id="TinTucId" name="TinTucId" style="margin-right: 5px;display:none;" value="@Model.IdTinTucs"/>
		                            </br>
		                            <textarea class="form-control text-box single-line" placeholder="Bình luận ..." id="Description" name="Description" style ="width: 100%;height:120px;" ></textarea>
		
		                            <button class="btn btn-primary" style="margin-top:5px;margin-left:95.5%">Gửi</button>
		                        </form>
	                    	</div>

                    <?php } ?>
                    

                    
                    
                    


                </div>
         

<?php include_once("footer.php"); ?>