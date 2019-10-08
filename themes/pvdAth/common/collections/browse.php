<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

    <h3><?php echo 'Browse collections'; ?></h3>        
            <?php foreach (loop('collections') as $collection): ?>
                <div class="browse-items cllec">
                            <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                            <?php endif; ?>
                            <h4 style="font-size: 1.5em;"><?php echo link_to_collection(); ?></h4>
                        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
                </div>
            <?php endforeach; ?>
      </div>
    <?php echo pagination_links(); ?>        

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
<?php echo foot(); ?>
