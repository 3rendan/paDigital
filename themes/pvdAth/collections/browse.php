<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="container">
    <div class="row col-sm-12">
        <h3><?php echo 'Browse all collections'; ?></h3>
    </div>  
</div>      
    <div class="container">
        <?php 
        foreach (loop('collections') as $collection) {
            if ($collectionImage = record_image('collection', 'square_thumbnail')){ 
                echo "<div class=\"browse-items\">" . link_to_collection($collectionImage, array('class' => 'image'));
            }
            echo "<h5>" . link_to_collection(metadata('collection', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h5></div>"; 

        }
        ?>            
        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
    </div>
      </div>
    <<div class="container"  style="padding-bottom:20px">
        <?php echo pagination_links(); ?>      
        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
    </div>

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
