<?php 
include 'baglan.php';
include 'header.php';

$dilekceornegi=$db->prepare("SELECT * FROM dilekceornegi where id=:id");
$dilekceornegi->execute(array(
  'id' => $_GET['id']
  ));
$dilekceornegicek=$dilekceornegi->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM kullanici WHERE kullanici_yetki = ? AND kullanici_unvan = ?');
                              $query->execute(array(5,0));
                              $result = $query->fetchAll(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:dilekceornegi.php?durum=izinsiz");
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
    <form action="makepdf2.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


    
    <center><h1>Dilekçe Örneği</h1></center>
    <p>Boş bırakılan yerleri doldurup aşağıdaki butona tıklarsanız, otomatik olarak PDF dosyası inecektir, daha sonrasında Dilekçe Ekle kısmından indirdiğiniz PDF dosyasını yükleyebilirsiniz.</p>

    <div class="row">

    <div class="col-md-6">	
    <input type="text" name="dad" placeholder="Name/Ad" class="form-control" required></div>
    <div class="col-md-6" style="width:40.3%;" >
    <input type="text" name="dsoyad" placeholder="Surname/Soyad" class="form-control" required>
</div>
</div>&nbsp;
    <div class="mb-2 kutu-ortala">
    <input type="text" name="dnum" placeholder="Student No/Öğrenci Numarası" pattern="[0-9\/]*" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="dfak" placeholder="Faculty/Fakülte" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="dbolum" placeholder="Department/Bölüm"  class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="dtel" placeholder="Mobile Phone/Cep Telefonu" pattern="[0-9\/]*" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <input type="text" name="dkonu" placeholder="Subject/Konu" class="form-control" required>
</div>&nbsp;
<div class="mb-2 kutu-ortala">
    <textarea name="dmesaj" placeholder="Message/Mesaj" class="form-control" required></textarea>
</div>&nbsp;



&nbsp;&nbsp;
<div class="mb-2 kutu-ortala">
    <button type="submit" name="dilekceekle" class="btn btn-success btn-lg btn-block">Dilekçeyi indir</button>
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