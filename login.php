



<?php require_once("check_login.php"); ?> 


    
<?php 
     if (empty($message_account)) $message_account = "";
 
     if (isset($_POST["btnsubmit"])){
 
 
 
         $UserName = $_POST["UserName"];
         $Password= $_POST["Password"];
        
 
         $lstAccount = Account::toList();
 
         foreach ($lstAccount as $account){
             if (($account["TENTK"] == $UserName) && ($account["MATKHAU"] == $Password)) 
             {
                 if ($account["TRANGTHAI"] == "Đã khóa"){
                    $message_account = "Tài khoản đã bị khóa !"; break;
                 }
                 else{
                    $account_present = $account;
                    setcookie("account_present_MATK", $account["MATK"], time()+3600*24*30, "/");
                    header("Location: http://localhost/WebBanXE/");
                 }
                 
 
             }
             else {
                $message_account = "Sai tên đăng nhập hoặc tài khoản !";
             }
         }
 
         
 
     }
 
?>

<?php 

    include_once("header.php");
    

    
    include_once("menu.php");
    
   
    
?>

<style>
    label {
        font-weight: normal;
    }
    .Nameform {
        text-align: center;
/*         @* margin: 40px 0px;*@ */
        font-size: 40px;
        font-weight: bold;
        background-color: #d62500;
        width: 100%;
        border-radius: 10px 10px 0px 0px;
        color: white;
    }
    .containerLG {
        width: 400px;
        height: auto;
        margin: auto;
        border: 1px solid rgb(201, 199, 199);
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
        box-shadow: 0 4px 7px 0 rgba(0, 0, 0, 0.2);
    }
    .button-LG {
        width: 40%;
        margin: 0px auto;
        margin-top: 4px;
        height: 40px;
    }
        .button-LG button {
            width: 100%;
            font-size: 18px;
        }
    .input-field input {
        height: 40px;
        font-size: 16px;
    }
    .input-field{
        margin:0px 25px;
        padding:10px 0px 5px 0px;
    }
    .input-field label {
        font-size: 22px;
    }
    .Remember-lg {
        margin: 10px 25px;
        font-size: 16px;
    }
        .Remember-lg a {
            margin-right: 50px;
            margin-left: 15px;
        }
        .Remember-lg input {
            margin-left: 50px;
        }
    .auth {
        text-align: center;
        margin-top: 60px;
    }
        .auth h4 {
            color: rgb(139, 138, 138);
        }
    .links {
        margin-bottom: 50px;
/*        @* border: 1px solid lightgray;*@
       @* text-align: center;*@ */
        width: 60%;
        margin: 15px auto;
        border-radius: 4px;
    }
    .signup {
        text-align: center;
        margin: 30px 0px 40px 0px;
        font-size: 16px;
    }
    .links a {
        font-size: 20px;
        text-decoration: none;
        color: red;
    }
    .input-field ul{
        padding-left:0px;
        list-style:none;
    }
   
       span {
       
        padding:0;
        float:none;
    }
    
    .links button {
        height: 5%;
        width: 100%;
        font-size: 20px;
        box-sizing: border-box;
        padding: 2px;
        font-weight:bolder;
    }
    #Google {
        color: white;
        background-color: #e03c31;
        transition: opacity 0.2s ease;
    }
    
    #Google:hover {
        /*     @*  background-color:white;*@
            @* color:white;*@
            @*    border:1px solid red;*@ */
            opacity: 0.8;
        }
    #Facebook {
        color: white;
        background-color: #3b5998!important;
        transition: opacity 0.2s ease;
    }
        #Facebook:hover {
/*          @*   background-color: white;*@
          @*  color: white;*@
          @*  border: 1px solid blue;*@ */
          opacity:0.8;
        }
</style>

    <div class="containerLG">
        <header class="Nameform">ĐĂNG NHẬP</header>
        <form method="post" enctype="multipart/form-data">
            <div class="input-field">
                  
                <label for="AccountValidation" class = "text-danger" style = "margin-left:0px" ><?php echo $message_account; ?></label>
                <label for="UserName">Tên đăng nhập</label>
                <input type = "text" class = "form-control" placeholder = "UserName" id = "UserName" name = "UserName"/>
                            </div>
            <div class="input-field">
                <label for="pwd">Mật khẩu</label>
                <input type = "password" class = "form-control" placeholder = "Password" id = "Password" name = "Password"/>
                           </div>

            <div class="Remember-lg">
            	<a href = "">Quên mật khẩu ?</a>
            	<input type="checkbox" id="ForgotPassword" name="ForgotPassword">
                <label for="RememberMe" id="RememberMe">Ghi nhớ</label>
            </div>


            <div class="button-LG">
                <div class="inner"></div>
                <button class="btn btn-primary" name = "btnsubmit" type="submit">Đăng nhập</button>
            </div>

        </form>
		
		<form action = "login.htm" method="post">
        <div class="auth">
            <h4>Đăng nhập với</h4>
        </div>

        <div class="links">
              <button class="btn btn-default" type="submit" id="Facebook" name="provider" value="Facebook" title="Log in using your Facebook account"> <i class="fab fa-facebook-f"></i> Facebook</button>
         </div>
        <div class="links">
              <button class="btn btn-default" type="submit" id="Google" name="provider" value="Google" title="Log in using your Google account"> <i class="fab fa-google-plus-square"></i> Google</button>
         </div>
		</form>

        <div class="signup">
            Không phải thành viên? <a href="">Đăng ký ngay</a>
        </div>
    </div>

    <?php include_once("footer.php"); ?>