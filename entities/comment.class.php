<?php 
require_once('config/db.class.php');
class Comment
{
    private $MABL;
    private $NDBL;
    private $MAHD;
    private $MATK;
    private $NGAYDANG;
        
    function  __construct($mABL, $nDBL, $mAHD,$maTK,$nGAYDANG)
    {
        $this->MABL = $mABL;
        $this->NDBL = $nDBL;
        $this->MAHD = $mAHD;
        $this->MATK = $maTK;
        $this->NGAYDANG = $nGAYDANG;
    }
    function getMABL()
    {
        return $this->MABL;
    }
    function setMABL($mABL)
    {
        $this->MABL = $mABL;
    }
    function getNDBL()
    {
        return $this->NDBL;
    }
    function setNDBL($nDBL)
    {
        $this->NDBL = $nDBL;
    }
    function getMATK()
    {
        return $this->MATK;
    }
    function setMATK($mATK)
    {
        $this->MATK = $mATK;
    }
    function getNGAYDANG()
    {
        return $this->NGAYDANG;
    }
    function setNGAYDANG($nGAYDANG)
    {
        $this->NGAYDANG = $nGAYDANG;
    }


    public static function toList_byMATK($MATK){
        $db = new Db();
       
        $sql = "SELECT * FROM giohopdong WHERE `giohopdong`.`MATK` = '$MATK' ";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();
        $sql = "INSERT INTO `giohopdong` (`MAHD`, `MATK`) VALUES 
        ('$this->MAHD', 
        '$this->MATK')";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function remove($id){
        $db = new Db(); 
        $sql = "DELETE FROM `giohopdong` WHERE `giohopdong`.`Id` = '$id' ";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}
?>