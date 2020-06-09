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

    public static function ThongtinChap($machap)
    {
        $db = new Db();
        $sql = "SELECT * FROM `chapter`,`manga` WHERE `manga`.`IdManga`=`chapter`.`Manga` and chapter.IdChapter= $machap ";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
