<?php 
//include başka php dosyalarını projemize çalıştığımız sayfaya dahil eder.
include 'header.php';
include 'baglan.php';



?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bildirim Paneli <small> Panele Hoşgeldiniz.</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="genel-ayar.php">Genel Ayarlar</a>
                          </li>
                        </ul>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!-- BURADA SORGU OLMALI -->
<?php
$hocaid = $kullanicicek["kullanici_id"];
$sorgu = $db->prepare("SELECT * FROM evraklar where easama = 0 AND hoca_ad = $hocaid"); //burada bir şeyler yapılacak hoca_ad = 155 olursa sadece o hocayı çeker; yoksa çekmez. Bunu admin paneline giren kullanıcının IDsini çekmemiz lazım 155 olarak değil yoksa bir ton hata verir.
$sorgu->execute();
$sorgu->rowCount();


 ?>


                    

                    <p>
                    	Bakmanız gereken <?php echo $sorgu->rowCount(); ?> adet evrak bulunmaktadır..</p>

                  </div>

                </div>

              </div>

              <!-- Bitiyor -->




            </div>
          </div>
        </div>
        <!-- /page content -->



      <?php include 'footer.php'; ?>