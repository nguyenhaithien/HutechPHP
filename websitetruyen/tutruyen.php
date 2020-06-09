<?php
// require_once("Controller/Manga.class.php");
// require_once("Controller/Theloai.class.php");
// require_once("Controller/timesince.php");
?>
<?php
include_once("header.php");
if (!isset($_GET["matk"])) {
    header("Location: home.php");
} else {
    $IdUser = $_GET["matk"];
    $danhsachtruyen = Manga::DanhSachMangaTheoIdUser($IdUser);
}
?>
<section class="main-content">
    <div class="container story-list">
        <div class="title-list">
            Tủ Truyện Của Bạn
            <a style="margin-left: 10%;" href="dangtruyen.php" class="btn btn-primary"> Đăng ký truyện</a>
        </div>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
                <?php
                if ($danhsachtruyen) {
                ?>
                    <ul class="list-stories grid-6">
                        <?php
                        foreach ($danhsachtruyen as $item) {
                        ?>
                            <li>
                                <div class="story-item">
                                    <span class="remove-subscribe" title="Xóa Truyện" data-id="{{manga.id}}"><i class="far fa-times-circle"></i></span>
                                    <a href="/websitetruyen/edittruyen.php?ma_truyen=<?php echo $item['IdManga'] ?>"><img class="story-cover" src="<?php echo "/websitetruyen/" . $item["Anh"]; ?>" alt="<?php echo $item["TenManga"]; ?>" /></a>
                                    <div class="top-notice">
                                        <span class="time-ago">
                                        <?php
                                            if($item["ChuongCuoi"] == '0')
                                            {
                                               echo "Tạo chương!";
                                            }
                                            else{
                                             if ($item["NgayDang"] == NULL) {
                                                                echo "";
                                                                } else {

                                                                    // $date = date_create($item['NgayDang']);
                                                                    // echo get_time_ago(strtotime(date_format($date,'Y-m-d')));
                                                                    // echo humanTiming(strtotime($item['NgayDang']));
                                                                echo get_time_ago(strtotime($item['NgayDang']));
                                                                }
                                            }
                                                             
                                                                ?></span>
                                        <span class="type-label hot">Hot</span>
                                    </div>
                                    <h3 class="title-book">
                                        <a href="/websitetruyen/editruyen.php?ma_truyen=<?php echo $item['IdManga'] ?>"><?php echo $item["TenManga"]; ?></a>
                                    </h3>
                                    <div class="episode-book">
                                    <?php 
                                        if($item["ChuongCuoi"]=='0')
                                        {
                                    ?>
                                    <a href="dangchuong.php">
                                        Đăng Chương
                                    </a>
                                    <?php }else{ ?>
                                        <a href="/websitetruyen/truyen.php?ma_truyen=<?php echo $item['IdManga'] ?>">
                                            <?php echo "Chương " . $item["ChuongCuoi"]; ?></a>
                                    <?php }?>
                                    </div>
                                    <div class="more-info">
                                        <div class="title-more">
                                            <?php echo $item["TenManga"]; ?>
                                        </div>
                                        <div class="title-more-other">
                                            Tên khác: <?php echo $item["TenKhac"] ?>
                                        </div>
                                        <p class="info">Tình trạng: Đang Cập Nhật</p>
                                        <p class="info">Lượt xem: 55,789</p>
                                        <p class="info">Lượt theo dõi: 750</p>
                                        <div class="list-tags">
                                            <?php
                                            $danhsachtheloai = Theloai::Theloaicuatruyen($item["IdManga"]);
                                            foreach ($danhsachtheloai as $itemtl) {
                                            ?>
                                                <a class="blue" href="#"> <?php echo $itemtl["TenTheloai"]; ?></a>
                                            <?php } ?>
                                        </div>
                                        <div class="excerpt">
                                            <?php echo $item["GioiThieu"]; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.story-item -->
                                <!-- /.story-item -->
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p style="text-align: center; color: red;font-size: 15px;">Bạn chưa đăng ký truyện nào ^^</p>
                <?php } ?>
            </div>
        </div>
        <!-- /.list-stories -->
    </div>
</section>
<?php require_once("footer.php") ?>