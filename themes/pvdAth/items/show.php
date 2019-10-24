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
                <p class="collection"><?php echo link_to_collection_for_item(); ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-sm-7 tombstone"> -->
            <div class="col-sm-7 tombstone container">
                <ul class="nav nav-pills nav-justified">
                    <li class='nav-item'><a href="#info" data-toggle="tab" class="nav-link active">INFO</a></li>
                    <li class='nav-item'><a href="#story" data-toggle="tab" class="nav-link">STORY</a></li>
                    <li class='nav-item'><a href="#resources" data-toggle="tab" class="nav-link">RELATED RESOURCES</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpane" class="tab-pane fade in active" id="info">
                        <table class="info">
                            <tr>
                                <td>TITLE</td>
                                <td><?php echo metadata($item, array('Dublin Core', 'Title')); ?></td>
                            </tr>
                            <?php
                            $creator = metadata($item, array('MODS', 'Name'), array('delimiter' => '<br> '));
                            if (strpos($creator, '<br> ') == TRUE) {     
                                echo "<tr><td>CREATORS</td><td>$creator</td></tr>";
                            } elseif ($creator != ''){
                                echo "<tr><td>CREATOR</td><td>$creator</td></tr>";
                            } else{
                                echo "<tr><td>CREATOR</td><td>unknown</td></tr>";
                            }           
                            ?>
                            <?php
                            $date = metadata($item, array('Dublin Core', 'Date'));
                            if ($date != '') {
                                echo "<tr><td>DATE </td><td>$date</td></tr>";
                            } 
                            ?>
                            <?php
                            $dimensions = metadata($item, array('Item Type Metadata', 'Dimensions'));
                            if ($dimensions != '') {
                                echo "<tr><td>DIMENSIONS </td><td>$dimensions</td></tr>";
                            } 
                            ?> 
                            
                            <?php
                            $medium = metadata($item, array('Item Type Metadata', 'Original Format'));
                            if ($medium != '') {
                                echo "<tr><td>MEDIUM </td><td>$medium</td></tr>";
                            } 
                            ?>
                            <?php
                            $pnote = metadata($item, array('Item Type Metadata', 'Medium'));
                            if  ($pnote != '') {
                                echo "<tr><td>PHYSICAL NOTE </td><td>$pnote</td></tr>";
                            } 
                            ?>
                            <?php
                            $donor = metadata($item, array('MODS', 'Acquisition note(s)'));
                            if ($donor != '') {
                                echo "<tr><td>DONOR </td><td>$donor</td></tr>";
                            } 
                            ?>
                            <?php
                            $x = metadata($item, array('MODS', 'Local accession'));
                            $y = trim($x, "PA-");
                            $accession = substr($y, 0, -3);
                            if (stripos($x,'9999') == FALSE) {
                                echo "<tr><td>DATE OF ACCESSION </td><td>$accession</td></tr>";
                            } 
                            ?>
                            <?php
                            $library = metadata($item, array('MODS', 'Host collection'));
                            $location = metadata($item, array('MODS', 'Physical location (library)'));
                            $llocation = $library . ": " . $location;
                            if ($location != '') {
                                echo "<tr><td>LOCATION </td><td>$llocation</td></tr>";
                            } 
                            ?>
                        </table>
                    </div>
                    <div role="tabpane" class="tab-pane fade" id="story">
                        <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
                    </div>
                    <div role="tabpane" class="tab-pane fade" id="resources">
                        <?php
                        $date = metadata($item, array('Item Type Metadata', 'Resources'));
                        if ($date != '') {
                            echo $date;
                        } 
                        ?>
                        <br>
                        <?php
                        $refNote = metadata('item', array('MODS', 'Citation/reference note(s)'));
                        if ($refNote != '') {
                            echo $refNote;
                        }
                        ?>                   
                    </div>           
                </div>
            </div>
        <!-- </div> -->
        <div class="col-sm-5 item-image"> <!-- item image -->
                <?php echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?> 
        </div>
    </div>
    <div class="row">
        <div class="row col-sm-7">
            <?php if (metadata('item', 'has tags')): ?>
            <div class="tags">
                <h5 style="padding-left:20px"><?php echo __('TAGS'); ?></h5>
                <div class="tag-text"><?php echo tag_string('item'); ?></div>
            </div>
        <?php else: echo __('TAGS'); ?>
        <?php endif; ?>
            <div class="col-sm-12 license">
                <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p>
            </div>
        </div>
        
        <div class="col-sm-4 col-sm-offset-1 dwnlds">
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
