<?php 

include 'header.php'; 


$evraksor=$db->prepare("SELECT * FROM evraklar where evrak_id=:id");
$evraksor->execute(array(
  'id' => $_GET['evrak_id']
  ));
$evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC);


$query = $db->prepare('SELECT * FROM kullanici WHERE kullanici_yetki = ? AND kullanici_unvan = ?');
                              $query->execute(array(5,0));
                              $result = $query->fetchAll(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:deneme-ekle.php?durum=izinsiz");
  exit;

}
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div align="center">
            <h2>Evrak Gönder</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="nedmin/netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öğrenci No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="ogrenciNo" class="form-control" value="<?php echo $kullanicicek['ogrenciNo'] ?>" READONLY >
                </div>
              </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Evrak Dizini (PDF Sürümü 1.4 Olmalıdır!)<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input accept="application/pdf" type="file" id="first-name"  name="evrak_yolu" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Evrak Tür<span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <select id="first-name" name="evrak_turu" required="required" placeholder="Evrak türünü giriniz" class="form-control col-md-7 col-xs-12">
                        <option value="0">Evrak Tür Giriniz</option>                    
                        <option value="1">Staj Evrak</option>
                        <option value="2">Kayıt Dondurma</option>
                        <option value="3">Asistan Başvuru</option>
                        <option value="4">Çift Anadal</option>
                        <option value="5">Staj Değerlendirme Anketi</option>
                        <option value="6">Yaz Okulu Formu</option>
                        <option value="7">Not Değiştirme Talebi</option>
                        <option value="8">Üniversiteden Ayrılma Talebi</option>
                        <option value="9">Dersten Çekilme</option>
                        <option value="10">Dilekçe</option>

                      </select> 
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderilmek İstenen Eğitmen<span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12" name="hoca_ad" id="hocacek">
                             <option label="">Göndermek İstediğiniz Eğitmeni Seçiniz</option>
                             <?php

                             foreach ($result as $key){
                            echo '<option value="'.$key["kullanici_id"].'">'.$key["kullanici_adsoyad"].'</option>';
                                 }
                                 ?>
                             
                            </select>
                </div>
              </div>

              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="evrakekle" class="btn btn-success">Evrak Gönder</button>
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
