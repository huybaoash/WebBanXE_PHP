

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
	
<?php require_once("must_login.php");
    require_once("check_role_admin.php");
    require_once("entities/customer.class.php");
    require_once("entities/account.class.php");
    require_once("entities/CarCompany.class.php");
  
?>

<?php 
    $lstLoaiXE = CarCompany::toList();

    if (isset($_POST["btnlock"])) {
        $MAHSX = $_POST["MAHSX"];
        
        $hsx = CarCompany::get_carcompany($MAHSX);
        $hsx = reset($hsx);

        $hsx = new CarCompany($hsx["MAHSX"],$hsx["TENHSX"],$hsx["HINHANH"],$hsx["TRANGTHAI"]);
        $hsx -> hide();
        header("Refresh:0");
    }

    if (isset($_POST["btnunlock"])) {
        $MAHSX = $_POST["MAHSX"];
        
        $hsx = CarCompany::get_carcompany($MAHSX);
        $hsx = reset($hsx);

        $hsx = new CarCompany($hsx["MAHSX"],$hsx["TENHSX"],$hsx["HINHANH"],$hsx["TRANGTHAI"]);
        $hsx -> show();
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
		
		</div>

        <div style="margin:10px 0px;font-size:18px">
		    <i class="fas fa-plus" style="color:blue"></i>  <a href="carcompany_create.php" >Thêm hãng sản xuất</a>
		</div>

		<table class="table">
		    <tr style ="border:0.5px solid grey;border:0.5px solid grey">
		        <th style="width:30%; text-align:left;border:0.5px solid grey"> <label>Tên hãng sản xuất</label></th>
		        <th style="width:20%; text-align:left;border:0.5px solid grey"><label>Trạng thái</label></th>
		        <th style="text-align:left;border:0.5px solid grey"><label>Tác vụ</label></th>
		    </tr>

            <?php 
                foreach($lstLoaiXE as $hsx) {?>
                         <tr style ="border:0.5px solid grey">
                            <form method="post" class = "form" style="margin: 0; padding: 0;" role = "form">
                                <td style ="border:0.5px solid grey"><?php echo $hsx["TENHSX"] ?></td>
                                <td style ="border:0.5px solid grey"><?php echo $hsx["TRANGTHAI"] ?></td>
                            
                                <td style ="border:0.5px solid grey;">
                                    <a href="carcompany_edit.php?&MAHSX=<?php echo $hsx["MAHSX"] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="carcompany_details.php?&MAHSX=<?php echo $hsx["MAHSX"] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                                    
                                    <?php 
                                        if ($hsx["TRANGTHAI"]  == "Công khai"){ ?>
                                            
                                                <input type = "text" style="display: none;" name="MAHSX" value="<?php echo $hsx["MAHSX"] ?>" />
                                                <button type = "submit" name = "btnlock" class="btn btn-success btn-sm" onclick="lockTT()"><i class="fas fa-unlock-alt"></i> Ẩn</button>
                                        
                                            
                                    <?php   } else {
                                            if ($hsx["TRANGTHAI"]  == "Ẩn") {?>
                                                
                                                        <input type = "text" style="display: none;" name="MAHSX" value="<?php echo $hsx["MAHSX"] ?>" />
                                                        <button type = "submit" name = "btnunlock" class="btn btn-success btn-sm" onclick="unblockTT()"><i class="fas fa-unlock-alt"></i> Công khai</button>
                                                
                                                
                                    <?php    }?>
                                            
                                                
                                    <?php    
                                        }
                                    ?>
                                    
                                    
                                </td>
                            </form>
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