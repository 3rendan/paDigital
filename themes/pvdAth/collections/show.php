<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<div class="container">
    <div class="row">
        <h3><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h3>
    </div>
</div>
    <div class="container">
        <?php 
        foreach(loop('items') as $item) {
            echo "<div class=\"browse-items\">" . link_to_item(item_image('square_thumbnail'));
            echo "<h5>" . link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h5></div>";
            }
            ?>
    </div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
