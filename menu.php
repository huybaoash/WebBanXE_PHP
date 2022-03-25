<?php
	require_once("entities/account.class.php");
	if(isset($_COOKIE["account_present_MATK"]))
	{
        $account_present = Account::get_account($_COOKIE["account_present_MATK"]);
        $account_present = reset($account_present);
    }



?>

<div class="container-fluid">
        
        <div class="row" style="background-color:#f8eae2">
            
            
            
       		
                
            </div>
        
        </div>

    </div>


    
    
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand fas fa-hotel" style="font-weight:bold;padding-left:100px;" href="/WebBanXE/">Trang chủ</a>
    </div>
    <ul class="nav navbar-nav">
       		<li style="font-weight:bold"><a href="carcompany_index.php">Hãng sản xuất</a></li>
       		<li style="font-weight:bold"><a href="cartype_index.php">Dòng xe hơi</a></li>
       		<li style="font-weight:bold"><a href="contract_register.php">Đăng ký bán xe</a></li>
       		
       		
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    
    <?php 
		if(!isset($_COOKIE["account_present_MATK"])) { ?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
			</ul>
	

	<?php	} else { ?>


		<ul class="nav navbar-nav navbar-right">
		      <li><a href="userinfo.php"><span class="glyphicon glyphicon-user"></span> Xin chào <?php echo $account_present["TENTK"]; ?></a></li>
		      <li><a href="${pageContext.request.contextPath}/contract-cart?&MATK=${Account_present.getMATK()}"><span class="fa fa-cart-plus"></span> Hợp đồng</a></li>
		       

			  <?php if ($account_present["CHUCVU"] == "Người Quản Trị"){ ?>
				<li><a href="${pageContext.request.contextPath}/contract-list-admin"><span class="fas fa-user-tie"></span><?php echo $account_present["CHUCVU"]; ?></a></li>

				<?php } ?>

		      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Thoát</a></li>
		    </ul>


	<?php } ?>
	
    
    
    
  </div>
</nav>

