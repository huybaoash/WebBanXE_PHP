<?php require_once("check_login.php");
require_once("entities/account.class.php");
require_once("entities/customer.class.php");

$xacnhan = false;
        $cmnd_trung = false;
        $sdt_trung = false;
        $email_trung = false;
        $username_trung = false;
        $dem_nhapsai = 0;
?> 
<?php 
     if (empty($message_account)) $message_account = array();
 
     if (isset($_POST["btnsubmit"])){
 
 
 
         $UserName = $_POST["UserName"];
         $Password= $_POST["Password"];
        
         $FullName = $_POST["FullName"];
		$Gender = $_POST["Gender"];
		$HomeAdress = $_POST["HomeAdress"];
		$CMND = $_POST["CMND"];
		$PhoneNumber = $_POST["PhoneNumber"];
		$Email = $_POST["Email"];
        $ConfirmPassword = $_POST["ConfirmPassword"];
	
        
 
         $lstAccount = Account::toList();
         $lstCustomer = Customer::toList();

        if ($Password != $ConfirmPassword) {
            $xacnhan = true ; $dem_nhapsai ++;
        }

 
         foreach ($lstCustomer as $customer){
             if ($customer["CMND"] == $CMND) {
                 $cmnd_trung = true;
                 $dem_nhapsai ++;
             }
             if ($customer["SDT"] == $PhoneNumber) {
                 $sdt_trung = true;
                 $dem_nhapsai ++;
             }
             if ($customer["EMAIL"] == $Email) {
                 $email_trung = true;
                 $dem_nhapsai ++;
             }
         }

         foreach ($lstAccount as $account_item){
            if ($account_item["TENTK"] == $UserName) {
                $username_trung = true;
                $dem_nhapsai ++;
            }
            
        }
         

      
         
         if ($dem_nhapsai == 0){
            $account = new Account(-1,-1,$UserName,$Password,"","Đang hoạt động","Người dùng");
            $customer = new Customer(-1,$FullName,$CMND,$PhoneNumber,$Email,$Gender,$HomeAdress);

             $customer -> add();

             $customer_new = Customer::get_customer_byCMND($customer->getCMND());
             $customer_new = reset($customer_new);

             $account -> setMAKH($customer_new["MAKH"]);
             $account -> add();

             header("Location: login.php");
         }
         
         
                
 
         
 
     }
 
?>
<?php 

    include_once("header.php");
    include_once("menu.php");
?>
<style>
    h2 {
        font-family: Arial;
    }
    .check-Gender {
        display: flex;
        padding-left: 20px;
    }
        .check-Gender label {
            margin-right: 20px;
            font-weight: normal;
        }
    .form-horizontal {
        width: 50%;
        margin: auto;
        border: 1px solid #dcdcdc;
        border-radius: 5px;
        padding-left: 30px;
        padding-right: 30px;    
        background-color:#f6f6f6;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    span {
        
        padding: 0;
        float: none;
    }
</style>
<form method="post" class = "form-horizontal" role = "form">

    <h2>Tạo tài khoản.</h2>
    <hr />
    <?php 
        if ($xacnhan){
            ?>
                
                <label for="array_push" class="text-danger" style="margin-left:0px">Mật khẩu xác nhận không trùng khớp</label>
                 <br />   

        <?php }
        
    ?>

    <?php 
        if ($cmnd_trung){
            ?>
                
                <label for="array_push" class="text-danger" style="margin-left:0px">Chứng minh nhân dân đã có người dùng</label>
                 <br />   

        <?php }
        
    ?>

    <?php 
        if ($sdt_trung){
            ?>
                
                <label for="array_push" class="text-danger" style="margin-left:0px">Số điện thoại đã có người dùng</label>
                 <br />   

        <?php }
        
    ?>

    <?php 
        if ($email_trung){
            ?>
                
                <label for="array_push" class="text-danger" style="margin-left:0px">Email đã có người dùng</label>
                 <br />   

        <?php }
        
    ?>

    <?php 
        if ($username_trung){
            ?>
                
                <label for="array_push" class="text-danger" style="margin-left:0px">Tên tài khoản đã có người dùng</label>
                 <br />   

        <?php }
        
    ?>
   
    
	<hr />
    
    <div class="form-group">
        <div class="col-md-10">
            <label for="UserName">Tên tài khoản(*)</label>
            <input for="UserName" id = "UserName" name ="UserName" class = "form-control" maxlength = "20" value ="" />
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-10">
            <label for="FullName">Họ tên(*)</label>
            <input for="FullName"  id = "FullName" name ="FullName" class = "form-control" value ="" />
        </div>

    </div>

    <div class="form-group">
        <div class="check-Gender">
            <label style="font-weight:bold">Giới Tính:</label>
            <input id="Gender"
                   name="Gender"
                   type="radio"
                   value="Nam" />
            <label>Nam</label>
            <input id="Gender"
                   name="Gender"
                   type="radio"
                   value="Nữ" />
            <label>Nữ</label>
        </div>
    </div>


    <div class="form-group">
         <div class="col-md-10">
            <label for="HomeAdress">Địa chỉ(*)</label>
            <input for="HomeAdress"  id = "HomeAdress" name ="HomeAdress" class = "form-control" value ="" /> 
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-10">
            <label for="CMND">CMND(*)</label>
            <input for="CMND"  id = "CMND" name ="CMND" class = "form-control" Type = "number" placeholder = "CMND mới có 12 số...", max = "999999999999" value ="0" />
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-10">
            <label for="PhoneNumber">Số điện thoại (*)</label>
            <input for="PhoneNumber"  id = "PhoneNumber" name ="PhoneNumber" class = "form-control" Type = "number" placeholder = "SDT có 10 số..." max = "999999999" value ="" /> 
            
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
            <label for="Email">Email (*)</label>
            <input for="Email"  id = "Email" name ="Email" class = "form-control" value ="" /> 
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10">
            <label for="Password">Mật khẩu (*)</label>
            <input type ="password" class = "form-control" id = "Password" name = "Password" >
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <label for="ConfirmPassword">Xác nhận mật khẩu (*)</label>
            <input type ="password" class = "form-control" id = "ConfirmPassword" name = "ConfirmPassword" >
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <button type="submit" class="btn btn-success" id="btnsubmit" name="btnsubmit">Đăng ký</button>
        </div>
    </div>
</form>



<?php include_once("footer.php"); ?>