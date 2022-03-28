<style>
    .menu-list {
        font-size: 18px;
    }
    
    .menu-item{
        font-size:18px;
        padding-left:10px;
        margin-right:3px;
        background-color: none;
            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 5px 5px 0px 5px;
            color: black;
            margin-bottom: 5px;
            text-align: left;
            border-radius: 4px;
           
            box-shadow: 0px 2px 0px 2px #f3f3f3;
        
    }
    
    #menu {
        margin-left: 0;
        margin-right: 0;
    }
    th {
        background-color: #a0d1f6;
    }
    tr:hover {
        background-color: #eeeeee;
    }
</style>


<?php 
     
     require_once("entities/car.class.php");
     require_once("entities/contract.class.php");
     require_once("entities/contractcart.class.php");
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

	$lstContractCart = ContractCart::toList_byMATK($_COOKIE["account_present_MATK"]);
    $lsthopdong = ContractCarDetailsView::toPublicList();
	$tongtien=0;
   

    if (isset($_POST["btnsubmit"])){
 
 
        foreach ($lsthopdong as $hopdong) {
            foreach ($lstContractCart as $giohang) {
                if ($hopdong["MAHD"] == $giohang["MAHD"]) {
                    $hopdong_update = new Contract($hopdong["MAHD"],$hopdong["MANGUOIBAN"],$account_present["MATK"],$hopdong["MAXE"],"","Công khai",$DIADIEM,$GIAXE,$NGAYGIO);
                    $hopdong_update -> update_by_buyer();
                    $hopdong_update -> done();

                    $item = ContractCart::get_contractcart_item($giohang["Id"]);
                    $item = reset($item);

                    $giohang_item = new ContractCart($item["Id"],$item["MAHD"],$item["MATK"]);
            
                    $giohang_item -> remove_allcart_hasMAHD();
                    header("Location: index.php");
                }
            }
        }
        
        

       

    }

    if (isset($_POST["btncancel"])){
        $item = ContractCart::get_contractcart_item($_POST["Id"]);
        $item = reset($item);

        if (!$item){
            header("Refresh:0");
        }

        $giohang_item = new ContractCart($item["Id"],$item["MAHD"],$item["MATK"]);
 
        $giohang_item -> remove();
        
        header("Refresh:0");

       

    }

    
?>


<?php 
     include_once("header.php");
    

    
     include_once("menu.php");
    
    
?>

  

        <div class="container tt">	 
        
        
        
            <table class="table">
                <tr style ="border:0.5px solid grey">
                    <th style="width:20px; text-align:left;border:0.5px solid grey"> <label>Mã hợp đồng</label></th>
                    <th style="width:15px; text-align:left;border:0.5px solid grey"><label>Tài khoản bán</label></th>
                    <th style="width:5px; text-align:left;border:0.5px solid grey"><label>Mã xe</label></th>
                    <th style="width:20px; text-align:left;border:0.5px solid grey"><label>Tên xe</label></th>
                    <th style="width:15px; text-align:left;border:0.5px solid grey"><label></label>Hình ảnh</th>
                    <th style="width:15px; text-align:left;border:0.5px solid grey"><label>Ngày lập</label></th>
                    <th style="width:15px; text-align:left;border:0.5px solid grey"><label>Địa điểm</label></th>
                    <th style="width:20px; text-align:left;border:0.5px solid grey"><label>Giá</label></th>
                    <th style="width:10px;text-align:left;border:0.5px solid grey"><label>Tác vụ</label></th>
                </tr>
                <?php foreach ($lsthopdong as $hopdong){
                    foreach($lstContractCart as $giohang){
                        if ($hopdong["MAHD"] == $giohang["MAHD"]){ ?>
                            <tr style ="border:0.5px solid grey">
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["MAHD"] ?></td>
                            <td style ="border:0.5px solid grey"><a href="details_other.php?&MATK=<?php echo $hopdong["MATK"] ?>"><?php echo $hopdong["TENTK"] ?></a></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["MAXE"] ?></td>
                            <td style ="border:0.5px solid grey"><a href="contract_details.php?&MAHD=<?php echo $hopdong["MAHD"] ?>"><?php echo $hopdong["TENXE"] ?></a></td>
                            <td style ="border:0.5px solid grey"><image src = "<?php echo $hopdong["HINHANH"] ?>" style = "width:120px;height:120px" /></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["NGAYLAP"] ?></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["DIADIEM"] ?></td>
                            <td style ="border:0.5px solid grey"><?php echo (number_format($hopdong["GIA"])." đ");$tongtien += $hopdong["GIA"]; ?></td>
                            <form method="post" enctype='multipart/form-data'>
                                <td style ="border:0.5px solid grey">
                                    <input value="<?php echo $giohang["Id"]; ?>" name="Id" style ="display:none;" />
                                    <button class ="btn btn-danger" name="btncancel">Hủy</button>
                                </td>
                            </form>
                        
                    </tr>

                <?php   }
                    }
                } 

                ?>
                
                
                <tr style ="border:0.5px solid grey">
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"></td>
                        <td style ="border:0.5px solid grey"><strong>Tổng tiền: <?php echo (number_format($tongtien)." đ"); ?></strong></td>
                        <form method="post" enctype='multipart/form-data'>
                        <td style ="border:0.5px solid grey"><button class ="btn btn-success" name="btnsubmit">Thanh Toán</button></td>
                        </form>
                        
               </tr>
              
                    
            </table>
        
            
        </form>
            </div>

<?php include_once("footer.php"); ?>