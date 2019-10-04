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
            <ul class="nav-tabs nav-justified">
                <li class="active"><a data-toggle="pill" href="#Info">INFO</a></li>
                <li><a data-toggle="tab" href="#Summary">SUMMARY</a></li>
                <li><a data-toggle="tab" href="#Resources" >RELATED RESOURCES</a></li>
            </ul>
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
                <p>text</p>
            </div>
        </div><!-- end of .flex-column 2  -->
    </div><!-- end of .thirty-five  -->
</div> <!-- end of .flex-container  -->
    
 



    <?php echo foot(); ?>