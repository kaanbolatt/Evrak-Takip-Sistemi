<?php 

include 'header.php'; 


$duyurusor=$db->prepare("SELECT * FROM duyuru where duyuru_id=:id");
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
            <h2>Duyuru Ekleme<small>

            </small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Id<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="duyuru_id"  required="required" placeholder="Duyuru İd giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Sahibi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="duyuru_sahibi"  required="required" placeholder="Duyuru Sahibi giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="duyuru_icerik" value="<?php echo $duyurucek['duyuru_icerik'] ?>" required="required" placeholder="Duyuru İçerik giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duyuru Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="duyuru_durum" required>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>
                   



                 </select>
               </div>
             </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="duyuruekle" class="btn btn-success">Kaydet</button>
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
