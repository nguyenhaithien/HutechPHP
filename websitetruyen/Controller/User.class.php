<?php
require_once("/websitetruyen/Config/db.class.php");
class User
{
    public $IdUser;
    public $UserName;
    public $Email;
    public $Password;
    public $DangNhapLanCuoi;
    public $NgayDangKy;
    public $MaGroup;

    public function __construct($IdUser, $UserName, $Email, $Password, $DangNhapLanCuoi,$NgayDangKy, $MaGroup)
    {
        $this->IdUser = $IdUser;
        $this->UserName = $UserName;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->DangNhapLanCuoi = $DangNhapLanCuoi;
        $this->NgayDangKy = $NgayDangKy;
        $this->MaGroup = $MaGroup;
    }
    // public function save()
    // {
    //     $db = new Db();
    //     $sql = "INSERT INTO usergroup (Id, TenGroup, NgayTaoGroup) VALUES
    //     ('$this->id','$this->TenGroup','$this->NgayTaoGroup')";
    //     $result = $db->query_execute($sql);
    //     return $result;
    // }
    // public function edit($id,$TenGroup,$NgayTaoGroup)
    // {
    //     $db = new Db();
    //     $sql = "UPDATE usergroup SET TenGroup =" +$TenGroup+", NgayTaoGroup ="+ $NgayTaoGroup +"WHERE Id ="+$id;
    //     $result = $db->query_execute($sql);
    //     return $result;
    // }
    // public function delete($id)
    // {
    //     $db = new Db();
    //     $sql = "DELETE FROM usergroup WHERE Id ="+$id;
    //     $result = $db->query_execute($sql);
    //     if($result > 1)
    //     {
    //         return TRUE;
    //     }
    //     else{
    //         return FALSE;
    //     }
    // }
    // public static function Danhsachusergroup()
    // {
    //     $db = new Db();
    //     $sql = "SELECT * FROM usergroup";
    //     $result = $db->select_to_array($sql);
    //     return $result;
    // }
    // public static function DanhSachTimKiem($timkiem)
    // {
    //     $db=new Db();
    //     $sql = "SELECT * FROM usergroup WHERE TenGroup like '%$timkiem%'";
    //     $result = $db->select_to_array($sql);
    //     return $result;
    // }
}
?>