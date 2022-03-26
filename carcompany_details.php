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
    require_once("entities/carcompany.class.php");
  
?>

<?php 
    $hsx = CarCompany::get_carcompany(1);
    if (isset($_GET["MAHSX"])){
 

        $hsx = CarCompany::get_carcompany($_GET["MAHSX"]);
        $hsx = reset($hsx);

        if (!$hsx){
            header("Location: cartype_list_admin.php");
        }

    }
    else{
        header("Location: cartype_list_admin.php");
    }

?>

<?php 
    include_once("header.php");
    

    
    include_once("menu.php");
    
?>


	<div class="container tt">
		 <h2>Chi Tiết</h2>

		<div>
		    <h4>Hãng sản xuất</h4>
		    <hr />
		    <dl class="dl-horizontal">
		        <dt>
		        	<label>Tên hãng</label>
		            
		        </dt>
		
		        <dd>
		            <?php echo $hsx["TENHSX"] ?>
		        </dd>
		        <hr />
		        <dt>
		            <label>Hình ảnh</label>
		        </dt>
		
		        <dd>
		        	<img src ="<?php echo $hsx["HINHANH"] ?>" style="height: 240px;width:240px">
		            
		        </dd>
		        <hr />
		        <dt>
		            <label>Trạng thái</label>
		        </dt>
		
		        <dd>
		            <?php echo $hsx["TRANGTHAI"] ?>
		        </dd>
		        <hr />
		    </dl>
		</div>
		<p>
			<a href="carcompany_edit.php?&MAHSX=<?php echo $hsx["MAHSX"] ?>" class="btn btn-primary btn-xs" >Sửa</a>
		  	<a href="carcompany_list_admin.php"  class="btn btn-primary btn-xs"> Trở lại danh sách </a>   
		</p>
		
	</div>
    <?php include_once("footer.php"); ?>