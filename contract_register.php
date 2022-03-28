
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
     require_once("must_login.php");
     
    
    
    
?>

<?php 
    $lstHangXE = CarCompany::toPublicList();
    $lstLoaiXE = CarType::toPublicList();

    $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
    $account_present = reset($account_present);

    $customer_present = Customer::get_customer($account_present["MAKH"]);
    $customer_present = reset($customer_present);

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

        $car = new Car(-1,$BAOHANH,$NAMSANXUAT,$MALOAIXE,$MAHSX,$TENXE,$NOIDUNGXE,"","Công khai",$GIAXE);
        $car -> add();

        $lstnewCar = Car::toList();
        $newcar = end($lstnewCar);
        
        
        $hopdong = new Contract(-1,$account_present["MATK"],-1,$newcar["MAXE"],$NOIDUNGHD,"Công khai",$DIADIEM,$GIAXE,$NGAYGIO);
        $hopdong -> add();

        $lstnewhopdong = Contract::toList();
        $newhopdong = end($lstnewhopdong);

        

        $file_temp = $fileHINHANH['tmp_name'];
        $user_file = $fileHINHANH['name'];
        
        $parent = dirname(__DIR__);
       
        $file_path = $parent."\\WebBanXE\\images\\car\\hopdong".$newhopdong["MAHD"]."\\".$user_file;

        if(!is_dir($parent."\\WebBanXE\\images\\car\\hopdong".$newhopdong["MAHD"]."\\"))
        {
            mkdir($parent."\\WebBanXE\\images\\car\\hopdong".$newhopdong["MAHD"]."\\",0777);
        }

        if (move_uploaded_file($file_temp,$file_path) == false){
            return false;
        }
        
        $HINHANH = "images/car/hopdong".$newhopdong["MAHD"]."/".$user_file;
        

        $car -> setMAXE($newcar["MAXE"]);
        $car -> setHINHANH($HINHANH);
        $car -> update();

        header("Location: http://localhost/WebBanXE/");

    }

?>

<?php 
    
     
    include_once("header.php");
    

    
    include_once("menu.php");
    
    
    
?>

<form method="post" enctype='multipart/form-data'>

<div class="container tt" style ="padding-right: 0px;padding-left: 100px;">
	<h2>LẬP HỢP ĐỒNG BÁN XE</h2>
            <hr>
            
            
            <div class="formall">
                <div class="formCreate">

                    <div class="form-group">
                        <label for="TENXE">Tên Xe</label>
                        <input id = "TENXE" name ="TENXE" class = "form-control" placeholder = "Tên xe" required/> 
                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="MALOAIXE">Chọn loại xe:</label>
                                <select class="form-control" id="MALOAIXE" name="MALOAIXE" aria-invalid="false">
                                <?php 
                                            foreach ($lstLoaiXE as $loaixe) {?>

                                                    

                                                    <option value="<?php echo $loaixe["MALOAIXE"]; ?>"> <?php echo $loaixe["TENLOAIXE"]; ?></option>

                                        <?php     }
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
                                    
                                        <c:forEach var = "i" begin = "0" end = "${lstCarConmpany.size()-1}">
											
										</c:forEach>
                                        
                                        <?php 
                                            foreach ($lstHangXE as $hangxe) {?>

                                                    

                                                    <option value="<?php echo $hangxe["MAHSX"]; ?>"> <?php echo $hangxe["TENHSX"]; ?></option>

                                        <?php     }
                                        ?>
                                   
                                </select>
                                <span class="field-validation-valid text-danger" data-valmsg-for="MAHSX" data-valmsg-replace="true"></span>
                            </div>

                            

                        </div>

                    </div>
					
                    

                    <div class="form-group">
                        <label for="NOIDUNGXE">Thông tin xe</label>
                        <textarea class = "form-control" cols="20" id="NOIDUNGXE" name="NOIDUNGXE" rows="10" placeholder = "Yêu cầu điền nội dung thông tin chính xác!" required></textarea>
                    </div>
					
					<div class="form-group">
                        <label for="NOIDUNGHD">Nôi dung hợp đồng</label>
                        <textarea class = "form-control" cols="20" id="NOIDUNGHD" name="NOIDUNGHD" rows="20" readonly > </textarea>
                    </div>
					
					<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="BAOHANH">Bảo hành</label>
                                <input type = "number" max = "1200" min ="0" id = "BAOHANH" name ="BAOHANH" class = "form-control" placeholder = "Nhập số tháng bảo hành. Tối đa là 100 năm." required/>                                
                            </div>

                            <div class="col-md-6">
                                <label for="NAMSANXUAT">Năm sản xuất</label>
                                <input type = "number" min = "1900" max = "9999" id = "NAMSANXUAT" name ="NAMSANXUAT" class = "form-control" placeholder = "Nhập năm sản xuất." required/>                                
                            </div>
                            
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="GIAXE">Giá</label>
                                <input type = "number" id = "GIAXE" name ="GIAXE" class = "form-control" placeholder = "Nhập giá." min = "0" required/>
                            </div>

                            <div class="col-md-9">
                                <label for="DIADIEM">Nơi bán</label>
								<input type = "text" id = "DIADIEM" name ="DIADIEM" class = "form-control" placeholder = "Vd: Tp.HCM, Hà Nôi" required/>
                               
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="image1">Chọn hình <i style="color: rgb(122, 120, 120);font-weight: normal;"></i></label>
                                <input type="file" value="image1" name="image1" id="image1" required title="Chọn đường dẫn hình ảnh" accept=".jpg" onchange="Images1FileAsURL()" />
                                <div id="displayImg1"></div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div style="text-align: right">
                            <button type="submit" value="Thêm" name="btnsubmit" id="CreateSP" class="btn btn-success">Thêm</button>
                        </div>
                    </div>
                </div>

                <div class="NewsEX">
                    <div class="khungMau">
                        <h4>Thông tin người bán</h4>
                        <div class="Noidungmau">
                        	<p>Tài khoản: <a> <?php echo $account_present["TENTK"]; ?> </a></p>
                            <p>Họ tên: <a> <?php echo $customer_present["TENKH"]; ?> </a></p>
                            <p>Số điện thoại: <a> <?php echo $customer_present["SDT"]; ?>  </a></p>
                            <p>Email: <a> <?php echo $customer_present["EMAIL"]; ?>  </a></p>
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