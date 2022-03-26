<?php 
require_once('config/db.class.php');
class Car
{
    private $MAXE;
    private $BAOHANH;
    private $NAMSANXUAT;
    private $MALOAIXE;
    private $MAHSX;
    private  $TENXE;
    private  $NOIDUNGXE;
    private  $HINHANH;
    private  $TRANGTHAI;
    private  $GIA;
    function  __construct($mAXE, $bAOHANH, $nAMSANXUAT, $mALOAIXE, $mAHSX, $tENXE, $nOIDUNGXE, $hINHANH, $tRANGTHAI, $gIA)
    {
        $this->MAXE = $mAXE;
        $this->TENXE = $tENXE;
        $this->NOIDUNGXE = $nOIDUNGXE;
        $this->HINHANH = $hINHANH;
        $this->BAOHANH = $bAOHANH;
        $this->GIA = $gIA;
        $this->NAMSANXUAT = $nAMSANXUAT;
        $this->MALOAIXE = $mALOAIXE;
        $this->MAHSX = $mAHSX;
        $this->TRANGTHAI = $tRANGTHAI;
    }
    function getMAXE()
    {
        return $this->MAXE;
    }
    function setMAXE($mAXE)
    {
        $this->MAXE = $mAXE;
    }
    function getBAOHANH()
    {
        return $this->BAOHANH;
    }
    function setBAOHANH($bAOHANH)
    {
        $this->BAOHANH = $bAOHANH;
    }
    function getNAMSANXUAT()
    {
        return $this->NAMSANXUAT;
    }
    function setNAMSANXUAT($nAMSANXUAT)
    {
        $this->NAMSANXUAT = $nAMSANXUAT;
    }
    function getMALOAIXE()
    {
        return $this->MALOAIXE;
    }
    function setMALOAIXE($mALOAIXE)
    {
        $this->MALOAIXE = $mALOAIXE;
    }
    function getMAHSX()
    {
        return $this->MAHSX;
    }
    function setMAHSX($MAHSX)
    {
        $this->MAHSX = $MAHSX;
    }
    function getTENXE()
    {
        return $this->TENXE;
    }
    function setTENXE($tENXE)
    {
        $this->TENXE = $tENXE;
    }
    function getNOIDUNGXE()
    {
        return $this->NOIDUNGXE;
    }
    function setNOIDUNGXE($nOIDUNGXE)
    {
        $this->NOIDUNGXE = $nOIDUNGXE;
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
    function getGIA()
    {
        return $this->GIA;
    }
    function setGIA($gIA)
    {
        $this->GIA = $gIA;
    }


    public static function get_car($id){
        $db = new Db();
        $sql = "SELECT * FROM xe WHERE MAXE = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM xe";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList(){
        $db = new Db();
       
        $sql = "SELECT * FROM xe WHERE `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();

        $sql = "INSERT INTO `xe` (`TENXE`, `NOIDUNGXE`, `HINHANH`, `BAOHANH`, `GIA`, `NAMSANXUAT`, `MALOAIXE`, `MAHSX`, `TRANGTHAI`) VALUES 
        ('$this->TENXE', 
        '$this->NOIDUNGXE', 
        '$this->HINHANH', 
        '$this->BAOHANH', 
        '$this->GIA', 
        '$this->NAMSANXUAT', 
        '$this->MALOAIXE', 
        '$this->MAHSX', 
        '$this->TRANGTHAI')";

        $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `xe` SET `TENXE` = '$this->TENXE',  `NOIDUNGXE` = '$this->NOIDUNGXE',  `HINHANH` = '$this->HINHANH',  `BAOHANH` = '$this->BAOHANH', `GIA` = '$this->GIA',  `NAMSANXUAT` = '$this->NAMSANXUAT',  `MALOAIXE` = '$this->MALOAIXE',  `MAHSX` = '$this->MAHSX',  `TRANGTHAI` = '$this->TRANGTHAI' WHERE `xe`.`MAXE` = '$this->MAXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    

    public function show(){
        $db = new Db(); 
        $sql = "UPDATE `xe` SET `TRANGTHAI` = 'Công khai' WHERE `xe`.`MAXE` = '$this->MAXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function hide(){
        $db = new Db(); 
        $sql = "UPDATE `xe` SET `TRANGTHAI` = 'Ẩn' WHERE `xe`.`MAXE` = '$this->MAXE'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    
}
?>