<?php
ob_start();
session_start();
include '../netting/baglan.php';

//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);



$duyurusor=$db->prepare("SELECT * FROM duyurular where duyuru_id=:id");
$duyurusor->execute(array(
  'id' => $_SESSION['duyuru_id']
  ));
$say=$duyurusor->rowCount();
$duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:login.php?durum=izinsiz");
  exit;

}



//1.Yöntem
/*
if (!isset($_SESSION['kullanici_mail'])) {


}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DAÜ Evrak Takip Sistemi</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Ck Editör -->
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><span>DAÜ BLGM ETS</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../../<?php echo $kullanicicek['kullanici_resim']; ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Hoşgeldin</span>
              <h2><?php echo $kullanicicek['kullanici_adsoyad'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

           
<?php 


$hocaid = $kullanicicek["kullanici_id"];
$sorgu = $db->prepare("SELECT * FROM evraklar where easama = 0 AND hoca_ad = $hocaid"); //burada bir şeyler yapılacak hoca_ad = 155 olursa sadece o hocayı çeker; yoksa çekmez. Bunu admin paneline giren kullanıcının IDsini çekmemiz lazım 155 olarak değil yoksa bir ton hata verir.
$sorgu->execute();
$sorgu->rowCount();
?>



  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
   

    <li><a href="bildirimler.php"><i class="fa fa-info"></i> Bildirimler (<?php echo $sorgu->rowCount(); ?>) </a></li>
    <li><a href="evrak.php"><i class="fa fa-file"></i> Evraklar </a></li>
    <li><a href="derstencekilme.php"><i class="fa fa-file"></i> Dersten Çekilme </a></li>
    <li><a href="dilekceornegi.php"><i class="fa fa-file"></i> Dilekçe Örneği </a></li>

<!-- öğretmenler için hakkındayı gizledim kullanıcı unvan admin için 1 öğretmen için 5 -->
<?php 


$hocaid = $kullanicicek["kullanici_id"];
$sorgu = $db->prepare("SELECT * FROM evraklar where easama = 0 AND hoca_ad = $hocaid"); //burada bir şeyler yapılacak hoca_ad = 155 olursa sadece o hocayı çeker; yoksa çekmez. Bunu admin paneline giren kullanıcının IDsini çekmemiz lazım 155 olarak değil yoksa bir ton hata verir.
$sorgu->execute();
$sorgu->rowCount();

if($kullanicicek['kullanici_unvan']==1){?>

<ul class="nav side-menu">
                  <li><a href="hakkimizda.php"><i class="fa fa-info"></i> Hakkımızda </a></li>

  <li><a href="kullanici.php"><i class="fa fa-user"></i> Kullanıcılar </a></li>


  <li><a href="duyurular.php"><i class="fa fa-bullhorn"></i> Duyurular </a></li>

 
  <li><a href="menu.php"><i class="fa fa-list"></i> Menüler </a></li>
               

  <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>


      <li><a><i class="fa fa-cogs"></i> Site Ayarları <span></span></a>
           <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="iletisim-ayarlar.php">İletişim Ayarlar</a></li>
                    <li><a href="sosyal-ayar.php">Sosyal Ayarlar</a></li>
           </ul>
      </li>     
</ul>

<?php }

?>
        
                

                




             	 
           </ul>
         </div>



       </div>
       <!-- /sidebar menu -->
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="../../<?php echo $kullanicicek['kullanici_resim']; ?>" alt=""><?php echo $kullanicicek['kullanici_adsoyad'] ?>
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
            	 <li><a href="kullanici-profil.php"> Kullanıcı Profili</a></li>   
              <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
        <!-- /top navigation -->