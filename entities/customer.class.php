<?php 
require_once('config/db.class.php');
class Customer
{
    private $MAKH;
    private $TENKH;
    private $CMND;
    private $SDT;
    private $EMAIL;
    private $GIOITINH;
    private $DIACHI;
    function  __construct($mAKH, $tENKH, $cMND, $sDT, $eMAIL, $gIOITINH, $dIACHI)
    {
        $this->MAKH = $mAKH;
        $this->TENKH = $tENKH;
        $this->CMND = $cMND;
        $this->SDT = $sDT;
        $this->EMAIL = $eMAIL;
        $this->GIOITINH = $gIOITINH;
        $this->DIACHI = $dIACHI;
    }
    public function getMAKH()
    {
        return $this->MAKH;
    }
    public function setMAKH($mAKH)
    {
        $this->MAKH = $mAKH;
    }
    public function getTENKH()
    {
        return $this->TENKH;
    }
    public function setTENKH($tENKH)
    {
        $this->TENKH = $tENKH;
    }
    public function getCMND()
    {
        return $this->CMND;
    }
    public function setCMND($cMND)
    {
        $this->CMND = $cMND;
    }
    public function getSDT()
    {
        return $this->SDT;
    }
    public function setSDT($sDT)
    {
        $this->SDT = $sDT;
    }
    public function getEMAIL()
    {
        return $this->EMAIL;
    }
    public function setEMAIL($eMAIL)
    {
        $this->EMAIL = $eMAIL;
    }
    public function getGIOITINH()
    {
        return $this->GIOITINH;
    }
    public function setGIOITINH($gIOITINH)
    {
        $this->GIOITINH = $gIOITINH;
    }
    public function getDIACHI()
    {
        return $this->DIACHI;
    }
    public function setDIACHI($dIACHI)
    {
        $this->DIACHI = $dIACHI;
    }

    public static function get_customer($id){
        $db = new Db();
        $sql = "SELECT * FROM khachhang WHERE MAKH = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function get_customer_byCMND($id){
        $db = new Db();
        $sql = "SELECT * FROM khachhang WHERE CMND = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM khachhang";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

   

    public function add(){
        $db = new Db();
       
        $sql = "INSERT INTO `khachhang` (`TENKH`, `SDT`, `EMAIL`, `GIOITINH`, `DIACHI`, `CMND`) VALUES 
        ('$this->TENKH', 
        '$this->SDT', 
        '$this->EMAIL', 
        '$this->GIOITINH', 
        '$this->DIACHI', 
        '$this->CMND')";

        $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `khachhang` SET `TENKH` = '$this->TENKH',  `SDT` = '$this->SDT',  `EMAIL` = '$this->EMAIL', `GIOITINH` = '$this->GIOITINH',  `DIACHI` = '$this->DIACHI',  `CMND` = '$this->CMND' WHERE `khachhang`.`MAKH` = '$this->MAKH' ";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    

}
?>