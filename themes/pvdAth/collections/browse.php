<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="container"> 
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
            <h3><?php echo 'Browse collections'; ?></h3> 
        </div>       
    </div>       
    <?php foreach (loop('collections') as $collection): ?>
        <div class="flex-container">
                    <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                        <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                    <?php endif; ?>
                    <h3><?php echo link_to_collection(); ?></h3>
                <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
        </div>
    <?php endforeach; ?>
      </div>
    <div class="row">
        <?php echo pagination_links(); ?>   
    </div>

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
