<style>
    span {
    
        padding:0;
        float:none;
    }
    .formCreate {
        width: 70%;
        padding: 20px;
        border-radius: 5px;
    }
    #displayImg1 img {
        height: 50px;
        width: 50px;
        margin-right: 10px;
        display: inline-block;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    .formall {
        display: flex;
        padding: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .Noidungmau {
        padding: 10px 10px;
    }
    .khungMau h4 {
        background-color: rgb(204, 204, 204);
        margin-top: 0;
        padding: 10px;
        font-weight: bold;
    }
    .NewsEX {
        height: 50%;
        width: 30%;
        margin-left: 2px;
        border: 1px solid lightgrey;
    }
    .Noidungmau a {
        text-decoration: none;
    }
</style>


<?php 
     
     require_once("entities/cartype.class.php");
     require_once("entities/car.class.php");
     require_once("entities/contract.class.php");
     require_once("entities/carcompany.class.php");
     require_once("entities/account.class.php");
     require_once("entities/customer.class.php");
	 require_once("entities/contractcardetailsview.class.php");
     require_once("must_login.php");
    
?>

<?php 
    $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
    $account_present = reset($account_present);

    $customer_present = Customer::get_customer($account_present["MAKH"]);
    $customer_present = reset($customer_present);

	$lstHangXE = CarCompany::toPublicList();
    $lstLoaiXE = CarType::toPublicList();

    $hopdong = ContractCarDetailsView::get_contract_byMAHD(1);
	$hopdongND = Contract::get_contract(1);
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

			if ($hopdong["MATK"] != $account_present["MATK"]){
            
				header('Location: Location: http://localhost/WebBanXE/');
			}

            $account = Account::get_account($hopdong["MATK"]);
            $account = reset($account);

            $customer = Customer::get_customer($account["MAKH"]);
            $customer = reset($customer);

            $car = Car::get_car($hopdong["MAXE"]);
            $car = reset($car);

			$hopdongND = Contract::get_contract($_GET["MAHD"]);
			$hopdongND = reset($hopdongND);
			

        }
        
    }

    if (isset($_POST["btnsubmit"])){
 
 
 
        $TENXE = $_POST["TENXE"];
        $MALOAIXE= $_POST["MALOAIXE"];
        $MAHSX= $_POST["MAHSX"];
        $NOIDUNGXE= htmlspecialchars($_POST["NOIDUNGXE"]);
        $NOIDUNGHD= htmlspecialchars($_POST["NOIDUNGHD"]);
        $BAOHANH= $_POST["BAOHANH"];
        $NAMSANXUAT= $_POST["NAMSANXUAT"];
        $GIAXE= $_POST["GIAXE"];
        $DIADIEM = $_POST["DIADIEM"];
        $fileHINHANH = $_FILES["image1"];
        $NGAYGIO = date("Y")."-".date("m")."-".date("d")." ".date("h").":".date("i").":".date("s");

        $car_update = new Car($car["MAXE"],$BAOHANH,$NAMSANXUAT,$MALOAIXE,$MAHSX,$TENXE,$NOIDUNGXE,$car["HINHANH"],$car["TRANGTHAI"],$GIAXE);
        $car_update -> update();

        
        
        
        $hopdong_update = new Contract($hopdong["MAHD"],$hopdong["MATK"],-1,$hopdong["MAXE"],$NOIDUNGHD,$hopdong["TRANGTHAI"],$DIADIEM,$GIAXE,$NGAYGIO);
        $hopdong_update -> update();

		
        
		if (empty($fileHINHANH['name'])){
			header("Location: contract_details.php?&MAHD=".$hopdong["MAHD"]);
		}
        else{
			$file_temp = $fileHINHANH['tmp_name'];
			$user_file = $fileHINHANH['name'];
			
			$parent = dirname(__DIR__);
		
			$file_path = $parent."\\WebBanXE\\images\\car\\hopdong".$hopdong["MAHD"]."\\".$user_file;

			if(!is_dir($parent."\\WebBanXE\\images\\car\\hopdong".$hopdong["MAHD"]."\\"))
			{
				mkdir($parent."\\WebBanXE\\images\\car\\hopdong".$hopdong["MAHD"]."\\",0777);
			}

			if (move_uploaded_file($file_temp,$file_path) == false){
				return false;
			}
			
			$HINHANH = "images/car/hopdong".$hopdong["MAHD"]."/".$user_file;
			

			$car_update -> setHINHANH($HINHANH);
			$car_update -> update();
			header("Location: contract_details.php?&MAHD=".$hopdong["MAHD"]);
		}
		
        

       

    }

    
?>


<?php 
     include_once("header.php");
    

    
     include_once("menu.php");
    
    
?>

   
<form method="post" enctype='multipart/form-data'>

