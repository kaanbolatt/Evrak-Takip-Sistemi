<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$evraksor=$db->prepare("SELECT * FROM dilekceornegi");
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
            <h2>Dilekçe Örneği Listeleme <small>

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

                  <th>Ad</th>
                  <th>Soyad</th>
                  <th>Öğrenci Numarası</th>
                  <th>Bölüm</th>
                  <th>Konu</th>
                  <th>Tarih</th>
                  <th>Mesaj</th>
                  <th></th>

                </tr>
              </thead>

              <tbody>

                <?php 

                while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>

                  <td><?php echo $evrakcek['dad'] ?></td>
                  <td><?php echo $evrakcek['dsoyad'] ?></td>
                  <td><?php echo $evrakcek['dnum'] ?></td>
                  <td><?php echo $evrakcek['dbolum'] ?></td>
                  <td><?php echo $evrakcek['dkonu'] ?></td>
                  <td><?php echo $evrakcek['dtarih'] ?></td>
                  <td><?php echo $evrakcek['dmesaj'] ?></td>
                  

                  <td><center><a href="../netting/islem.php?id=<?php echo $evrakcek['id']; ?> &dilekceornegisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
