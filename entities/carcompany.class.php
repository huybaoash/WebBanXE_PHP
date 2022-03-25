<?php 
require_once('config/db.class.php');
class CarCompany
{
    private $MAHSX;
    private $TENHSX;
    private $HINHANH;
    private $TRANGTHAI;
    function  __construct($mAHSX, $tENHSX, $hINHANH, $tRANGTHAI)
    {
        $this->MAHSX = $mAHSX;
        $this->TENHSX = $tENHSX;
        $this->HINHANH = $hINHANH;
        $this->TRANGTHAI = $tRANGTHAI;
    }
    function getMAHSX()
    {
        return $this->MAHSX;
    }
    function setMAHSX($mAHSX)
    {
        $this->MAHSX = $mAHSX;
    }
    function getTENHSX()
    {
        return $this->TENHSX;
    }
    function setTENHSX($tENHSX)
    {
        $this->TENHSX = $tENHSX;
    }
    function getHINHANH()
    {
        return $this->HINHANH;
    }
    function setHINHANH($hINHANH)
    {
        $this->HINHANH = $hINHANH;
    }
    function getTRANGTHAI()
    {
        return $this->TRANGTHAI;
    }
    function setTRANGTHAI($tRANGTHAI)
    {
        $this->TRANGTHAI = $tRANGTHAI;
    }

    public static function get_carcompany($id){
        $db = new Db();
        $sql = "SELECT * FROM hangsanxuat WHERE MAHSX = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hangsanxuat";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hangsanxuat WHERE `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();
       
        $sql = "INSERT INTO hangsanxuat (`TENHSX`, `HINHANH`, `TRANGTHAI`) VALUES 
        ('$this->TENHSX', 
        '$this->HINHANH', 
        '$this->TRANGTHAI')";

        $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `hangsanxuat` SET `TENHSX` = '$this->TENHSX', `HINHANH` = '$this->HINHANH', `TRANGTHAI` = '$this->TRANGTHAI' WHERE `hangsanxuat`.`MAHSX` = '$this->MAHSX'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    

    public function show(){
        $db = new Db(); 
        $sql = "UPDATE `hangsanxuat` SET `TRANGTHAI` = 'Công khai' WHERE `hangsanxuat`.`MAHSX` = '$this->MAHSX'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function hide(){
        $db = new Db(); 
        $sql = "UPDATE `hangsanxuat` SET `TRANGTHAI` = 'Ẩn' WHERE `hangsanxuat`.`MAHSX` = '$this->MAHSX'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}

    
?>