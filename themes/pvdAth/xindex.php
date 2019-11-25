<?php echo head(array('bodyid'=>'home')); ?>

<?php echo get_theme_option('Homepage About'); ?>
 
<div class="row">
        <h4 class="text-center">Collections</h4>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Carousel for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <a href="http://digital.provath.org/collections/show/1"><img src="/themes/pvdAth/images/carouselIndex/sculptures.jpg" alt="Sculptures" class="iconx">
      <div class="carousel-caption">
        <h4>Sculptures</h4>
        <p>A collection of the unique sculptures at the Providence Athenæum</p>
      </div></a>
    </div>

    <div class="item">
      <a href="http://digital.provath.org/collections/show/2">  
      <img src="/themes/pvdAth/images/carouselIndex/paintings.jpg" alt="Paintings" class="iconx">
      <div class="carousel-caption">
        <h4>Paintings</h4>
      </div></a>
    </div>

    <div class="item">
      <a href="http://digital.provath.org/collections/show/3">
      <img src="/themes/pvdAth/images/carouselIndex/drawings.jpg" alt="Photographs" class="iconx">
      <div class="carousel-caption">
        <h4>Drawings</h4>
        <p>Drawings in the collection.</p>
      </div></a>
    </div>
    <div class="item">
      <a href="http://digital.provath.org/collections/show/4">
      <img src="/themes/pvdAth/images/carouselIndex/photos.jpg" alt="Drawings" class="iconx">
      <div class="carousel-caption">
        <h4>Photographs</h4>
        <p>Digital reproductions of photographs in the collection.</p>
      </div></a>
    </div>  
  <div class="item">
      <a href="http://digital.provath.org/collections/show/5">
      <img src="/themes/pvdAth/images/carouselIndex/decArts.jpg" alt="Decorative Arts" class="iconx">
      <div class="carousel-caption">
        <h4>Decorative Arts</h4>
        <p>Beautiful objects from the collection of the Providence Athenæum.</p>
      </div></a>
    </div>
  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="row" style="border-bottom: .25em solid #C4D425;">
        <div class="span12">
            <div class="page-header">
                <h1><?php echo $pageTitle;?> <small><?php echo __('(%s items total)', $total_results); ?></small></h1>
            </div>

        </div>
    </div>
    <div class="nav nav-tabs" id="secondary-nav">
        <?php echo public_nav_items()->setUlClass('nav nav-pills'); ?>
    
        <div class="r-page">
            <?php echo pagination_links(); ?>
        </div>
    </div>
<?php foreach(loop('items') as $item): ?>   
        <div class="col-sm-4 col-md-4 br-tombstone">
            <?php 
                $n = 0;
                if ($n == 3) {
                   echo "'</div><div class='row'";
                }
            ?>
            <?php if (metadata($item, 'has thumbnail')): ?> 
            <div class="thumbnail">
            <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
            <div class="item-title">
                <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
            </div>
            <?php endif; ?>
        </div>
<?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
<?php endforeach; ?>

<div class="row">
    <div class="col-sm-12">
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
</div>    
</div>
<?php echo foot(); ?>
