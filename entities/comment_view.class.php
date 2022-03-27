<?php 
require_once('config/db.class.php');
class CommentView
{
    private $MABL;
    private $NDBL;
    private $MAHD;
    private $MATK;
    private $TENTK;
    private $NGAYDANG;
        
    function  __construct($mABL, $nDBL, $mAHD,$maTK,$tENTK,$nGAYDANG)
    {
        $this->MABL = $mABL;
        $this->NDBL = $nDBL;
        $this->MAHD = $mAHD;
        $this->MATK = $maTK;
        $this->NGAYDANG = $nGAYDANG;
        $this->TENTK = $tENTK;
    }
    function getMABL()
    {
        return $this->MABL;
    }
    function setMABL($mABL)
    {
        $this->MABL = $mABL;
    }

    function getMAHD()
    {
        return $this->MAHD;
    }
    function setMAHDL($mAHD)
    {
        $this->MAHD = $mAHD;
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
    function getTENTK()
    {
        return $this->TENTK;
    }
    function setTENTK($tENTK)
    {
        $this->TENTK = $tENTK;
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
       
        $sql = "SELECT * FROM binhluan_ten WHERE `binhluan_ten`.`MATK` = '$MATK' ";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toList_byMAHD($MAHD){
        $db = new Db();
       
        $sql = "SELECT * FROM binhluan_ten WHERE `binhluan_ten`.`MAHD` = '$MAHD' ";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

   
}
?>