<?php include 'header.php';
if ($say==0) {

  Header("Location:hesabim.php?durum=izinsiz");
  exit;

} ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
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
					<div class="col-sm-12">
						<input type="text" class="form-control" name="ogrenciNo"    value="<?php echo $kullanicicek['ogrenciNo'] ?>" READONLY>
					</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control" required="" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>"READONLY>
					</div>
					
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
							<input type="text" class="form-control" name="kullanici_mail"   value="<?php echo $kullanicicek['kullanici_mail'] ?>"READONLY>
						</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" name="kullanici_gsm"   pattern="[0-9\/]*" value="<?php echo $kullanicicek['kullanici_gsm'] ?>">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" name="kullanici_adres"    value="<?php echo $kullanicicek['kullanici_adres'] ?>">
					</div>
				</div>


				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" name="kullanici_il"    value="<?php echo $kullanicicek['kullanici_il'] ?>">
					</div>
				</div>
				
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="text" class="form-control" name="kullanici_ilce"    value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
					</div>
				</div>

<div class="form-group dob">
				  <div class="col-sm-12"><?php

		          if($kullanicicek['kullanici_staj']==1){?>

		          <input type="text" class="form-control" name="kullanici_staj"  value="Staj Aktif" readonly>

		          <?php } else {?>

		          <input type="text" class="form-control" name="kullanici_staj"  value="Staj Pasif" readonly>

		          <?php }?>
		          </div>
	</div>


<div class="form-group dob">
				  <div class="col-sm-12"><?php

		          if($kullanicicek['kullanici_durum']==1){?>

		          <input type="text" class="form-control" name="kullanici_durum"  value="Kullanıcı Durum Aktif" readonly>

		          <?php } else {?>

		          <input type="text" class="form-control" name="kullanici_durum"  value="Kullanıcı Durum Pasif" readonly>

		          <?php }?>
		          </div>
	</div>

<div class="form-group dob">
				  <div class="col-sm-12"><?php

		          if($kullanicicek['kullanici_mezuniyet']==1){?>

		          <input type="text" class="form-control" name="kullanici_mezuniyet"  value="Kullanıcı Mezuniyet Aktif" readonly>

		          <?php } else {?>

		          <input type="text" class="form-control" name="kullanici_mezuniyet"  value="Kullanıcı Mezuniyet Pasif" readonly>

		          <?php }?>
		          </div>
	</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<button type="submit" name="kullanicibilgiguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre değiştirmek için resime tıklayın!</div>
				</div>


				<center><a href="sifre-guncelle.php"><img width="400" src="images\sifre.png"></a></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>