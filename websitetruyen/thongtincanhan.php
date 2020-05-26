<?php
include_once("header.php");
?>
<section class="main-content">
    <div class="container">
        <div class="messages columns">
            <div class="column is-narrow left pc">
                <ul class="nav-user">
                    <li><a class="li01 is-active" href="info.html">Quản lý tài khoản</a></li>
                    <li><a class="li02 " href="tinnhan.html">Tin nhắn</a></li>
                    <li><a class="li03 " href="#">Đổi mật khẩu</a></li>
                    <!--<li><a class="li04 regiter-team"href="group.html">Đăng ký nhóm dịch</a></li>
                <li><a class="li05 collection" href="collection.html">Quyên góp</a></li>-->
                </ul>
            </div>
            <div class="column columns">
                <div class="user-right column">
                    <div class="img"><img class="image-avatar" src="http://truyenqq.com/template/frontend/images/info-user-img01.png" alt="" /></div>
                    <input type="file" multiple="false" name="files[]" id="uploadavatar" style="display: none;">
                    <button class="button is-danger btn-avatar">Chọn hình</button>
                </div>
                <div class="user-main column">
                    <div class="level title">
                        <p class="level-left has-text-weight-bold">Thông tin tài khoản</p>
                    </div>
                    <form method="post">
                        <div class="form-change-pass">
                            <div class="field">
                                <p class="txt">UID:</p>
                                <p class="control">
                                    <input class="input" type="text" value="69003" disabled>
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Email:</p>
                                <p class="control">
                                    <input class="input" type="email" value="hutech@it.edu.vn" disabled>
                                </p>
                            </div>
                        </div>
                        <div class="level title user-title">
                            <p class="level-left has-text-weight-bold">Thông tin cá nhân</p>
                        </div>
                        <div class="form-change-pass user-form">
                            <div class="field">
                                <p class="txt">Họ</p>
                                <p class="control">
                                    <input class="input" type="text" id="last_name" name="last_name" value="16DTHa3">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Tên</p>
                                <p class="control">
                                    <input class="input" type="text" id="first_name" name="first_name" value="Nhóm 5 đứa già">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Ngày sinh</p>
                                <p class="control">
                                    <input class="input" type="date" id="birthday" name="birthday" value="26/05/1998">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Điện thoại</p>
                                <p class="control">
                                    <input class="input" id="phone" name="phone" type="number" value="xxxxxxxxxxxx">
                                </p>
                            </div>
                            <div class="field user-field">
                                <span class="txt">Giới tính</span>
                                <input type="radio" id="gender1" name="gender" value="1" checked>
                                <label for="gender1">Nam</label>
                                <input type="radio" id="gender2" name="gender" value="0">
                                <label for="gender2">Nữ</label>
                            </div>
                            <div class="field">
                                <p class="txt">Mật khẩu hiện tại:</p>
                                <p class="control">
                                    <input class="input" id="password_old" name="password_old" type="password" value="">
                                </p>
                            </div>
                            <input type="hidden" id="avatar" name="avatar" value="">
                            <input type="hidden" id="inputDelImage" name="inputDelImage" value="">
                            <div class="field">
                                <p class="control">
                                    <button class="button is-danger" type="submit">Lưu</button>
                                </p>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<?php include_once("footer.php"); ?>