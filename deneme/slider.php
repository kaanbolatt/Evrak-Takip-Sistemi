<div class="main-slide">
  <div id="sync1" class="owl-carousel">


    <?php 

    $slidersor=$db->prepare("SELECT * FROM slider where slider_durum='1' ");
    $slidersor->execute();

    while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {

     ?>


    <div class="item">
      <div class="slide-desc">
      </div>
      <div class="slide-type-1">
        <a href="<?php echo $slidercek['slider_link'] ?>"><img src="<?php echo $slidercek['slider_resimyol'] ?>" alt="" class="img-responsive"></a>
      </div>
    </div>

    <?php } ?>




  </div>
</div>

    <!-- Alt Bar 


    <div class="bar"></div>
    <div id="sync2" class="owl-carousel">
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Stylish Jacket</h3>
          <p>Description here here here</p>
        </div>
      </div>
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Stylish Jacket</h3>
          <p>Description here here here</p>
        </div>
      </div>
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Nike Airmax</h3>
          <p>Description here here here</p>
        </div>
      </div>
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Unique smaragd ring</h3>
          <p>Description here here here</p>
        </div>
      </div>
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Stylish Jacket</h3>
          <p>Description here here here</p>
        </div>
      </div>
      <div class="item">
        <div class="slide-type-1-sync">
          <h3>Nike Airmax</h3>
          <p>Description here here here</p>
        </div>
      </div>
    </div>

    -->