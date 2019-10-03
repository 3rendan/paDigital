<?php queue_css_file('lightbox.min'); ?>
<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>
 <div class="print-only">
     <h1>THE PROVIDENCE ATHENAEUM</h1>
     <h2>Art Collection</h2>
 </div> 
 <div class="row"> <!-- TITLE ROW  -->
 <div class="flex-container">
 
</div>  <!-- end of .flex-container  -->
<span id="pager-mobile" class="previous"><?php echo link_to_previous_item_show(); ?></span>  
    <span id="pager-mobile" class="next" style="float: right;"><?php echo link_to_next_item_show(); ?></span>

                   




  


<?php echo foot(); ?>