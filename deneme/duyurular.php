<?php include 'header.php'; 

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Duyurular</div>
							<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>

								<th><h1><b>Duyurular</b></h1></th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
							$duyuru_id=$duyurucek['duyuru_id'];
							$duyurusor=$db->prepare("SELECT * FROM duyurular order by duyuru_id desc");
							$duyurusor->execute();

							

								while($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

									<td><h5 align="left"><b>Duyuru Tarihi:</b> <?php echo $duyurucek['duyuru_date'] ?> 
<p>
									<p><?php echo $duyurucek['duyuru_icerik'] ?></h5></td>

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