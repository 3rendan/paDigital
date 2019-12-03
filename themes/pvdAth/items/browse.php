<?php
$pageTitle = __('Browse items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>
<div class="container">
    <div class="row col-sm-12">
        <h3 style="text-align:left"><?php echo $pageTitle;?> <small><?php echo __('(%s items total)', $total_results); ?></small></h3> 
    </div> 
</div> 
<div class="container">
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
        <div class="container">
            <?php 
            foreach(loop('items') as $item) {
                echo "<div class=\"browse-items\">" . link_to_item(item_image('square_thumbnail', array('id' => 'lightbox')));
                echo "<h5>" . link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')) . "</h5></div>";
                $x = metadata($item, array('MODS', 'Local accession'));
                }
                ?>
                <script>
                    const localAccession = (<?php echo json_encode($x); ?> + `.jpg`);
                </script>
        </div>
    </div>
    <div class="tab-pane fade" id="browse-tags">
        <!-- <div class="row col-sm-offset-1 col-sm-10"> -->
            <?php echo "<div class=\"tag-text container\"" . tag_string(get_records('Tag', array(), 0)) . "</div>"; ?>   
            
    </div>
    <div class="tab-pane fade" id="browse-search">
        <?php echo $this->partial('items/search-form.php',
        array(
            'formAttributes' => array('id'=>'advanced-search-form'),
            'useSidebar' => false)); 
            ?>
    </div>
</div>
</div>
    </!-->
    <div class="container"  style="padding-bottom:20px">
        <?php echo pagination_links(); ?>      
        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
    </div>

<div>
<?php echo foot(); ?>
</div>