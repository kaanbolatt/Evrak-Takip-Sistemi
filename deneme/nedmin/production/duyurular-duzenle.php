<?php 

include 'header.php'; 


$duyurusor=$db->prepare("SELECT * FROM duyurular where duyuru_id=:id");
$duyurusor->execute(array(
  'id' => $_GET['duyuru_id']
  ));
$duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Duyuru Düzenleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              
              <?php 
              $zaman=explode(" ",$duyurucek['duyuru_date']);
              ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Kayıt Tarihi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="first-name" name="duyuru_date" disabled="" value="<?php echo $zaman[0] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Kayıt Saat<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="time" id="first-name" name="duyuru_time" disabled="" value="<?php echo $zaman[1] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Sahibi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="duyuru_sahibi" disabled="" value="<?php echo $duyurucek['duyuru_sahibi'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="duyuru_icerik" value="<?php echo $duyurucek['duyuru_icerik'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="duyuru_durum" required>

                   <?php 

                   if ($duyurucek['duyuru_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> 


                 </select>
               </div>
             </div>

            <input type="hidden" name="duyuru_id" value="<?php echo $duyurucek['duyuru_id'] ?>">

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="duyurularduzenle" class="btn btn-success">Güncelle</button>
                </div>
              </div>

            </form>



          </div>
        </div>
      </div>
    </div>



    <hr>
    <hr>
    <hr>



  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
