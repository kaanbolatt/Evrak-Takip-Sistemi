<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$kullanicisor=$db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
            <a href="kullanici-ekle.php"><button class="btn btn-success btn-xs ">Yeni Ekle</button></a>
        </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kullanıcı ID</th>
                  <th>Kayıt Tarih</th>
                  <th>Ad Soyad</th>
                  <th>Öğrenci No</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th>Kullanıcı Yetki</th>
                  <th>Kullanıcı Ünvan</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $kullanicicek['kullanici_id'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_zaman'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_adsoyad'] ?></td>
                  <td><?php echo $kullanicicek['ogrenciNo'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_gsm'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_yetki'] ?></td>

                  <td><?php echo $kullanicicek['kullanici_unvan'] ?></td>
                  <td><center><?php

          if($kullanicicek['kullanici_durum']==1){?>

          <button class="btn btn-success btn-xs">Aktif</button>

          <?php } else {?>

          <button class="btn btn-danger btn-xs">Pasif</button>

          <?php }?>
          </center></td>
                  
                  
                  <td><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?> &kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
