<?php 

include 'header.php'; 


$evraksor=$db->prepare("SELECT * FROM evraklar where evrak_id=:id");
$evraksor->execute(array(
  'id' => $_GET['evrak_id']
  ));
$evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC);



if ($say==0) {

  Header("Location:evrak-indir.php?durum=izinsiz");
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
            <h2>Mezuniyet Evrakları</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="nedmin/netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

             
              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Evrak Seç:<span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <select id="first-name" name="mezuniyetindirturu" required="required" placeholder="Evrak adını giriniz" class="form-control col-md-7 col-xs-12">
                        <option value="0">Proje Planlama Raporu</option>
                        <option value="1">Toplantı Tutanakları</option>

                        <option value="2">Final Raporu</option>

                        <option value="3">Grafiksel Çizimler</option>
                      </select> 
                </div>
              </div>
        


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="mezuniyetindir" class="btn btn-success">İndir</button>
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

 <div align="center">
            <h2>Evrak Ekleme</h2>
            <div class="clearfix"></div>
            <form action="nedmin/netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öğrenci No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="ogrenciNo" class="form-control" value="<?php echo $kullanicicek['ogrenciNo'] ?>" READONLY >
                </div>
              </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Evrak Dizini<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="mezuniyet_yolu" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

        
              
              
            

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Evrak Tür<span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                   <select id="first-name" name="mezuniyet_tur" required="required" placeholder="Evrak adını giriniz" class="form-control col-md-7 col-xs-12">
                        <option value="1">Proje Planlama Raporu</option>
                        <option value="2">Toplantı Tutanakları</option>

                        <option value="3">Final Raporu</option>

                        <option value="4">Grafiksel Çizimler</option>
                      </select> 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderilmek İstenen Hoca<span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-7 col-xs-12" name="type" id="hoca_id">
                             <option label=""></option>
                             <?
                             $hoca = $db->prepare('SELECT * FROM kullanici WHERE kullanici_yetki = 5 AND kullanici_unvan = 0');

                             foreach($hoca as $hocalar){
                                 
                                  echo $hocalar['kullanici_id']. ' - '.$hocalar['kullanici_adsoyad']
                                 }
                                 ?>
                             
                            </select>
                </div>
              </div>

              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="mezuniyetekle" class="btn btn-success">Evrak Ekle</button>
                </div>

              </div>

            </form>

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="mezuniyet_gonderilen.php"><button type="submit"  class="btn btn-info">Gönderdiğin Evraklar</button></a>
                </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->




<?php include 'footer.php'; ?>
