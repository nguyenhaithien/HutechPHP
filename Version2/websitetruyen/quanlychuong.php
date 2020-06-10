<?php 
include_once("header.php");

?>
<section class="main-content">
  <div class="container has-background-white story-detail">
    <div id="path">
      <ol class="breadcrumb" itemscope itemtype="#">
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="home.php">
            <span itemprop="name">Trang Chủ</span>
          </a>
          <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="tutruyen.php?matk=<?php echo $_SESSION["user"] ?>">
            <span itemprop="name">Tủ Truyện</span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="#">
            <span itemprop="name">Truyện</span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
      </ol>
    </div>
    <div class="block01">
      <div class="left">
        <img src="/Images/Manga/1.jpg" alt="Vương Tước Tư Hữu Bảo Bối" />
      </div>
      <div class="center">
        <h1>Vương Tước Tư Hữu Bảo Bối</h1>
        <div class="txt">
          <p class="info-item">
            Tên Khác :
            <a href="{% url 'truyen-tranh' manga.Slug %}"
              >Vương Tước Tư Hữu Bảo Bối</a
            >
          </p>
          <p class="info-item">
            <a class="org" href="#">Vương Tước Tư Hữu Bảo Bối</a>
          </p>
        </div>
        <ul class="list01">
          <li class="li03">
            <a href="#">aa</a>
          </li>
        </ul>

        <ul class="story-detail-menu">
          <li class="li02">
            <a
              href="#"
              class="button is-danger is-rounded btn-subscribe subscribeBook"
              data-page="index"
              ><span class="far fa-eye"></span>Thay đổi thông tin truyện</a
            >
          </li>
          <li class="li03">
            <a
              href="#"
              class="button is-danger is-rounded btn-like"
              ><span class="fas fa-plus"></span>Thêm chương</a
            >
          </li>
        </ul>
        <div class="txt txt01 story-detail-info">
          <p>
           aaaaaaaaaa
          </p>
        </div>
      </div>
    </div>
    <div class="block02">
      <div class="title">
        <h2 class="story-detail-title">Danh sách chương</h2>
        <a href="#"></a>
      </div>
      <div class="box">
        <div class="works-chapter-list">
          <div class="works-chapter-item row">
            <div class="col-md-10 col-sm-10 col-xs-8">
              <a
                target="_blank"
                href="#"
                >Chương 1
              </a>
              <a href="#" style="margin-left: 20px;"><i class="fas fa-edit"></i></a>
              <a href="# " style="margin-left: 10px;"><i class="fas fa-trash-alt"></i></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4 text-right">
             11/06/2020
              <!-- {{chapter.CreateDate|timesince}} -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
include_once("footer.php")
?>