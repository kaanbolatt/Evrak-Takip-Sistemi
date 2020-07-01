<?php include 'header.php';
if ($say==0) {

  Header("Location:mezuniyet_gonderilen.php?durum=izinsiz");
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
							<div class="bigtitle">Mezuniyet Evrak Bilgilerim</div>
							<p>Göndermiş olduğunuz Mezuniyet Evraklarınızı listeliyorsunuz</p>
						</div>
						
					

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="title-bg">
					<div class="title">Mezuniyet Evrak Bilgilerim</div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>
								
								<th>Evrak Id</th>
                  			    <th>Öğrenci No</th>
                 				<th>Mezuniyet Evrak Gönderim Tarihi</th>
                 			    <th>Evrak Türü</th>
                  				<th>Evrak Aşaması</th>

								
							</tr>
						</thead>
						<tbody>

							<?php 
							 $ogrenciNo=$kullanicicek['ogrenciNo'];
							$evraksor=$db->prepare("SELECT * FROM mezuniyet where ogrenciNo=:id");
							$evraksor->execute(array(
								'id' => $ogrenciNo
								));

								while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

								  <td><?php echo $evrakcek['mezuniyet_id'] ?></td>
				                  <td><?php echo $evrakcek['ogrenciNo'] ?></td>
				                  <td><?php echo $evrakcek['mezuniyet_tarih'] ?></td>
				                  <td><?php echo $evrakcek['mezuniyet_tur'] ?></td>
				                  <td><?php

                                        

                                         if($evrakcek['mezuniyet_asama'] == 0)
            {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 0%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Beklemede"></div>
                      <span class="progress-type"></span>
                    </div>' ;

        }
                    else if($evrakcek['mezuniyet_asama'] == 1)
        {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 25%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Alıcıya Ulaştı"></div>

                    </div>';
            }
             else if($evrakcek['mezuniyet_asama'] == 2)
        {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 50%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="Alıcı İşlem Yaptı"></div>
                    </div>';
            }
             else if($evrakcek['mezuniyet_asama'] == 3)
        {
                echo '<div class="progress">
                      <div data-percentage="0%" style="width: 100%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" title="İşlem Tamamlandı"></div>
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