<?php include 'header.php';
if ($say==0) {

  Header("Location:gönderilenler.php?durum=izinsiz");
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
							<div class="bigtitle">Evrak Bilgilerim</div>
							<p>Göndermiş olduğunuz Evraklarınızı listeliyorsunuz</p>
						</div>
						
					

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="title-bg">
					<div class="title">Evrak Bilgileri</div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>
								
								<th>Evrak Id</th>
                 				<th>Evrak Tarihi</th>
                 			    <th>Evrak Türü</th>
                  				<th>Evrak Aşaması</th>

								
							</tr>
						</thead>
						<tbody>

							<?php 
							 $ogrenciNo=$kullanicicek['ogrenciNo'];
							$evraksor=$db->prepare("SELECT * FROM evraklar where ogrenciNo=:id");
							$evraksor->execute(array(
								'id' => $ogrenciNo
								));

								while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

								  <td><?php echo $evrakcek['evrak_id'] ?></td>
				                  <td><?php echo $evrakcek['evrak_tarihi'] ?></td>
				                  <td><?php echo $evrakcek['evrak_turu'] ?></td>
				                  <td><?php

                                        

                                          if($evrakcek['easama'] == 0)
            {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 0%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Beklemede"></div>
                      <span class="progress-type"></span>
                    </div>' ;

            }
                    else if($evrakcek['easama'] == 1)
            {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 25%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Alıcı Beklemeye Aldı"></div>

                    </div>';
            }
             else if($evrakcek['easama'] == 2)
            {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 100%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Onaylandı"></div>
                    </div>';
            }
             else if($evrakcek['easama'] == 3)
           {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 100%;" class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Reddedildi"></div>
                    </div>';
            }
         ?></td>
								


								</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</form>
	<div class="spacer"></div>
</div>
</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>