<?php 
// require_once("Controller/Manga.class.php"); 
    // include ("Controller/Manga.class.php");
    include ("Controller/Chapter.class.php");
    // include ("Controller/Theloai.class.php");
?>
<?php
include_once("header.php");
if(!isset($_GET["ma_truyen"]))
{
    header("Location: home.php");
}else{
    $ma_truyen = $_GET["ma_truyen"];
    // var_dump(array(Manga::ChitietMangaa($ma_truyen)));
    $chitiettruyen =Manga::ChitietMangaa($ma_truyen);
    $chitiettruyen =reset($chitiettruyen);
    $danhsachchap = Chapter::Chapcuatruyen($ma_truyen);
}
?>
<section class="main-content">
    <div class="container has-background-white story-detail">
        <div id="path">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/websitetruyen/home.php">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/websitetruyen/truyen.php?ma_truyen=<?php echo $chitiettruyen["IdManga"]; ?>">
                        <span itemprop="name"><?php echo $chitiettruyen["TenManga"]; ?></span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <div class="block01">
            <div class="left"><img src="<?php echo "/websitetruyen/" . $chitiettruyen["Anh"]; ?>" alt="<?php echo $chitiettruyen["TenManga"]; ?>" /></div>
            <div class="center">
                <h1><?php echo $chitiettruyen["TenManga"]; ?></h1>
                <div class="txt">
                    <p class="info-item"><?php echo "Tên khác:" .$chitiettruyen["TenKhac"];?></p>
                    <p class="info-item">Tác giả: <a class="org" href="#">Đang Cập Nhật</a></p>
                    <p class="info-item">Tình trạng: Đang Cập Nhật</p>
                    <div>
                        <span>Thống kê:</span>
                        <span class="sp01"><i class="fas fa-camera"></i> <span class="sp02 number-like">526</span></span>
                        <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02">2,657</span></span>
                        <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">1,037,569</span></span>
                    </div>
                </div>
                <ul class="list01">
                  <?php
                    $danhsachtheloai = Theloai::Theloaicuatruyen($chitiettruyen["IdManga"]);
                    foreach ($danhsachtheloai as $itemtl) {
                    ?>
                    <li class="li03"><a href="#"><?php echo $itemtl["TenTheloai"];?></a></li>
                <?php } ?>
                </ul>

                <ul class="story-detail-menu">
                    <li class="li01">
                    <a href="#" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                    </li>
                    <li class="li02"><a href="#" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="3572"><span class="fas fa-heart"></span>Theo dõi</a></a></li>
                    <li class="li03"><a href="#" class="button is-danger is-rounded btn-like" data-id="3572"><span class="fas fa-thumbs-up"></span>Thích</a></li>
                </ul>
                <div class="txt txt01 story-detail-info">
                    <p><?php echo $chitiettruyen['GioiThieu']; ?></p>
                </div>
            </div>
        </div>
        <ul class="story-detail-menu">
            <li class="li01"><a href="http://truyenqq.com/truyen-tranh/vuong-tuoc-tu-huu-bao-boi-3572-chap-1.html" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a></li>
            <li class="li02"><a href="javascript:void(0);" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="3572"><span class="fas fa-heart"></span>Theo dõi</a></a></li>
            <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like" data-id="3572"><span class="fas fa-thumbs-up"></span>Thích</a></li>
        </ul>
        <div class="block02">
            <div class="title">
                <h2 class="story-detail-title">Danh sách chương</h2>
            </div>
            <div class="box">
                <div class="works-chapter-list">
                    <?php
                    if($danhsachchap){ 
                    foreach($danhsachchap as $item ){ ?>
                    <div class="works-chapter-item row">
                        <div class="col-md-10 col-sm-10 col-xs-8 ">
                            <?php if($chitiettruyen["KieuTruyen"]==1){ ?>
                                <a target="_blank" href="chaptranh.php?machap=<?php echo $item["IdChapter"] ?>"><?php echo "Chương ".$item["SttChap"].":".$item["TenChap"]; ?></a>
                            <?php } else {?>
                                <a target="_blank" href="chapchu.php?machap=<?php echo $item["IdChapter"] ?>"><?php echo "Chương ".$item["SttChap"].":".$item["TenChap"]; ?></a>
                            <?php }?>
                           
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                           <?php echo $item["NgayTao"]?></div>
                    </div>
                    <?php }} else { ?>
                    <div class="works-chapter-item row">
                        Chưa cập nhập
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="block03">
            <h2 class="story-detail-title">Cùng thể loại</h2>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    <ul class="list-stories grid-6">
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                        <li>
                            <div class="story-item">
                                <a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144"><img class="story-cover" src="/websitetruyen/FileCSSJS/assets/images/fukakai-na-boku-no-subete-o_1557759637.jpg" alt="Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu"></a>
                                <div class="top-notice">
                                    <span class="time-ago">2 Tháng Trước</span> <span class="type-label hot">Hot</span> </div>
                                <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144">Itai No Wa Iya Nanode Bogyo-Ryoku N...</a></h3>
                                <div class="episode-book"><a href="http://truyenqq.com/truyen-tranh/itai-no-wa-iya-nanode-bogyo-ryoku-ni-kyokufuri-shitai-to-omoimasu-6144-chap-14.html"> Chương 14</a></div>
                                <div class="more-info">
                                    <div class="title-more">Itai No Wa Iya Nanode Bogyo-Ryoku Ni Kyokufuri Shitai To Omoimasu</div>
                                    <div class="title-more-other">Tên khác: Vì Sợ Đau Nên Tôi Nâng Hết Cho Phòng Thủ</div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 129,375</p>
                                    <p class="info">Lượt theo dõi: 1,436</p>
                                    <div class="list-tags">
                                        <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a> </div>
                                    <div class="excerpt">Honjou Kaede đã mời bạn mình Shiromine Risa chơi một trò VRMMO mới.... vì không muốn bị đau nên cô bé đã nâng hết cho phòng thủ. thế là cô bé trở thành một khiên thịt max trâu....
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.list-stories -->
        </div> <input type="hidden" id="book_id" value="3572" />
        <input type="hidden" id="total_page" value="13" />
        <input type="hidden" id="current_page" value="1" />
        <input type="hidden" id="id_textarea" value="" />
        <input type="hidden" id="parent_id" value="" />
        <input type="hidden" id="episode_name" value="" />
        <input type="hidden" id="episode_id" value="" />
        <input type="hidden" id="slug" value="vuong-tuoc-tu-huu-bao-boi" />
        <div class="comment-container">
            <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span class="comment-count">124</span>)</span>
            <div class="group01 comments-container">
                <div class="notify" style="padding: 10px; margin-bottom: 10px; background-color: #FFF;">
                    Like <a rel="nofollow" href="https://www.facebook.com/fantruyenqq" target="_blank">Fanpage</a> để ủng hộ TruyenQQ và cập nhật các thông tin mới nhất về các bộ truyện nhé. <div class="fb-like" data-href="https://www.facebook.com/fantruyenqq" data-send="false" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                </div>
                <div class="form-comment main_comment">
                    <div class="message-content">
                        <div class="input-comment">
                            <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="name_comment" type="text" placeholder="Họ tên"></span>
                            <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="email_comment" type="email" placeholder="Email"></span>
                        </div>
                        <div class="mess-input">
                            <textarea class="textarea" placeholder="Nội dung bình luận" id="content_comment"></textarea>
                            <button type="submit" class="click_emoji"></button>
                            <button type="submit" class="submit_comment"></button>
                        </div>
                    </div>
                </div>
                <div class="list-comment">
                    <article class="info-comment child_728007 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="/websitetruyen/FileCSSJS/assets/images/noavatar.png" alt="L">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>L</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                        <span class="time">23 Phút Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> Yêu cầu tác giả vẽ đẹp mộ t chút đc ko<img src="http://mangaqq.com/icon/bee/qiubilong_50.gif?r=r8645456" class="emoji_comment" /> </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="728007"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="728007" data-user="0" data-replyname="L"><i class="fas fa-comments"></i>
                                        Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_663202 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Đuỹ Mều Mập">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>Đuỹ Mều Mập</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                        <span class="time">14 Ngày Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> truyện đang dần bị lan man so vs cốt truyện lúc đầu, chap 187 lun r mà vẫn chưa đâu vào đâu, nét vẽ thì xấu khỏi nói... mình theo dõi từ những chap đầu tiên, riết r thấy truyện xa vời vs định nghĩ hay của lúc đầu lắm r </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="663202"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">1</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="663202" data-user="0" data-replyname="Đuỹ Mều Mập"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_609500 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://avatar.mangaqq.com/160x160/avatar_1582986077.jpg?r=r8645456" alt="Quang Quang">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>Quang Quang</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">28 Ngày Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> truyện quá hay. nhưng vẽ kém wa :( </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="609500"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="609500" data-user="163019" data-replyname="Quang Quang"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_586760 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://avatar.mangaqq.com/160x160/avatar_1580976265.jpg?r=r8645456" alt="Đỗ Thiên Nhi">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>Đỗ Thiên Nhi</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">1 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> truyện hay lắm ạ mong sớm ra chap mới chỉ cần vẽ nam 9 và nữ 9 đẹp 1 chút là được r <img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /> </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="586760"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="586760" data-user="151350" data-replyname="Đỗ Thiên Nhi"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_559855 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="t">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>t</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                        <span class="time">1 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> cũng hay </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="559855"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="559855" data-user="0" data-replyname="t"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_526724 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Yang Yang">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>Yang Yang</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">1 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> cốt truyện hay thật...nếu vẽ đẹp chút nữa là đc rồi...đằng này, cả nam9 nữ9 đều ko đẹp, đọc mà ko cs cảm xúc j cả:(((( </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="526724"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">3</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="526724" data-user="157905" data-replyname="Yang Yang"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_514816 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://avatar.mangaqq.com/160x160/avatar_1581091133.jpg?r=r8645456" alt="koro sushine">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>koro sushine</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">2 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> hmm </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="514816"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="514816" data-user="76245" data-replyname="koro sushine"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_514815 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://avatar.mangaqq.com/160x160/avatar_1581091133.jpg?r=r8645456" alt="koro sushine">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>koro sushine</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">2 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> hmm </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="514815"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="514815" data-user="76245" data-replyname="koro sushine"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_493701 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Truck-kun">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>Truck-kun</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">2 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> Máy tuổi L ma dung chuy<br><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /> </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="493701"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="493701" data-user="118828" data-replyname="Truck-kun"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="info-comment child_479477 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                            <figure class="avartar-comment">
                                <img src="http://avatar.mangaqq.com/160x160/avatar_1582609592.jpg?r=r8645456" alt="sakura x  li">
                            </figure>
                            <div class="item-comment">
                                <div class="outline-content-comment">
                                    <div>
                                        <strong>sakura x li</strong><span class="title-user-comment title-member">Thành Viên</span>
                                        <span class="time">3 Tháng Trước</span>
                                    </div>
                                    <div class="content-comment">
                                        <strong></strong> Có liêm sỉ ko vậy anh </div>
                                </div>
                                <div class="action-comment">
                                    <span class="like-comment" data-id="479477"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                    <span class="reply-comment" data-parent="0" data-id="479477" data-user="51606" data-replyname="sakura x  li"><i class="far fa-comment"></i> Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="load-more load_more_comment"><a class="button is-info">Xem thêm nhiều bình luận</a></div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>