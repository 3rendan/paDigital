<?php
$pageTitle = __('Browse items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<!-- <div id="primary"> -->
    <div class="row">
        <div class="page-header">
            <h3><?php echo $pageTitle;?> <small><?php echo __('(%s items total)', $total_results); ?></small></h3>
    </div>
    <!-- NAV IS THE SAME STRUCTURE AS THAT OF ITEMS/SHOW.PHP -->
        <ul class="nav nav-tabs nav-justified proper">
            <li class="active"><a data-toggle="pill" href="#All">BROWSE ALL</a></li>
            <li><a data-toggle="pill" href="#browse-tags">BROWSE BY TAG</a></li>
            <li><a data-toggle="pill" href="#browse-search">SEARCH ITEMS</a></li>
        </ul>     
    </div>
<div class="tab-content wrapper">
    <div class="tab-pane fade in active" id="All">   
        <?php 
        foreach(loop('items') as $item) {
            echo "<div class=\"browse-items search\">" . link_to_item(item_image('square_thumbnail'));
            echo "<h3 style=\"font-style:italic;\">" . link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h3></div>";
            }
        ?>
    </div>
    <div class="tab-pane fade" id="browse-tags">
        <div class="tags">
            <h3>TAGS</h3>
            <?php echo tag_string(get_records('Tag', array(), 0)); ?>
        </div>
        
    </div>
    
    

    <div class="tab-pane fade" id="browse-search">
    <?php echo $this->partial('items/search-form.php',
    array(
        'formAttributes' => array('id'=>'advanced-search-form'),
        'useSidebar' => false)); 
        ?>
    </div>
</div>
<?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
</div>
<div class="row">
    <div id="pagination-bottom" class="rb-page">
            <?php echo pagination_links(); ?>
    </div>
</div>


    <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<!-- </div>end primary -->

<?php echo foot(); ?>
