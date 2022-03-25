<?php 
require_once('config/db.class.php');
class CarType
{
    private $MALOAIXE;
    private $TENLOAIXE;
    private $HINHANH;
    private $TRANGTHAI;

    function  __construct($mALOAIXE, $tENLOAIXE, $hINHANH, $tRANGTHAI)
    {
        $this->MALOAIXE = $mALOAIXE;
        $this->TENLOAIXE = $tENLOAIXE;
        $this->HINHANH = $hINHANH;
        $this->TRANGTHAI = $tRANGTHAI;
    }

    function getMALOAIXE()
    {
        return $this->MALOAIXE;
    }
    function setMALOAIXE($mALOAIXE)
    {
        $this->MALOAIXE = $mALOAIXE;
    }
    function getTENLOAIXE()
    {
        return $this->TENLOAIXE;
    }
    function setTENLOAIXE($tENLOAIXE)
    {
        $this->TENLOAIXE = $tENLOAIXE;
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

    public static function get_cartype($id){
        $db = new Db();
        $sql = "SELECT * FROM loaixe WHERE MALOAIXE = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM loaixe";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList(){
        $db = new Db();
       
        $sql = "SELECT * FROM loaixe WHERE `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();
       
        $sql = "INSERT INTO loaixe (`TENLOAIXE`, `HINHANH`, `TRANGTHAI`) VALUES 
        ('$this->TENLOAIXE', 
        '$this->HINHANH', 
        '$this->TRANGTHAI')";

        $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `loaixe` SET `TENLOAIXE` = '$this->TENLOAIXE', `HINHANH` = '$this->HINHANH', `TRANGTHAI` = '$this->TRANGTHAI' WHERE `loaixe`.`MALOAIXE` = '$this->MALOAIXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    

    public function show(){
        $db = new Db(); 
        $sql = "UPDATE `loaixe` SET `TRANGTHAI` = 'Công khai' WHERE `loaixe`.`MALOAIXE` = '$this->MALOAIXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function hide(){
        $db = new Db(); 
        $sql = "UPDATE `loaixe` SET `TRANGTHAI` = 'Ẩn' WHERE `loaixe`.`MALOAIXE` = '$this->MALOAIXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}
?>