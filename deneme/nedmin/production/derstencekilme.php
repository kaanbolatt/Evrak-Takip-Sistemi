<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$evraksor=$db->prepare("SELECT * FROM derstencekilme");
$evraksor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Desten Çekilme Listeleme <small>

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
            
        </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>

                  <th>Gönderen Ad</th>
                  <th>Gönderen Soyad</th>
                  <th>Gönderen Mail</th>
                  <th>Öğrenci Numarası</th>
                  <th>Akademik Yıl</th>
                  <th>Ders Kodu</th>
                  <th>Akademik Dönem</th>
                  <th>Gönderilme Tarihi</th>

                  <th></th>

                </tr>
              </thead>

              <tbody>

                <?php 

                while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>

                  <td><?php echo $evrakcek['ad'] ?></td>
                  <td><?php echo $evrakcek['soyad'] ?></td>
                  <td><?php echo $evrakcek['email'] ?></td>
                  <td><?php echo $evrakcek['onum'] ?></td>
                  <td><?php echo $evrakcek['oyil'] ?></td>
                  <td><?php echo $evrakcek['derskod'] ?></td>
                  <td><?php echo $evrakcek['odonem'] ?></td>
                  <td><?php echo $evrakcek['dctarih'] ?></td>
                 

                  <td><center><a href="../netting/islem.php?id=<?php echo $evrakcek['id']; ?> &derstencekilmesil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
