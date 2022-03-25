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
}
?>