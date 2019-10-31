<?php
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
    echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>
<div class="flex-container">
    
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
            <h3><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h3>
        </div>
    </div>
    <div class="flex-container">
        <div id="browse-items">
            <?php if (metadata('collection', 'total_items') > 0): ?>
            <?php foreach (loop('items') as $item): ?>
            <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        </div>
        <div class="browse-items">
            <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
            <?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?>
            <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
        </div>
            <?php endif; ?>
        </div>
            <?php endforeach; ?>
            <?php else: ?>
        </div>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
            <?php endif; ?>
        </div>
    </div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
<?php echo foot(); ?>
