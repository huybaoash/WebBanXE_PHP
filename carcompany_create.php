
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
    
    if (isset($_POST["btnsubmit"])){
 
 
 
        $TENHSX = $_POST["TENHSX"];
        
        $fileHINHANH = $_FILES["image1"];
        

        $hsx = new CarCompany(-1,$TENHSX,"","Công khai");
      

        
        $file_temp = $fileHINHANH['tmp_name'];
        $user_file = $fileHINHANH['name'];
        
        $parent = dirname(__DIR__);
       
        $file_path = $parent."\\WebBanXE\\images\\carconmpany\\".$user_file;

        if(!is_dir($parent."\\WebBanXE\\images\\carconmpany\\"))
        {
            mkdir($parent."\\WebBanXE\\images\\carconmpany\\",0777);
        }

        if (move_uploaded_file($file_temp,$file_path) == false){
            return false;
        }
        
        $HINHANH = "images/carconmpany/".$user_file;
        

        $hsx -> setHINHANH($HINHANH);
        
        $hsx -> add();

        header("Location: carcompany_list_admin.php");

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

		<form method="post" enctype='multipart/form-data'>
		
		<div class="form-horizontal">
		    <h2>Thêm</h2>
		    <h4>Hãng sản xuất</h4>
		    <hr />
		    
		    <div class="form-group">
		        
		        <div class="col-md-10">
		            <label for="TENHSX">Tên hãng</label>
            		<input for="TENHSX"  id = "TENHSX" name ="TENHSX" class = "form-control" Type = "text" placeholder = "Vd: Honda" required/>
		        </div>
		        
		        <div class="col-md-10">
		            <label for="image1">Chọn hình <i style="color: rgb(122, 120, 120);font-weight: normal;"></i></label>
                    <input type="file" value="image1" name="image1" id="image1" required title="Chọn đường dẫn hình ảnh" accept=".jpg" onchange="Images1FileAsURL()" />
                    <div id="displayImg1"></div>
		        </div>
		    </div>
		
		    <div>
		        <div>
		            <button type="submit" class="btn btn-primary" name="btnsubmit" >Thêm</button>
		            <a href="carcompany_list_admin.php" class="btn btn-primary"> Trở lại danh sách </a>
		        </div>
		    </div>
		</div>
		</form>
		</div>
    </div>


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