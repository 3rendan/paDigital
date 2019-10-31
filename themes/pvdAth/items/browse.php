<?php
$pageTitle = __('Browse items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>
<div class="row col-sm-11 col-sm-offset-1">
    <h3><?php echo $pageTitle;?> <small><?php echo __('(%s items total)', $total_results); ?></small></h3>
</div>

<!-- NAVTABS FOR BROWSE, TAGS, and SEARCH -->
<div class="col-sm-12" style="padding-bottom:30px">
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#all">BROWSE ALL</a></li>
        <li><a data-toggle="tab" href="#browse-tags">BROWSE BY TAG</a></li>
        <li><a data-toggle="tab" href="#browse-search">SEARCH ITEMS</a></li>
    </ul>     
</div>
<div class="tab-content wrapper">
    <div class="tab-pane fade in active" id="all">   
        <div class="flex-container">
            <?php 
            foreach(loop('items') as $item) {
                echo "<div class=\"browse-items\">" . link_to_item(item_image('square_thumbnail'));
                echo "<h5>" . link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h5></div>";
                }
            ?>
        </div>
    </div>
    <div class="tab-pane fade" id="browse-tags">
            <?php echo tag_string(get_records('Tag', array(), 0)); ?>    
    </div>
    <div class="tab-pane fade" id="browse-search">
        <?php echo $this->partial('items/search-form.php',
        array(
            'formAttributes' => array('id'=>'advanced-search-form'),
            'useSidebar' => false)); 
            ?>
    </div>
</div>




<?php echo foot(); ?>