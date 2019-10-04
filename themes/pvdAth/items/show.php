<?php queue_css_file('lightbox.min'); ?>
<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>
<div class='flex-container'>  
    <div class="title-row"> <!-- ITEM TITLE ROW  -->
        <h3><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h3>
        <!-- <h4>where collection should be</h4> -->
    </div><!-- end of title/ collection  --> 
</div><!-- end of .flex-container for title row  -->
<div class="flex-container">
    <div class="sixty-five">
        <div class="flex-column">
            <div class="tombstone">
                <ul class="nav nav-pills nav-justified">
                    <li><a class="active nav-link" href="#Info">INFO</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#Summary">SUMMARY</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#Resources" >RELATED RESOURCES</a></li>
                </ul>
                <div class="tab-content">
                    <nav class="tab-pane fade in active" id="Info">
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                        <div class="category">category</div>
                        <div class="mtdt">metadata</div>
                    </nav>
                    <nav class="tab-pane fade" id="Summary">
                        <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</div>
                    </nav>
                    <nav class="tab-pane fade" id="Resources">
                        <p>RESOURCES Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </nav>
                </div>
            </div>
            <div class="tags">
                <?php echo __('TAGS'); ?>
            </div>
            <div class="license">
                <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p> 
            </div>
        </div>  <!-- end of .flex-column 1  -->
    </div> <!-- end of .sixty-five  -->
    <div class="thirty-five">   
        <div class="flex-column">
            <div class="item-img">
                <?php echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?>
            </div>
            <div class="dwnlds">
            <?php 
                $fs = metadata('item', array('Dublin Core','Identifier')); 
                $fsz = metadata('item', array('Dublin Core','Identifier')) . ".zip";
                $fileName = BASE_DIR . "/uploads/" . $fs . ".zip";
                if (file_exists($fileName) == TRUE) {
                        echo "<a href=\"/uploads/$fsz\"><button class=\"btn-show\" title=\"A compressed TIF download of the image\">Download (TIF)</button></a>";
                    }     ?>
                <a href="/uploads/<?=$fs?>.jpg"><button type="button" class="btn-show" title="A full resolution image of the item in JPEG format">Download (JPEG)</button></a>
                <button type="button" class="btn-show" data-toggle="modal" data-target="#cite">Citation</button><br>
                <br />
                    <?php 
                    $url = $_SERVER['REQUEST_URI'];
            ?>
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
        </div><!-- end of .flex-column 2  -->
    </div><!-- end of .thirty-five  -->
</div> <!-- end of .flex-container  -->
   
 



    <?php echo foot(); ?>