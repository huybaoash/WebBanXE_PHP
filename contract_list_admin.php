

<style>
    table {
         border-collapse: inherit; 
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
    #menu{
        margin-left:0;
        margin-right:0;
    }
    th{
        background-color:#a0d1f6;
    }
    tr:hover {
        background-color: #eeeeee;
    }
 </style>
	
<?php require_once("must_login.php");
    require_once("check_role_admin.php");
    require_once("entities/customer.class.php");
    require_once("entities/account.class.php");
    require_once("entities/contractcardetailsview.class.php");
    require_once("entities/contract.class.php");
?>

<?php 
    $lstHD = ContractCarDetailsView::toList();

    if (isset($_POST["btnlock"])) {
        $MAHD = $_POST["MAHD"];
        
        $hopdong = Contract::get_contract($MAHD);
        $hopdong = reset($hopdong);

        $khoahopdong = new Contract($hopdong["MAHD"],$hopdong["MANGUOIBAN"],$hopdong["MANGUOIMUA"],$hopdong["MAXE"],$hopdong["NOIDUNGHD"],$hopdong["TRANGTHAI"],$hopdong["DIADIEM"],$hopdong["GIA"],$hopdong["NGAYLAP"]);
        $khoahopdong -> lock();
        header("Refresh:0");
    }

    if (isset($_POST["btnunlock"])) {
        $MAHD = $_POST["MAHD"];
        
        $hopdong = Contract::get_contract($MAHD);
        $hopdong = reset($hopdong);

        $khoahopdong = new Contract($hopdong["MAHD"],$hopdong["MANGUOIBAN"],$hopdong["MANGUOIMUA"],$hopdong["MAXE"],$hopdong["NOIDUNGHD"],$hopdong["TRANGTHAI"],$hopdong["DIADIEM"],$hopdong["GIA"],$hopdong["NGAYLAP"]);
        $khoahopdong -> unlock();
        header("Refresh:0");
    }



?>

<?php 
    include_once("header.php");
    

    
    include_once("menu.php");
    
?>


	<div class="container tt">	
    <?php 
       
        

        
        include_once("menu_admin.php");
        
    ?>
		<p style="margin-top:10px;display:inline-flex">
     
			        <input type="text" name="searchString" value="" class="form-control" style="width:500px;margin-right:5px"  placeholder="Tìm kiếm theo tiêu đề"/>
			        <button type="submit" class="btn btn-primary" style="padding:0px 30px"> <i class="fas fa-search"></i> </button>
			    </p>
		</div>
        
		<table class="table">
		    <tr style ="border:0.5px solid grey">
		        <th style="width:10%; text-align:left;border:0.5px solid grey"> <label>Mã hợp đồng</label></th>
		        <th style="width:15%; text-align:left;border:0.5px solid grey"><label>Tên người bán</label></th>
		        <th style="width:5%; text-align:left;border:0.5px solid grey"><label>Mã xe</label></th>
		        <th style="width:20%; text-align:left;border:0.5px solid grey"><label>Tên xe</label></th>
		        <th style="width:15%; text-align:left;border:0.5px solid grey"><label>Ngày lập</label></th>
		        <th style="width:10%; text-align:left;border:0.5px solid grey"><label>Giá</label></th>
		        <th style="width:15%; text-align:left;border:0.5px solid grey"><label>Địa điểm</label></th>
		        <th style="width:15%; text-align:left;border:0.5px solid grey"><label>Trạng thái</label></th>
		        <th style="text-align:left;border:0.5px solid grey"><label>Tác vụ</label></th>
		    </tr>

            <?php 
                foreach($lstHD as $hopdong) {?>
                         <tr style ="border:0.5px solid grey">
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["MAHD"] ?></td>
                            <td style ="border:0.5px solid grey"><a href="details_other.php?&MATK=<?php echo $hopdong["MATK"] ?>"><?php echo $hopdong["TENTK"] ?></a></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["MAXE"] ?></td>
                            <td style ="border:0.5px solid grey"><a href="contract_details.php?&MAHD=<?php echo $hopdong["MAHD"] ?>"><?php echo $hopdong["TENXE"] ?></a></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["NGAYLAP"] ?></td>
                            <td style ="border:0.5px solid grey"><?php echo (number_format($hopdong["GIA"])." đ"); ?></td>
                            
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["DIADIEM"] ?></td>
                            <td style ="border:0.5px solid grey"><?php echo $hopdong["TRANGTHAI"] ?></td>
                            <td style ="border:0.5px solid grey">
                                <?php 
                                    if ($hopdong["TRANGTHAI"]  == "Công khai"){ ?>
                                         <form method="post" class = "form-horizontal" role = "form">
                                             <input type = "text" style="display: none;" name="MAHD" value="<?php echo $hopdong["MAHD"] ?>" />
                                             <button type = "submit" name = "btnlock" class="btn btn-success btn-sm" onclick="lockTT()"><i class="fas fa-lock-alt"></i> Khóa hợp đồng ?</button>
                                         </form>
                                         
                                <?php   } else {
                                        if ($hopdong["TRANGTHAI"]  == "Đã khóa") {?>
                                                <form method="post" class = "form-horizontal" role = "form">
                                                    <input type = "text" style="display: none;" name="MAHD" value="<?php echo $hopdong["MAHD"] ?>" />
                                                    <button type = "submit" name = "btnunlock" class="btn btn-success btn-sm" onclick="unblockTT()"><i class="fas fa-unlock-alt"></i> Mở khóa</button>
                                                </form>
                                               
                                <?php    }
                                        else {?>
                                                <a class="btn btn-success btn-sm" > Đã hoàn tất giao dịch</a>
                                <?php    }
                                    }
                                ?>
                                
                                
                            </td>
                        </tr>

            <?php   }
            ?>
			
		</table>
		</div>
	


<script>
function unblockTT() {
  alert("Đã mở khóa !");
    }
    
</script>

<script>
function lockTT() {
        alert("Đã khóa !");
    }
</script>
  			
<?php include_once("footer.php"); ?>