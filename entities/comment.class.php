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
       
        $sql = "SELECT * FROM binhluan WHERE `binhluan`.`MATK` = '$MATK' ";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public function add(){
        $db = new Db();
        $sql = "INSERT INTO `binhluan` (`NDBL`, `MAHD`, `MATK`) VALUES 
        ('$this->NDBL',
        '$this->MAHD', 
        '$this->MATK')";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function remove($MABL){
        $db = new Db(); 
        $sql = "DELETE FROM `binhluan` WHERE `giohopdong`.`MABL` = '$MABL' ";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}
?>