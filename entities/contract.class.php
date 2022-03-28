<?php 
require_once('config/db.class.php');
class Contract
{
    private $MAHD;
    private $MANGUOIBAN;
    private $MANGUOIMUA;
    private $MAXE;
    private $NOIDUNGHD;
    private $TRANGTHAI;
    private $DIADIEM;
    private $GIA;
    private $NGAYLAP;
    function  __construct($mAHD, $mANGUOIBAN, $mANGUOIMUA, $mAXE, $nOIDUNGHD, $tRANGTHAI, $dIADIEM, $gIA, $nGAYLAP)
    {
        $this->MAHD = $mAHD;
        $this->MANGUOIBAN = $mANGUOIBAN;
        $this->MANGUOIMUA = $mANGUOIMUA;
        $this->MAXE = $mAXE;
        $this->NOIDUNGHD = $nOIDUNGHD;
        $this->GIA = $gIA;
        $this->NGAYLAP = $nGAYLAP;
        $this->TRANGTHAI = $tRANGTHAI;
        $this->DIADIEM = $dIADIEM;
    }
    function getMAHD()
    {
        return $this->MAHD;
    }
    function setMAHD($mAHD)
    {
        $this->MAHD = $mAHD;
    }
    function getMANGUOIBAN()
    {
        return $this->MANGUOIBAN;
    }
    function setMANGUOIBAN($mANGUOIBAN)
    {
        $this->MANGUOIBAN = $mANGUOIBAN;
    }
    function getMANGUOIMUA()
    {
        return $this->MANGUOIMUA;
    }
    function setMANGUOIMUA($mANGUOIMUA)
    {
        $this->MANGUOIMUA = $mANGUOIMUA;
    }
    function getMAXE()
    {
        return $this->MAXE;
    }
    function setMAXE($mAXE)
    {
        $this->MAXE = $mAXE;
    }
    function getNOIDUNGHD()
    {
        return $this->NOIDUNGHD;
    }
    function setNOIDUNGHD($nOIDUNGHD)
    {
        $this->NOIDUNGHD = $nOIDUNGHD;
    }
    function getDIADIEM()
    {
        return $this->DIADIEM;
    }
    function setDIADIEM($dIADIEM)
    {
        $this->DIADIEM = $dIADIEM;
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
    function getNGAYLAP()
    {
        return $this->NGAYLAP;
    }
    function setNGAYLAP($nGAYLAP)
    {
        $this->NGAYLAP = $nGAYLAP;
    }

    public static function get_contract($id){
        $db = new Db();
        $sql = "SELECT * FROM hopdong WHERE MAHD = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toList_byMATK($MATK){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong WHERE `MANGUOIBAN` = '$MATK'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong WHERE `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toDoneList_byMANGUOIMUA($MANGUOIMUA){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong WHERE `TRANGTHAI`= 'Hoàn tất giao dịch' AND 'MANGUOIMUA' = '$MANGUOIMUA'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();
       
        $sql = "INSERT INTO `hopdong` (`MANGUOIBAN`, `MAXE`, `NOIDUNGHD`, `GIA`, `TRANGTHAI`, `DIADIEM`) VALUES 
        ('$this->MANGUOIBAN', 
        '$this->MAXE', 
        '$this->NOIDUNGHD', 
        '$this->GIA', 
        '$this->TRANGTHAI',
        '$this->DIADIEM')";

        $result = $db -> query_execute($sql);
        return $result;
        

    }

    public function update(){
        $db = new Db(); 
        $sql = "UPDATE `hopdong` SET `NOIDUNGHD` = '$this->NOIDUNGHD', `GIA` = '$this->GIA', `TRANGTHAI` = '$this->TRANGTHAI', `DIADIEM` = '$this->DIADIEM' WHERE `hopdong`.`MAHD` = '$this->MAHD'";
     
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function update_by_buyer(){
        $db = new Db(); 
        $sql = "UPDATE `hopdong` SET `MANGUOIMUA` = '$this->MANGUOIMUA' WHERE `hopdong`.`MAHD` = '$this->MAHD'";
     
        $result = $db -> query_execute($sql);
        return $result;
        
    }
    

    public function lock(){
        $db = new Db(); 
        $sql = "UPDATE `hopdong` SET `TRANGTHAI` = 'Đã khóa' WHERE `hopdong`.`MAHD` = '$this->MAHD'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function unlock(){
        $db = new Db(); 
        $sql = "UPDATE `hopdong` SET `TRANGTHAI` = 'Công khai' WHERE `hopdong`.`MAHD` = '$this->MAHD'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function done(){
        $db = new Db(); 
        $sql = "UPDATE `hopdong` SET `TRANGTHAI` = 'Hoàn tất giao dịch' WHERE `hopdong`.`MAHD` = '$this->MAHD'";
        $result = $db -> query_execute($sql);
        return $result;
        
    }


}
?>