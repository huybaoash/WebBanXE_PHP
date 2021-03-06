

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

  
?>

<?php 
    $lstAccount = Account::toList();

    if (isset($_POST["btnlock"])) {
        $MATK = $_POST["MATK"];
        
        $account = Account::get_Account($MATK);
        $account = reset($account);

        $account = new Account($account["MATK"],$account["MAKH"],$account["TENTK"],$account["MATKHAU"],$account["HINHANH"],$account["TRANGTHAI"],$account["CHUCVU"]);
        $account -> Block();
        header("Refresh:0");
    }

    if (isset($_POST["btnunlock"])) {
        $MATK = $_POST["MATK"];
        
        $account = Account::get_Account($MATK);
        $account = reset($account);

        $account = new Account($account["MATK"],$account["MAKH"],$account["TENTK"],$account["MATKHAU"],$account["HINHANH"],$account["TRANGTHAI"],$account["CHUCVU"]);

        $account -> Unblock();
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
		

        

		<table class="table">
		    <tr style ="border:0.5px solid grey;border:0.5px solid grey">
                <th style="width:30%; text-align:left;border:0.5px solid grey"> <label>T??n ng?????i d??ng</label></th>
		        <th style="width:20%; text-align:left;border:0.5px solid grey"> <label>Ch???c v???</label></th>
		        <th style="width:20%; text-align:left;border:0.5px solid grey"><label>Tr???ng th??i</label></th>
		        <th style="text-align:left;border:0.5px solid grey"><label>T??c v???</label></th>
		    </tr>

            <?php 
                foreach($lstAccount as $account) {?>
                         <tr style ="border:0.5px solid grey">
                            <form method="post" class = "form" style="margin: 0; padding: 0;" role = "form">
                            <td style ="border:0.5px solid grey"><a href="${pageContext.request.contextPath}/otheruserinfo?&MATK= ${nguoidung.getMATK()}"><?php echo $account["TENTK"] ?></a></td>
                            <td style ="border:0.5px solid grey"><?php echo $account["CHUCVU"] ?></td>
                            <td style ="border:0.5px solid grey"><?php echo $account["TRANGTHAI"] ?></td>
                            
                                <td style ="border:0.5px solid grey;">
                                    
                                    
                                    <?php 
                                        if ($account["TRANGTHAI"]  == "??ang ho???t ?????ng"){ ?>
                                            
                                                <input type = "text" style="display: none;" name="MATK" value="<?php echo $account["MATK"] ?>" />
                                                <button type = "submit" name = "btnlock" class="btn btn-success btn-sm" onclick="lockTT()"><i class="fas fa-unlock-alt"></i> Kh??a t??i kho???n ?</button>
                                        
                                            
                                    <?php   } else {
                                            if ($account["TRANGTHAI"]  == "???? kh??a") {?>
                                                
                                                        <input type = "text" style="display: none;" name="MATK" value="<?php echo $account["MATK"] ?>" />
                                                        <button type = "submit" name = "btnunlock" class="btn btn-success btn-sm" onclick="unblockTT()"><i class="fas fa-unlock-alt"></i> M??? kh??a</button>
                                                
                                                
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
    </div>
  	


<script>
function unblockTT() {
  alert("???? m??? kh??a !");
    }
    
</script>

<script>
function lockTT() {
        alert("???? kh??a !");
    }
</script>
  			
<?php include_once("footer.php"); ?>