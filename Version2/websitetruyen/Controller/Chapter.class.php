<?php
require_once("Config/db.class.php");
class Chapter
{
    public static function Chapcuatruyen($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT `chapter`.* FROM `chapter`, `manga` WHERE `chapter`.`Manga`=`manga`.`IdManga` and `manga`.`IdManga` = $ma_truyen";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function ThongtinChap($sttchap, $matruyen)
    {
        $db = new Db();
        $sql = "SELECT * FROM `chapter`,`manga` WHERE `manga`.`IdManga`=`chapter`.`Manga` and chapter.SttChap = $sttchap and manga.IdManga= $matruyen";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function SttChapNextCreate($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT chapter.SttChap FROM manga, chapter WHERE chapter.Manga=manga.IdManga and manga= '$ma_truyen' ORDER BY SttChap DESC LIMIT 1";
        $result  = $db->select_to_array($sql);
        return $result;
    }
    public static function SttChapFirst($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT  chapter.IdChapter,chapter.SttChap FROM manga, chapter WHERE chapter.Manga=manga.IdManga and manga= '$ma_truyen' ORDER BY SttChap ASC LIMIT 1";
        $result  = $db->select_to_array($sql);
        return $result;
    }
    public static function ThemChuongMoi($SttChap,$TenChap,$NoiDung, $NguoiDang, $Manga)
    {
        $ngaygiovietnam= new DateTimeZone('Asia/Ho_Chi_Minh');
        $ngay= new DateTime;
        $ngay->setTimezone($ngaygiovietnam);
        $ngayhientai =$ngay->format('y-m-d H:i:s');
        $db = new Db();
        $sql = "INSERT INTO `chapter`(`SttChap`, `TenChap`, `Noidung`, `NguoiDangChap`, `NgayTao`, `Manga`) VALUES ('$SttChap','$TenChap','$NoiDung','$NguoiDang','$ngayhientai','$Manga')";
        $result  = $db->query_execute($sql);
        if($result)
        {
            $sql1 = "UPDATE `manga` SET ChuongCuoi='$SttChap',NgayDang='$ngayhientai' WHERE IdManga='$Manga'";
            // var_dump($sql1);
            $result1  = $db->query_execute($sql1);
            // var_dump($result1);die();
            return $result1;
        }
        
    }
}
