<?php include 'header.php'; 
if ($say==0) {

  Header("Location:gonderilen_evraklar.php?durum=izinsiz");
  exit;

}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>

								<th><h1><b>Gönderilen Evraklar</b></h1></th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
							$evrak_id=$evrakcek['evrak_id'];
							$ogrenciNo=$evrakcek['ogrenciNo'];
							$evraksor=$db->prepare("SELECT * FROM evraklar order by evrak_id desc");
							$evraksor->execute();

							

								while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

									<td><h5 align="left"><b>Evrak ID:</b> <?php echo $evrakcek['evrak_id'] ?> - <b>Evrak Tarihi:</b> <?php echo $evrakcek['evrak_tarihi'] ?> - <b>Evrak Sahibi:</b> <?php echo $evrakcek['ogrenciNo'] ?> 
<p>
									<p>Evrak Adı: <?php echo $evrakcek['evrak_ad'] ?></h5></td>

								</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>

				</div>

			</div>
		</div>
	</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>