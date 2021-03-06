<?php 
require_once('config/db.class.php');
class ContractCart
{
    private $Id;
    private $MAHD;
    private $MATK;
    function  __construct($id, $mAHD, $mATK)
    {
        $this->Id = $id;
        $this->MAHD = $mAHD;
        $this->MATK = $mATK;
    }
    function getId()
    {
        return $this->Id;
    }
    function setId($id)
    {
        $this->Id = $id;
    }
    function getMAHD()
    {
        return $this->MAHD;
    }
    function setMAHD($mAHD)
    {
        $this->MAHD = $mAHD;
    }
    function getMATK()
    {
        return $this->MATK;
    }
    function setMATK($mATK)
    {
        $this->MATK = $mATK;
    }

    public static function get_contractcart_item($id){
        $db = new Db();
        $sql = "SELECT * FROM giohopdong WHERE `giohopdong`.`Id` = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList_byMATK($MATK){
        $db = new Db();
       
        $sql = "SELECT * FROM giohopdong WHERE `giohopdong`.`MATK` = '$MATK' ";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }
    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM giohopdong ";
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

    public function remove(){
        $db = new Db(); 
        $sql = "DELETE FROM `giohopdong` WHERE `giohopdong`.`Id` = '$this->Id' ";
        $result = $db -> query_execute($sql);
        return $result;
        
    }

    public function remove_allcart_hasMAHD(){
        $db = new Db(); 
        $sql = "DELETE FROM `giohopdong` WHERE `giohopdong`.`MAHD` = '$this->MAHD' ";
        $result = $db -> query_execute($sql);
        return $result;
        
    }
}
?>