<?php queue_css_file('lightbox.min'); ?>
<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>
<div class="row flex-container"> <!-- ITEM TITLE ROW  -->
    <h3><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h3>
    <!-- <h4>where collection should be</h4> -->
</div> 
<div class="flex-container">
    <section class="tombstone">
    </section>
    <section class="item-img">
        <?php echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?>
    </section>
</div>  <!-- end of .flex-container row 1  -->
<div class="flex-container">
    <section class="tags">
        <?php echo __('TAGS'); ?>
    </section>
    <section class="license">
        <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p> 
    </section>
    <section class="dwnlds">
        <p>text</p>
    </section>
</div>
<div class="flex-container">
</div>
    
 


<?php echo foot(); ?>