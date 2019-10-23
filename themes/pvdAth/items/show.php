<?php queue_css_file('lightbox.min'); ?>
<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>
<div id="title-row">

</div>
<div class="sixty-five">
    <div class="tombstone">
        <div id="Info">

        </div>
        <div id="Summary">

        </div>
        <div id="Resources">

        </div>
    </div>
    <div class="tags">
            <?php echo __('TAGS'); ?>
        </div>
    <div class="license">
        <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p>
    </div>
</div>
<div class="thirty-five">
    <img src="" alt="">
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