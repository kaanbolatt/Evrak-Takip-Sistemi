<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$evraksor=$db->prepare("SELECT * FROM evraklar");
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
            <h2>evrak Listeleme <small>

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
            <a href="evrak-ekle.php"><button class="btn btn-success btn-xs ">Yeni Ekle</button></a>
     		</div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Dosya</th>
                  <th>Ad</th>
                  <th>Turu</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {$say++?>


                <tr>
                  <td width="20"><?php echo $say ?></td> 
                  <td><?php echo $evrakcek['evrak_yolu'] ?></td>
                  <td><?php echo $evrakcek['evrak_ad'] ?></td>
                  <td><?php echo $evrakcek['evrak_turu'] ?></td>
				          <td> </td>

				

                  <td><center><a href="evrak-duzenle.php?evrak_id=<?php echo $evrakcek['evrak_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?evrak_id=<?php echo $evrakcek['evrak_id']; ?> &evraksil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
