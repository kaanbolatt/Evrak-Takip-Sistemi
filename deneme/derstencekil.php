<?php 
include 'baglan.php';
include 'header.php';

$derstencekilme=$db->prepare("SELECT * FROM derstencekilme where id=:id");
$derstencekilme->execute(array(
  'id' => $_GET['id']
  ));
$derstencekilmecek=$derstencekilme->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM kullanici WHERE kullanici_yetki = ? AND kullanici_unvan = ?');
                              $query->execute(array(5,0));
                              $result = $query->fetchAll(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:derstencekil.php?durum=izinsiz");
  exit;

}
?>

<style>
 .kutu-ortala {
 width:90%;

}


</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
						</div>


	<div class="row">
    <div class="container mt-5">
    <form action="makepdf.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


    
    <center><h1>Dersten Çekilme Dilekçesi</h1></center>
    <p>Boş bırakılan yerleri doldurup aşağıdaki butona tıklarsanız, otomatik olarak PDF dosyası inecektir, daha sonrasında Dilekçe Ekle kısmından indirdiğiniz PDF dosyasını yükleyebilirsiniz.</p>

    <div class="row">

    <div class="col-md-6">	
    <input type="text" name="ad" placeholder="İsim" class="form-control" required></div>
    <div class="col-md-6" style="width:40.3%;" >
    <input type="text" name="soyad" placeholder="Soyisim" class="form-control" required>
</div>
</div>&nbsp;

    <div class="mb-2 kutu-ortala">
    <input type="text" name="email" placeholder="E-Mail" class="form-control" required>
    </div>&nbsp;
    <div class="mb-2 kutu-ortala">
    <input type="text" name="otel" placeholder="Telefon Numarası" class="form-control" required>
</div>&nbsp;
    <div class="mb-2 kutu-ortala">
    <input type="text" name="onum" placeholder="Öğrenci Numarası" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="oyil" placeholder="Öğrenim Yılı (örn. 2020-2021)" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="odonem" placeholder="Akademik Dönem (örn. Güz/Bahar)" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="derskod" placeholder="Ders Kodu" class="form-control" required>
</div>&nbsp;

<div class="mb-2 kutu-ortala">
                  <select class="form-control col-md-7 col-xs-12"  name="dcHoca" id="dcHoca">
                             <option label="Gönderilmesini İstediğiniz Öğretim Görevlisi Seçiniz"></option>
                             
                             <?php

                             foreach ($result as $key){
                            echo '<option value="'.$key["kullanici_id"].'">'.$key["kullanici_adsoyad"].'</option>';
                                 }
                                 ?>
                             
                            </select>
                </div>&nbsp;

&nbsp;&nbsp;<hr>
<div class="mb-2 kutu-ortala">
    <button type="submit" name="cekilmeekle" class="btn btn-success btn-lg btn-block">Dilekçeyi indir</button>
    </div>


</form>


</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>