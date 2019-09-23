foreach(loop('items') as $item) {    
    echo "<div class='col-md-4'>"; 
    echo "<div class='thumbnail'>";
    echo link_to_item(item_image('thumbnail'));
    echo "</div>";
    echo "<div class='item-title'><h3>";
    echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>";
    echo "</div>"
    echo endif;
    echo "</div>";
}

ORIGINAL

foreach(loop('items') as $item): ?>
    <div class="row">
        <div class="col-md-4">
            <?php if (metadata($item, 'has thumbnail')): ?> 
                <div class="thumbnail">
                <?php echo link_to_item(item_image('thumbnail')); ?>
                </div>
                <div class="item-title">
                    <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if (metadata($item, 'has thumbnail')): ?> 
                <div class="thumbnail">
                <?php echo link_to_item(item_image('thumbnail')); ?>
                </div>
                <div class="item-title">
                    <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php if (metadata($item, 'has thumbnail')): ?> 
                <div class="thumbnail">
                <?php echo link_to_item(item_image('thumbnail')); ?>
                </div>
                <div class="item-title">
                    <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                </div>
            <?php endif; ?>
        </div></div>
        <div class="col-md-4">
            <div class="thumbnail">
            <?php echo link_to_next_item(item_image('thumbnail')); ?>
            </div>
            <div class="item-title">
                <h3><?php echo link_to_next_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
            <?php echo link_to_next_item_show(item('thumbnail')); ?>
            </div>
            <div class="item-title">
                <h3><?php echo link_to_next_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
            </div>
        