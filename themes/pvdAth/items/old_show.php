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
<div class="col-sm-1 col-md-1"></div>
        <div class="col-sm-6">
            <p class='item-title'><?php echo metadata('item', array('Dublin Core', 'Title')); ?></p>
            <?php if (metadata('item', 'Collection Name')): ?>
            <div id="collection" class="element">
                <div class="item-collection"><p><?php echo link_to_collection_for_item(); ?></p></div>
            </div>
    <?php endif; ?>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
<!-- TOMBSTONE AND IMAGE ROW  -->
<!-- 2 column buffer -->
   
    
<div class="row">
<!-- ITEM INFO TAB  --> 
<div class="col-sm-1 col-md-1"></div>
<div class="col-sm-6 col-md-6 tombstone" id="tombstone"> 
    <ul class="nav nav-tabs nav-justified proper noPrint">
        <li class="active"><a data-toggle="pill" href="#Info">INFO</a></li>
        <li><a data-toggle="tab" href="#Summary">SUMMARY</a></li>
        <li><a data-toggle="tab" href="#Resources" >RELATED RESOURCES</a></li>
    </ul>

    <div class="tombstone">
        <div class="tab-content wrapper">
            <div class="tab-pane fade in active" id="Info">
                
                <table class="category">
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
                    $subject = metadata($item, array('Dublin Core', 'Subject'), array('delimiter' => '<br> '));
                    if (strpos($subject, '<br> ') == TRUE) {     
                        echo "<tr><td>SUBJECTS</td><td>$subject</td></tr>";
                    } elseif ($subject != ''){
                        echo "<tr><td>SUBJECT</td><td>$subject</td></tr>";
                    } else{
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
            
            <div class="tab-pane fade" id="Summary">
                <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
            </div>

            <div class="tab-pane fade" id="Resources">           
                <?php
                $refNote = metadata('item', array('MODS', 'Citation/reference note(s)'));
                if ($refNote != '') {
                    echo $refNote;
                }
                ?> 
                <?php 
                $wheaton = "uploads/Wheaton/" . metadata($item, array('MODS', 'Local accession')) . "-WC.pdf";
                $essay_title = '"' . metadata($item, array('Dublin Core', 'Title')) .',"' . " Wheaton College student essay, 2016.";
                if (file_exists($wheaton))
                echo '<a href="http://digital.provath.org/' . $wheaton . '" target="_blank">' . $essay_title . '</a>';
                ?>              
                  
            </div>
            </div>
        </div>
    </div>
 
</a>
<div class="data">               
    <table class="category">
        <tr>
            <td>T</td>
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
<div class="data-2">
            
    <div class="story">
        <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
    </div>

    <div class="related-resources">
        <div class="panel" style="list-style:none;">
            <?php 
            $wheaton = "uploads/Wheaton/" . metadata($item, array('MODS', 'Local accession')) . "-WC.pdf";
            $essay_title = '"' . metadata($item, array('Dublin Core', 'Title')); 
            if (file_exists($wheaton))
            echo '<a href="http://digital.provath.org/' . $wheaton . '" target="_blank">' . $essay_title . '</a>' . ' Wheaton College student essay, 2016.';
            ?>
            <br>
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
     
<!-- IMAGE FILE  -->           
    <div class="col-sm-4 col-md-4 print-img mobile-grave"> 
        <?php 
        echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?> 
    </div>
</div>
<div class="row"></div>

<!-- TAGS AND LICENSE -->
<div class="row tag-license">
    <span class="col-sm-1 col-md-1"></span>
    <div class="col-sm-6 col-md-6">
        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags">
            <h5 class="noPrint"><?php echo __('TAGS'); ?></h5>
            <div class="element-text"><?php echo tag_string('item'); ?></div>
        </div>
        <?php else: echo "<div class=\"col-sm-4 col-md-4 tags\"></div>"; ?>
        <?php endif; ?>
        <br>
        <div class="license">
            <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p> 
        </div>
    </div>
    

    <div class="col-md-3 col-sm-3 share noPrint"> 
    <?php 
    $fs = metadata('item', array('Dublin Core','Identifier')); 
    $fsz = metadata('item', array('Dublin Core','Identifier')) . ".zip";
    $fileName = BASE_DIR . "/uploads/" . $fs . ".zip";
    if (file_exists($fileName) == TRUE) {
            echo "<a href=\"/uploads/$fsz\"><button class=\"btn-show\" title=\"A compressed TIF download of the image\">Download (TIF)</button></a>";
        }     ?>
        <a href="/uploads/<?=$fs?>.jpg" download><button class="btn-show" title="A full resolution image of the item in JPEG format">Download (JPEG)</button></a>
        <button type="button" class="btn-show" data-toggle="modal" data-target="#cite">Citation</button><br>
        <br />
        <?php 
        $url = $_SERVER['REQUEST_URI'];
        ?>
        <a href="http://www.facebook.com/share.php?u=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/facebook.svg"  style="width: 32px;" alt="Facebook" /></a> 
        <a href="https://twitter.com/share?text=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/twitter.svg"  style="width: 32px;" alt="Twitter"/></a>
        <a href="#" onclick="window.print();return false;"><img src="/uploads/print.svg"  style="width: 32px;" alt="Print"/></a>                         
    </div></div>

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

<div class="row" style="padding-top: 20px;">
    <div class="col-sm-2 col-md-2">
    </div>
    <div class="col-sm-4 col-md-4 pager no-mobile">
        <span class="previous" style="float: right;padding:5px;margin-right: 20px;"><?php echo link_to_previous_item_show(); ?></span> 
        </div>
    <div class="col-sm-4 col-md-4 pager no-mobile">   
        <span class="next" style="float: left;padding:5px;"><?php echo link_to_next_item_show(); ?></span>
    </div>
    <div class="col-sm-2 col-md-2">
        <p style="color: #fff">text</p>
    </div>
</div>
<!-- MOBILE PAGER -->

    <span id="pager-mobile" class="previous"><?php echo link_to_previous_item_show(); ?></span>  
    <span id="pager-mobile" class="next"><?php echo link_to_next_item_show(); ?></span>

                   




  


<?php echo foot(); ?>
