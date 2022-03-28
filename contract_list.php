<?php 
     
     require_once("entities/contractcardetailsview.class.php");
     require_once("entities/contractcart.class.php");
     require_once("entities/cartype.class.php");
     require_once("entities/carcompany.class.php");
     require_once("entities/account.class.php");
?>

<?php 
    $lstHD = ContractCarDetailsView::toPublicList();

    if (!isset($_GET["MALOAIXE"])){
        if (!isset($_GET["MAHSX"])){
            if (!isset($_GET["MATK"])){
                if (!isset($_GET["MATK_Done"])) {
                    header('Location: Location: http://localhost/WebBanXE/');
                }
                else{
                    $lstHD = ContractCarDetailsView::toDoneList_byMATK($_GET["MATK_Done"]);
                    $taikhoan = Account::get_account($_GET["MATK_Done"]);
                    $taikhoan = reset($taikhoan);
                    $title = "Danh sách xe đã thanh toán của ".$taikhoan["TENTK"];
                }
        
            }else {
                $lstHD = ContractCarDetailsView::toPublicList_byMATK($_GET["MATK"]);
                $taikhoan = Account::get_account($_GET["MATK"]);
                $taikhoan = reset($taikhoan);
                $title = "Danh sách xe đăng ký bán của ".$taikhoan["TENTK"];
            }
    
        }else {
            $lstHD = ContractCarDetailsView::toPublicList_byMAHSX($_GET["MAHSX"]);
            $hsx = CarCompany::get_carcompany($_GET["MAHSX"]);
            $hsx = reset($hsx);
            $title = "Danh sách xe thuộc hãng ".$hsx["TENHSX"];
        }      
    }
    else {
        $lstHD = ContractCarDetailsView::toPublicList_byMALOAIXE($_GET["MALOAIXE"]);
        $loaixe = CarType::get_cartype($_GET["MALOAIXE"]);
        $loaixe = reset($loaixe);
        $title = "Danh sách xe thuộc ".$loaixe["TENLOAIXE"];
        
    }

    if (isset($_POST["btn_addtocart"])) {
        if (!isset($_COOKIE["account_present_MATK"])) {
            header("Location: http://localhost/WebBanXE/login.php");
        }
        
        $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
        $account_present = reset($account_present);

        $hopdong = ContractCarDetailsView::get_contract_byMAHD($_POST["MAHD"]);
        $hopdong = reset($hopdong);

        

        
            
        if ($hopdong["MATK"] == $account_present["MATK"]) {
            header("Refresh:0");
        }

        else{    

            $giohang = new ContractCart(-1, $hopdong["MAHD"], $account_present["MATK"]);
            $lstgiohang = ContractCart::toList();
            $dem=0;

            foreach ($lstgiohang as $item_giohang) {
                if ($item_giohang["MAHD"] == $giohang->getMAHD() && $item_giohang["MATK"] == $giohang->getMATK()) {
                    $dem++;
                }
            }

            if ($dem >= 1) {
                header("Refresh:0");
            } else {
                $giohang -> add();
            }
        }
        
    }

    
?>


<?php 
     include_once("header.php");
    

    
     include_once("menu.php");
    
    
?>

   
   <div class="container tt">
		<title>Danh sách tài khoản</title>
		<h1><?php echo $title ?> </h1>
		
		<h3>Tất cả</h3>
        <?php
                
                foreach ($lstHD as $hopdong) { ?>
                
                <div class="row">
                    <a href = "contract_details.php?&MAHD=<?php echo $hopdong["MAHD"]; ?>">
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
                            <?php 
                                if ($hopdong["TRANGTHAI"] == "Công khai") {?>
                                            <form method="post" enctype='multipart/form-data'>
                                                <input value="<?php echo $hopdong["MAHD"]; ?>" name="MAHD" style ="display:none;" />
                                                <button class="btn btn-warning" name = "btn_addtocart" type="submit"><i class="fa fa-shopping-cart" style="font-size:24px;"></i> Thêm vào giỏ hợp đồng</button>
                                            </form>
                            <?php     }else {
                            ?>
                                                <button class="btn btn-warning" > Hoàn tất giao dịch</button>
                            <?php     }
                            ?>
                            <br/>
                        </div>    
                            
                        </div>
                        
                    </div>
                    </a>
                </div>
                
            <?php } ?>            
  		</div>	

          <?php include_once("footer.php"); ?>