<div class="container tt" style ="padding-right: 0px;padding-left: 100px;">
	<h2>CHỈNH SỬA HỢP ĐỒNG BÁN XE</h2>
            <hr>
            
            
            <div class="formall">
                <div class="formCreate">

                    <div class="form-group">
                        <label for="TENXE">Tên Xe</label>
                        <input id = "TENXE" name ="TENXE" class = "form-control" placeholder = "Tên xe" required value="<?php echo $hopdong["TENXE"]; ?>"/> 
                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="MALOAIXE">Chọn loại xe:</label>
                                <select class="form-control" id="MALOAIXE" name="MALOAIXE" aria-invalid="false">
                                <?php 
                                            foreach ($lstLoaiXE as $loaixe) {
                                                if ($hopdong["MALOAIXE"] == $loaixe["MALOAIXE"]) {?>
													<option value="<?php echo $loaixe["MALOAIXE"]; ?>" selected> <?php echo $loaixe["TENLOAIXE"]; ?></option>
                                                  <?php } else { ?>  

                                                    <option value="<?php echo $loaixe["MALOAIXE"]; ?>"> <?php echo $loaixe["TENLOAIXE"]; ?></option>

                                        <?php     }
                                            }
                                        ?>
                                        
                                        
                                   
                                </select>
                                <span class="field-validation-valid text-danger" data-valmsg-for="MALOAIXE" data-valmsg-replace="true"></span>
                            </div>

                            

                        </div>

                    </div>

					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="MAHSX">Chọn hãng xe:</label>
                                <select class="form-control" id="MAHSX" name="MAHSX" aria-invalid="false">
                                    
                                        
                                        
                                        <?php 
                                            foreach ($lstHangXE as $hangxe) {
											
                                                if ($hopdong["MAHSX"] == $hangxe["MAHSX"]) {?>
													<option value="<?php echo $hangxe["MAHSX"]; ?>" selected> <?php echo $hangxe["TENHSX"]; ?></option>
                                                  <?php } else { ?>  

                                                    <option value="<?php echo $hangxe["MAHSX"]; ?>"> <?php echo $hangxe["TENHSX"]; ?></option>

											<?php     }
												}
										?>		
                                                    

                                                   

                                        
                                   
                                </select>
                                <span class="field-validation-valid text-danger" data-valmsg-for="MAHSX" data-valmsg-replace="true"></span>
                            </div>

                            

                        </div>

                    </div>
					
                    

                    <div class="form-group">
                        <label for="NOIDUNGXE">Thông tin xe</label>
                        <textarea class = "form-control" cols="20" id="NOIDUNGXE" name="NOIDUNGXE" rows="10" placeholder = "Yêu cầu điền nội dung thông tin chính xác!" required><?php echo $car["NOIDUNGXE"]; ?></textarea>
                    </div>
					
					<div class="form-group">
                        <label for="NOIDUNGHD">Nôi dung hợp đồng</label>
                        <textarea class = "form-control" cols="20" id="NOIDUNGHD" name="NOIDUNGHD" rows="20" readonly ><?php echo $hopdongND["NOIDUNGHD"]; ?> </textarea>
                    </div>
					
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="BAOHANH">Bảo hành</label>
                                <input type = "number" max = "1200" min ="0" id = "BAOHANH" name ="BAOHANH" class = "form-control" placeholder = "Nhập số tháng bảo hành. Tối đa là 100 năm." required value="<?php echo $hopdong["BAOHANH"]; ?>"/>                                
                            </div>

                            <div class="col-md-6">
                                <label for="NAMSANXUAT">Năm sản xuất</label>
                                <input type = "number" min = "1900" max = "9999" id = "NAMSANXUAT" name ="NAMSANXUAT" class = "form-control" placeholder = "Nhập năm sản xuất." required value="<?php echo $hopdong["NAMSANXUAT"]; ?>"/>                                
                            </div>
                            
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="GIAXE">Giá</label>
                                <input type = "number" id = "GIAXE" name ="GIAXE" class = "form-control" placeholder = "Nhập giá." min = "0" required value="<?php echo $hopdong["GIA"]; ?>"/>
                            </div>

                            <div class="col-md-9">
                                <label for="DIADIEM">Nơi bán</label>
								<input type = "text" id = "DIADIEM" name ="DIADIEM" class = "form-control" placeholder = "Vd: Tp.HCM, Hà Nôi" required value="<?php echo $hopdong["DIADIEM"]; ?>"/>
                               
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="image1">Chọn hình <i style="color: rgb(122, 120, 120);font-weight: normal;"></i></label>
                                <input type="file" value="image1" name="image1" id="image1"  title="Chọn đường dẫn hình ảnh" accept=".jpg" onchange="Images1FileAsURL()" />
                                <div id="displayImg1"><img src="<?php echo $car["HINHANH"]; ?>" alt="<?php echo $hopdong["TENXE"]; ?>"/></div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div style="text-align: right">
                            <button type="submit" value="Thêm" name="btnsubmit" id="CreateSP" class="btn btn-success">Sửa</button>
                        </div>
                    </div>
                </div>

                <div class="NewsEX">
                    <div class="khungMau">
                        <h4>Thông tin người bán</h4>
                        <div class="Noidungmau">
                        	<p>Tài khoản: <a> <?php echo $account["TENTK"]; ?> </a></p>
                            <p>Họ tên: <a> <?php echo $customer["TENKH"]; ?> </a></p>
                            <p>Số điện thoại: <a> <?php echo $customer["SDT"]; ?>  </a></p>
                            <p>Email: <a> <?php echo $customer["EMAIL"]; ?>  </a></p>
                        </div>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
  </form>      
        
        
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script>
	 function Images1FileAsURL() {
	     var fileSelected = document.getElementById('image1').files;
	     if (fileSelected.length > 0) {
	         for (var i = 0; i < fileSelected.length; i++) {
	             var fileToLoad = fileSelected[i];
	             var fileReader = new FileReader();
	             fileReader.onload = function (fileLoaderEvent) {
	                 var srcData = fileLoaderEvent.target.result;
	                 var newImage = document.createElement('img');
	                 newImage.src = srcData;
	                 document.getElementById('displayImg1').innerHTML += newImage.outerHTML;
	             }
	             fileReader.readAsDataURL(fileToLoad);
	         }
	     }
	 }
</script> 
<?php include_once("footer.php"); ?>