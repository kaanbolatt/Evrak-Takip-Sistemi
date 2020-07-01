<?php 


include 'header.php'; 

//Belirli veriyi seçme işlemi
$evraksor=$db->prepare("SELECT * FROM evraklar");
$evraksor->execute();


?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Evrak Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            
            <div class="clearfix"></div>
            <div align="right">
            
        </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Evrak Id</th>
                  <th>Evrak Tarihi</th>
                  <th>Evrak Türü</th>
                  <th>Öğrenci Numarası</th>
                  <th>Evrak Aşaması</th>
                  <th>Dosya Yolu</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $i = 1;
                
                while($evrakcek=$evraksor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $evrakcek['evrak_id'] ?></td>
                  <td><?php echo $evrakcek['evrak_tarihi'] ?></td>
                  <td><?php echo $evrakcek['evrak_turu'] ?></td>
                  <td><?php echo $evrakcek['ogrenciNo'] ?></td>
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
         <!-- burası kaldırılacak -->
         	<?php $test = $evrakcek['evrak_yolu']; ?>
				<?php echo '<td> <input name="veriid" type=\'text\' value=',$test,'> </input> </td> '; ?>
				<!-- burası kaldırılacak -->
				


                  <td><center><a href="/deneme/<?php echo $evrakcek['evrak_yolu']; ?>" data-toggle="modal" data-target="#myModal<?php echo $i ?>" name="update"><button class="btn btn-danger btn-xs">Göster</button></a></center></td>
					
			
				 
			  </div> 
			 	
				
                <td><center><a href="../netting/islem.php?evrak_id=<?php echo $evrakcek['evrak_id']; ?> &evraksil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                
                </tr>

				
			<div class="modal fade" id="myModal<?php echo $i ?>">
				<div class="modal-dialog modal-lg">
				<div class="modal-content">

				<div style="height:100% important;" class="modal-body">  
					<?php echo '<iframe style="width:100%; height:700px;" src="/deneme/',$evrakcek['evrak_yolu'],'"> </iframe>'; ?>
							</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
          <form action="../netting/islem.php" method="POST">
					  <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
            <a class="btn btn-warning" href="../netting/islem.php?evrak_id=<?php echo $evrakcek['evrak_id'];?>&islemalindi=ok">Beklemede</a>
            <a class="btn btn-success" href="../netting/islem.php?evrak_id=<?php echo $evrakcek['evrak_id'];?>&onaylandi=ok">Onayla</a>
            <a class="btn btn-danger" href="../netting/islem.php?evrak_id=<?php echo $evrakcek['evrak_id'];?>&reddedildi=ok">Reddet</a>

            </form>
					  <!-- butonlar buraya gelıyor  -->
          
					</div>
					
				  </div>
				</div>
		
                
                <?php $i++; }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
