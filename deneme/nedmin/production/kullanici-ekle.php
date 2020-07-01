<?php 

include 'header.php'; 


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' => $_GET['kullanici_id']
  ));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanici Ekleme<small>

            </small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Id<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_id"  required="required" placeholder="Kullanici Id giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Ad Soyad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_adsoyad"  required="required" placeholder="Kullanici Ad Soyad giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Mail<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_mail"  required="required" placeholder="Kullanici Mail giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cep Telefon No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_gsm"  required="required" placeholder="kullanici Cep Telefon No giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              

              <?php 

        if ($_GET['durum']=="farklisifre") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
        </div>
          
        <?php } elseif ($_GET['durum']=="eksiksifre") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
        </div>
          
        <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
        </div>
          
        <?php } elseif ($_GET['durum']=="basarisiz") {?>

        <div class="alert alert-danger">
          <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
        </div>
          
        <?php }
         ?>


              <div class="form-group dob">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre Girin<span class="required">*</span>
                </label>
                <div class="col-sm-3">
                  <input type="password" class="form-control" name="kullanici_passwordone"    placeholder="Şifrenizi Giriniz...">
                </div>
                <div class="col-sm-3">
                  <input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Şifrenizi Tekrar Giriniz...">
                </div>
              </div>

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanici Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="kullanici_durum" required>

                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>



                 </select>
               </div>
             </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="kullanicikaydet" class="btn btn-success">Kaydet</button>
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
