<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$duyurusor=$db->prepare("SELECT * FROM duyurular");
$duyurusor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Duyuru Listeleme <small>

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
            <a href="duyurular-ekle.php"><button class="btn btn-success btn-xs ">Yeni Ekle</button></a>
        </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Duyuru Id</th>
                  <th>Duyuru Sahibi</th>
                  <th>Duyuru İçerik</th>
                  <th>Duyuru Tarih</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $duyurucek['duyuru_id'] ?></td>
                  <td><?php echo $duyurucek['duyuru_sahibi'] ?></td>
                  <td><?php echo $duyurucek['duyuru_icerik'] ?></td>

                  <td><?php echo $duyurucek['duyuru_date'] ?></td>
                  <td><center><a href="duyurular-duzenle.php?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?> &duyurusil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
