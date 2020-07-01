<?php 

include 'header.php'; 


$evraksor=$db->prepare("SELECT * FROM evraklar where evrak_id=:id");
$evraksor->execute(array(
  'id' => $_GET['evrak_id']
  ));
$evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC);

$kullanicicek=$db->prepare("SELECT ogrenciNo FROM kullanici where kullanici_mail=:mail");
$kullanicicek->execute(array(
  'mail' => $_SESSION['userkullanici_mail']
  ));

if ($say==0) {

  Header("Location:evrak-indir.php?durum=izinsiz");
  exit;

}
?>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>
</head>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div align="center">
            <h2>Evrak İndirme</h2>
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
                   <select id="first-name" name="evrak_indir_turu" required="required" placeholder="Evrak adını giriniz" class="form-control col-md-7 col-xs-12">
                        <option value="0">Staj Evrak</option>
                        <option value="1">Kayıt Dondurma</option>
                        <option value="2">Asistan Başvuru</option>
                        <option value="3">Çift Anadal</option>
                        <option value="4">Staj Değerlendirme Anketi</option>
                        <option value="5">Yaz Okulu Formu</option>
                        <option value="6">Not Değiştirme Talebi</option>
                        <option value="7">Üniversiteden Ayrılma Talebi</option>
                      </select> 
                </div>
              </div>
        


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="evrakindir" class="btn btn-success">Kaydet</button>
                </div>
              </div>

            </form>

              </div>
     

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
