<?php queue_css_file('lightbox.min'); ?>
<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="title-row col-sm-11 col-sm-offset-1">
        <p class='item-title'><?php echo metadata('item', array('Dublin Core', 'Title')); ?></p>
            <?php if (metadata('item', 'Collection Name')): ?>
            <div id="collection">
                <div class="item-collection"><p class="collection"><?php echo link_to_collection_for_item(); ?></p></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7 tombstone">
            <p>tombstone</p>
        </div>
        <div class="col-sm-5"> <!-- item image -->
                <?php echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?> 
        </div>
    </div>
    <div class="row">
        <div class="row col-sm-8">
            <?php if (metadata('item', 'has tags')): ?>
            <div class="tags">
                <h5 class="noPrint"><?php echo __('TAGS'); ?></h5>
                <div class="tag-text"><?php echo "<p class=\"tags-text\">" tag_string('item') "</p>"; ?></div>
            </div>
        <?php else: echo __('TAGS'); ?>
        <?php endif; ?>
            <div class="col-sm-12 license">
                <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p>
            </div>
        </div>
        
        <div class="col-sm-4 dwnlds">
            <?php
                $fs = metadata('item', array('Dublin Core','Identifier'));
                $fsz = metadata('item', array('Dublin Core','Identifier')) . ".zip";
                $fileName = BASE_DIR . "/uploads/" . $fs . ".zip";
                if (file_exists($fileName) == TRUE) {
                        echo "<a href=\"/uploads/$fsz\"><button class=\"btn-dwnld\" title=\"A compressed TIF download of the image\">Download (TIF)</button></a>";
                    }     ?>
                <a href="/uploads/<?=$fs?>.jpg"><button type="button" class="btn-dwnld" title="A full resolution image of the item in JPEG format">Download (JPEG)</button></a>
                <button type="button" class="btn-dwnld" data-toggle="modal" data-target="#cite">Citation</button><br>
                <br />
                    <?php
                    $url = $_SERVER['REQUEST_URI']; ?>
        </div>
        <div id="cite" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Citation</h3>
                    </div>
                    <div class="modal-body">
                        <p class="hanging"><?php echo metadata('item', 'citation', array('no_escape' => true))?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
  
</div>
<?php endif; ?>





    <?php echo foot(); ?>
