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

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #ff0000;
}

.button3:hover {
  background-color: #ff0000;
  color: white;
}

.button4 {
  background-color: white; 
  color: black; 
  border: 2px solid #ffff00;
}

.button4:hover {
  background-color: #ffff00;
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
            <br/></div>

<div align="center">              
<button class="button button1" onclick="window.location.href = '../deneme/evrak_indir.php';">DİLEKÇELER</button>
<button class="button button3" onclick="window.location.href = '../deneme/derstencekil.php';">DERSTEN ÇEKİLME (OTODOLDUR)</button> 
<button class="button button4" onclick="window.location.href = '../deneme/dilekceornegi.php';">DİLEKÇE ÖRNEĞİ (OTODOLDUR)</button> 



</div>      

          </div>
        </div>
      </div>
    </div>
<br><br><br><br><br><br><br><br><br><br>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
