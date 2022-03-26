

<style>
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
</style>

<?php require_once("must_login.php");
    require_once("entities/customer.class.php");
    require_once("entities/account.class.php");
    
?>

<?php 
    $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
    $account_present = reset($account_present);

    $customer_present = Customer::get_customer($account_present["MAKH"]);
    $customer_present = reset($customer_present);

    $cmnd_trung = false;
        $sdt_trung = false;
        $email_trung = false;
    $dem_nhapsai = 0;

    if (isset($_POST["btnsubmit"])){
 
 
 
        
       
       $FullName = $_POST["FullName"];
       $Gender = $_POST["Gender"];
       $HomeAdress = $_POST["HomeAdress"];
       $CMND = $_POST["CMND"];
       $PhoneNumber = $_POST["PhoneNumber"];
       $Email = $_POST["Email"];
       
   
       

        $lstAccount = Account::toList();
        $lstCustomer = Customer::toList();

       

        foreach ($lstCustomer as $customer){
            if (($customer["CMND"] == $CMND) && ($customer["CMND"] != $customer_present["CMND"])) {
                $cmnd_trung = true;
                $dem_nhapsai ++;
            }
            if (($customer["SDT"] == $PhoneNumber) && ($customer["SDT"] != $customer_present["SDT"])) {
                $sdt_trung = true;
                $dem_nhapsai ++;
            }
            if (($customer["EMAIL"] == $Email) && ($customer["EMAIL"] != $customer_present["EMAIL"])) {
                $email_trung = true;
                $dem_nhapsai ++;
            }
        }
        

     
        
        if ($dem_nhapsai == 0){
           
            $customer = new Customer($customer_present["MAKH"],$FullName,$CMND,$PhoneNumber,$Email,$Gender,$HomeAdress);

            $customer -> update();

            
           

            header("Location: details_current.php");
        }
        
        
               

        

    }
?>

<?php 
    include_once("header.php");
    

    
    include_once("menu.php");
    
?>

<form method="post" class = "form-horizontal" role = "form">

            <div class="form-horizontal">
                <h2>Chỉnh sửa thông tin cá nhân</h2>
                <hr />
                
               

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
			    
                
                
                <div class="form-group">
                    <div class="col-md-10">
                        <label for="FullName">Họ Tên</label>
                        <input type = "text" class = "form-control" id ="FullName" name = "FullName" value ="<?php echo $customer_present["TENKH"]; ?>" /> 
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="HomeAdress">Địa chỉ</label>
                        <input type = "text" class = "form-control" id ="HomeAdress" name = "HomeAdress" value ="<?php echo $customer_present["DIACHI"]; ?>"/> 
                    </div>
                </div>

               	<div class="check-Gender">
                    <label style="font-weight:bold">Giới Tính:</label>
                    
                    <?php 
                        if ($customer_present["CMND"] == "Nam"){ ?>
                                    <input checked="checked" id="Gender" name="Gender" type="radio" value="Nam" />
                                    <label>Nam</label>
                                    <input id="Gender" name="Gender" type="radio" value="Nữ" />
                                    <label>Nữ</label>
                    <?php    }
                    
                        else {?>

                                    <input id="Gender" name="Gender" type="radio" value="Nam" />
                                    <label>Nam</label>
                                    <input checked="checked"  id="Gender" name="Gender" type="radio" value="Nữ" />
                                    <label>Nữ</label>
                    <?php    }?> 
                        
                    
                    
              	</div>
                
                
                 <hr/>
                
                <div class="form-group">
                    <div class="col-md-10">
                        <label for="CMND">CMND(*)</label>
                        <input class = "form-control" id ="CMND" name = "CMND" Type = "number" placeholder = "CMND mới có 12 số..." max = "999999999" value ="<?php echo $customer_present["CMND"]; ?>" > 
                    </div>
                </div>

                <div class="form-group">
                   
                    <div class="col-md-10">
                        <label for="Email">Email</label>
                        <input id = "Email" name ="Email" class = "form-control" value ="<?php echo $customer_present["EMAIL"]; ?>" />
                       
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-10">
                        <label for="PhoneNumber">Số điện thoại (*)</label>
            			<input id = "PhoneNumber" name ="PhoneNumber" class = "form-control" Type = "number" placeholder = "SDT có 10 số..." max = "999999999" value ="<?php echo $customer_present["SDT"]; ?>" /> 
            
                    </div>
                </div>
                     
                        
                 <div class="form-group">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success" id="edit" name="btnsubmit">Lưu</button>
                    </div>
                </div>     
         	</div>


                

                
        
</form>

<?php include_once("footer.php"); ?>