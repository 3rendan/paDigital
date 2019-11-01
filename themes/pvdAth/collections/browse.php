<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="container"> 
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
            <h3><?php echo 'Browse all collections'; ?></h3> 
        </div>       
    </div>       
    <div class="flex-container">
        <?php 
        foreach (loop('collections') as $collection) {
            echo "<div class=\"browse-items\">" . link_to_collection($collectionImage, 'square_thumbnail'); 
            echo "<h5>" . link_to_collection(metadata('collection', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h5></div>"; 
        }
        ?>
            
        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
    </div>
      </div>
    <div class="row">
        <?php echo pagination_links(); ?>   
    </div>

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
