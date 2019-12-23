<?php echo head(array('bodyid'=>'home')); ?>

<?php echo get_theme_option('Homepage About'); ?>


<!-- BEGIN CAROUSEL -->
<div id="myCarousel" class="carousel slide" data-ride='carousel'>
  <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>



  <!-- Carousel for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <a href="http://digital.provath.org/collections/show/2"><img src="/uploads/carousel/cPaintings.jpg" alt="Paintings" class="iconx">
      <div class="carousel-caption" style="margin-bottom: 20px;">
        <h4>Paintings</h4>
      </div></a>
    </div>

    <div class="item">
      <a href="http://digital.provath.org/collections/show/1">  
      <img src="/uploads/carousel/cSculpture.jpg" alt="Sculpture" class="iconx">
      <div class="carousel-caption" style="margin-bottom: 20px;">
        <h4>Sculpture</h4>
      </div></a>
    </div>

    <div class="item">
      <a href="http://digital.provath.org/collections/show/5">
      <img src="/uploads/carousel/cPrints.jpg" alt="Prints" class="iconx">
      <div class="carousel-caption" style="margin-bottom: 20px;">
        <h4>Prints</h4>
      </div></a>
    </div>

    <div class="item">
        <a href="http://digital.provath.org/collections/show/3">
        <img src="/uploads/carousel/cDrawings.jpg" alt="Drawings" class="iconx">
        <div class="carousel-caption" style="margin-bottom: 20px;">
          <h4>Drawings</h4>
        </div></a>
      </div>
    
    <div class="item">
      <a href="http://digital.provath.org/collections/show/4">  
      <img src="/uploads/carousel/cDA.jpg" alt="Decorative Arts" class="iconx">
      <div class="carousel-caption" style="margin-bottom: 20px;">
        <h4>Decorative Arts</h4>
      </div></a>
    </div>

  <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role='button' data-slide="prev">
            <img src="uploads/carousel/arrow_left.png" style='margin-top:140px' alt="Left Arrow">
        </a>
        <a class="right carousel-control" href="#myCarousel" role='button' data-slide="next">
            <img src="uploads/carousel/arrow_right.png" style='margin-top:140px' alt="Right Arrow">
        </a>
</div>




<!-- END CAROUSEL -->
<!-- ABOUT -->
<div class="container">
<div class="col-sm-10">
  <div class="paragraph">
    <p>The Providence Athenæum possesses an eclectic art collection of nearly 150 art objects, which range from a delicate ivory miniature to a massive cabinet styled after an Egyptian temple. These artworks - either donated by Athenæum members or purchased by subscription - track developments in art and art collecting from the institution’s founding in 1836 to the present. Together they provide a narrative of the Athenæum’s cultural significance to Providence and the region.</p>


    <p>The art collection can be browsed by item, collection, or by keyword in the search box.  Each of the objects is accompanied by a downloadable image and a text box that includes the catalog information, a brief description, and a tab for additional resources.</p> 

    <p>The digital archive of the art collection has been made possible by a grant from the Herman H. Rose Civic, Cultural and Media Access Fund.</p>
    <div class="row text-center">
    <a href="http://provath.org" target="_blank"><img src="/uploads/athena.jpg" alt="The Providence Athenæum" style="width:150px;text-align: center;padding-top: 2em;"></a>   
    </div>
  </div>
</div>
</div>

<!--
<h4 class="text-center recent">Recent Addition</h4>
<div class="row">
    <div class="center-block">    
      <?php
      $recentItems = get_theme_option('Homepage Recent Items');
      if ($recentItems === null || $recentItems === ''):
          $recentItems = 2;
      else:
          $recentItems = (int) $recentItems;
      endif;
      ?>

    </div>
</div>
<!--end recent-items -->
<div class="row">
<a href="<?php echo html_escape(url('items')); ?>"  style="float:right;margin:20px 180px 20px 40px;"><?php echo __('View All Items'); ?></a></div>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>




<?php echo foot(); ?>