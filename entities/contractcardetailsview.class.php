<?php 
require_once('config/db.class.php');
class ContractCarDetailsView
{
    private $MATK;
    private $MAXE;
    private $MAHD;
    private $MALOAIXE;
    private $MAHSX;
    private $BAOHANH;
    private $NAMSANXUAT;
    private $TENTK;
    private $DIADIEM;
    private $TRANGTHAI;
    private $HINHANH;
    private $TENLOAIXE;
    private $TENHSX;
    private $TENXE;
    private $GIA;
    private $NGAYLAP;
    function  __construct($mATK, $mAXE, $nAMSANXUAT, $mAHD, $mALOAIXE, $mAHSX, $bAOHANH, $tENTK, $dIADIEM, $tRANGTHAI, $hINHANH, $tENLOAIXE, $tENHSX, $tENXE, $gIA, $nGAYLAP)
    {
        $this->MATK = $mATK;
        $this->MAXE = $mAXE;
        $this->MAHD = $mAHD;
        $this->MALOAIXE = $mALOAIXE;
        $this->MAHSX = $mAHSX;
        $this->BAOHANH = $bAOHANH;
        $this->NAMSANXUAT = $nAMSANXUAT;
        $this->TENTK = $tENTK;
        $this->TENXE = $tENXE;
        $this->DIADIEM = $dIADIEM;
        $this->TRANGTHAI = $tRANGTHAI;
        $this->HINHANH = $hINHANH;
        $this->TENLOAIXE = $tENLOAIXE;
        $this->TENHSX = $tENHSX;
        $this->GIA = $gIA;
        $this->NGAYLAP = $nGAYLAP;
    }
 

    public static function get_contract_byMAHD($id){
        $db = new Db();
        $sql = "SELECT * FROM hopdong_xe WHERE MAHD = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function get_contract_byMAXE($id){
        $db = new Db();
        $sql = "SELECT * FROM hopdong_xe WHERE MAXE = '$id'";        
        $result = $db -> select_to_array($sql);
        return $result;
    }

    public static function toList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList(){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe WHERE `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList_Limit4_OrderByDate(){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe WHERE `TRANGTHAI`= 'Công khai' ORDER BY MAHD desc LIMIT 4";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList_byMATK($matk){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe WHERE MATK = '$matk' AND `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toDoneList_byMATK($matk){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe_nguoimua WHERE MANGUOIMUA = '$matk' AND `TRANGTHAI`= 'Hoàn tất giao dịch'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    

    public static function toPublicList_byMALOAIXE($maloaixe){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe WHERE MALOAIXE = '$maloaixe' AND `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }

    public static function toPublicList_byMAHSX($mahsx){
        $db = new Db();
       
        $sql = "SELECT * FROM hopdong_xe WHERE MAHSX = '$mahsx' AND `TRANGTHAI`= 'Công khai'";
        $result = $db -> select_to_array($sql);
        return $result;
        
    }
}
?>