<?php 
require_once('config/db.class.php');
class Account
{
    private $MATK;
    private $MAKH;
    private $TENTK;
    private $MATKHAU;
    private $HINHANH;
    private $TRANGTHAI;
    private $CHUCVU;

  
    
    public function  __construct($mATK, $mAKH, $tENtk, $mATKHAU, $hINHANH, $tRANGTHAI, $cHUCVU)
    {
        $this->MATK = $mATK;
        $this->MAKH = $mAKH;
        $this->TENTK = $tENtk;
        $this->MATKHAU = $mATKHAU;
        $this->HINHANH = $hINHANH;
        $this->TRANGTHAI = $tRANGTHAI;
        $this->CHUCVU = $cHUCVU;
    }
    
    public function getMATK()
    {
        return $this->MATK;
    }
    public function setMATK($mATK)
    {
        $this->MATK = $mATK;
    }
    public function getMAKH()
    {
        return $this->MAKH;
    }
    public function setMAKH($mAKH)
    {
        $this->MAKH = $mAKH;
    }
    public function getTENTK()
    {
        return $this->TENTK;
    }
    public function setTENTK($tENTK)
    {
        $this->TENTK = $tENTK;
    }
    public function getMATKHAU()
    {
        return $this->MATKHAU;
    }
    public function setMATKHAU($mATKHAU)
    {
        $this->MATKHAU = $mATKHAU;
    }
    public function getHINHANH()
    {
        return $this->HINHANH;
    }
    public function setHINHANH($hINHANH)
    {
        $this->HINHANH = $hINHANH;
    }
    public function getTRANGTHAI()
    {
        return $this->TRANGTHAI;
    }
    public function setTRANGTHAI($tRANGTHAI)
    {
        $this->TRANGTHAI = $tRANGTHAI;
    }
    public function getCHUCVU()
    {
        return $this->CHUCVU;
    }
    public function setCHUCVU($cHUCVU)
    {
        $this->CHUCVU = $cHUCVU;
    }

    public static function get_account($id){
        $db = new Db();
        $sql = "SELECT * FROM taikhoan WHERE MATK = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM taikhoan";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public  function add(){
        $db = new Db();
       
        $sql = "INSERT INTO taikhoan (`MAKH`, `TENTK`, `MATKHAU`, `HINHANH`, `CHUCVU`, `TRANGTHAI`) VALUES
        ('$this->MAKH', 
        '$this->TENTK', 
        '$this->MATKHAU', 
        '$this->HINHANH', 
        '$this->CHUCVU', 
        '$this->TRANGTHAI')";

                $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `taikhoan` SET `MAKH` = '$this->MAKH',`MATKHAU` = '$this->MATKHAU', `HINHANH` = '$this->HINHANH', `CHUCVU` = '$this->CHUCVU', `TRANGTHAI` = '$this->TRANGTHAI' WHERE `taikhoan`.`MATK` = '$this->MATK'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function Block(){
        $db = new Db(); 
        $sql = "UPDATE `taikhoan` SET  `TRANGTHAI` = 'Đã khóa' WHERE `taikhoan`.`MATK` = '$this->MATK'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function Unblock(){
        $db = new Db(); 
        $sql = "UPDATE `taikhoan` SET  `TRANGTHAI` = 'Đang hoạt động' WHERE `taikhoan`.`MATK` = '$this->MATK'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}
?>