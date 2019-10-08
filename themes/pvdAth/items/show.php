<?php queue_css_file('lightbox.min'); ?>
<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>

<?php echo js_tag('lightbox', 'javascripts'); ?>

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
        <li><a data-toggle="tab" href="#Story">STORY</a></li>
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
            
            <div class="tab-pane fade" id="Story">
                <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
            </div>

            <div class="tab-pane fade" id="Resources">
                <div class="panel" style="list-style:none;">
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
    </div>
</div>   
       
<!-- IMAGE FILE  -->           
    <div class="col-sm-4 col-md-4"> 
        <?php 
        echo item_image_gallery(array('link', array('data-lightbox'=>'lightbox'))); ?> 
    </div>
</div>

<div class="row">
    <br>
</div>
<!-- RELATED ITEMS -->
<div class="row container">
    <div class="col-sm-1 col-md-1"></div>
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
        <a href="http://www.facebook.com/share.php?u=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/fb.png" alt="Facebook" /></a> 
        <a href="#" onclick="window.print();return false;"><img src="/uploads/print.png" alt="Print"/></a>
        <a href="https://twitter.com/share?text=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/twitter.png" alt="Twitter"/></a>                 
    </div>
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


    

      <!-- Trigger the modal with a button
  
      
    </div> </div></div>-->
    
    

<!-- MODS MODAL DIALOG--> 
  <!-- Modal -->
  <div class="modal fade" id="mods" role="dialog">
      <!-- Modal content-->
      <div class="modal-dialog modal-content mods-dialog">

        <div class="modal-header">

          <h4 class="modal-title">Metadata Object Schema</h4>
      </div>
      <table class="modal-body bracket">  
        <tr>
            <td>Accession Number:</td>
            <td><?php echo metadata('item', array('MODS', 'Local accession')); ?></td>
        </tr>
        <?php
        function relax() {
            ;
        }
        ?>
        <?php
        $title = metadata('item', array('MODS', 'Primary title'));
        if ($title != '') {
            echo "<tr><td>Title:</td><td>$title</td></tr>";
        } 
        ?>
        <?php
        $catcre = metadata('item', array('MODS', 'Primary title is Cataloger-Created'));
        if ($catcre != '') {
            echo "<tr><td>Cataloger created:</td><td>$catcre</td></tr>";
        } 
        ?>
        <?php
        $SOR = metadata('item', array('MODS', 'Statement of responsibility'));
        if ($SOR != '') {
            echo "<tr><td>Statement of responsibility:</td><td>$SOR</td></tr>";
        } 
        ?>
        <?php
        $names = metadata('item', array('MODS', 'Name'), array('delimiter' => '<br> '));
        if (strpos($names, '<br> ') == TRUE) {         
            echo "<tr><td>Creators:</td><td>$names</td></tr>";
        } elseif ($names != ''){
            $nURI = metadata('item', array('MODS', 'Name Value URI'));
            echo "<tr><td>Creator:</td><td><a href=\"$nURI\" target=\"_blank\">$names</td></a></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $role = metadata('item', array('MODS', 'Role'), array('delimiter' => '<br> '));
        if (strpos($role, '<br> ') == TRUE) {     
            echo "<tr><td>Role:</td><td>$role</td></tr>";
        } elseif ($role != ''){
            echo "<tr><td>Role:</td><td>$role</td></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $basic = metadata('item', array('MODS', 'BASIC genre/form'), array('delimiter' => '<br> '));
        if ($basic != '') {
            $bURI = metadata('item', array('MODS', 'BASIC genre/form Value URI'), array('delimiter' => '<br> '));
            echo "<tr><td>Type of Resource:</td><td><a href=\"$bURI\" target=\"_blank\">$basic</td></tr>";
        } 
        ?>
        <?php
        $specific = metadata('item', array('MODS', 'SPECIFIC TGM genre/form'), array('delimiter' => '<br> '));
        if (strpos($specific, '<br> ') == TRUE) {     
            echo "<tr><td>Specific Types:</td><td>$specific</td></tr>";
        } elseif ($specific != ''){
            $sURI = metadata('item', array('MODS', 'SPECIFIC TGM Value URI'));
            echo "<tr><td>Specific genre/form:</td><td><a href=\"$sURI\" target=\"_blank\">$specific</td></tr>";    
        } else{
            relax();
        }          
        ?>
        <?php
        $dsingle = metadata('item', array('MODS', 'Date (single date)'));
        if ($dsingle != '') {
            echo "<tr><td>Date:</td><td>$dsingle</td></tr>";
        } 
        ?>
        <?php
        $dstart = metadata('item', array('MODS', 'Date range Start'));
        $dend = metadata('item', array('MODS', 'Date range End'));
        if ($dstart != '') {
            echo "<tr><td>Date Range:</td><td>$dstart-$dend</td></tr>";
        } 
        ?>
        <?php
        $dq = metadata('item', array('MODS', 'Date qualifier'));
        if ($dq != '') {
            echo "<tr><td>Date qualifier:</td><td>$dq</td></tr>";
        } 
        ?>
        <?php
        $pd = metadata('item', array('MODS', 'Physical description'));
        if ($pd != '') {
            echo "<tr><td>Physical description:</td><td>$pd</td></tr>";
        } 
        ?>
        <?php
        $abstract = metadata('item', array('MODS', 'Summary/Abstract'));
        if ($abstract != '') {
            echo "<tr><td>Abstract:</td><td>$abstract</td></tr>";
        } 
        ?>
        <?php
        $genNotes = metadata('item', array('MODS', 'GENERAL note(s)'));
        if ($genNotes != '') {
            echo "<tr><td>General Notes:</td><td>$genNotes</td></tr>";
        } 
        ?>
        <?php
        $dNotes = metadata('item', array('MODS', 'Date note(s)'));
        if ($dNotes != '') {
            echo "<tr><td>Date Notes:</td><td>$dNotes</td></tr>";
        } 
        ?>
        <?php
        $lNotes = metadata('item', array('MODS', 'Language note(s)'));
        if ($lNotes != '') {
            echo "<tr><td>General Notes:</td><td>$lNotes</td></tr>";
        } 
        ?>
        <?php
        $aNotes = metadata('item', array('MODS', 'Acquisition note(s)'));
        if ($aNotes != '') {
            echo "<tr><td>Acquistion Notes:</td><td>$aNotes</td></tr>";
        } 
        ?>
        <?php
        $fNotes = metadata('item', array('MODS', 'Funding note(s)'));
        if ($fNotes != '') {
            echo "<tr><td>Funding Notes:</td><td>$fNotes</td></tr>";
        } 
        ?>
        <?php
        $bNotes = metadata('item', array('MODS', 'Biographical/historical note(s)'));
        if ($bNotes != '') {
            echo "<tr><td>Bibliographic Notes:</td><td>$bNotes</td></tr>";
        } 
        ?>
        <?php
        $note = metadata('item', array('MODS', 'Citation/reference note(s)'), array('delimiter' => '<br> '));
        if (strpos($note, '<br> ') == TRUE) {         
            echo "<tr><td>Citation Notes:</td><td>$note</td></tr>";
        } elseif ($note != ''){
            echo "<tr><td>Citation Note:<td>$note</td></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $pCite = metadata('item', array('MODS', 'Preferred citation note(s)'));
        if ($pCite != '') {
            echo "<tr><td>Preferred citation notes:</td><td>$pCite</td></tr>";
        } 
        ?>
        <?php
        $bNotes = metadata('item', array('MODS', 'Bibliography note(s)'));
        if ($bNotes != '') {
            echo "<tr><td>Bibliography notes:</td><td>$bNotes</td></tr>";
        } 
        ?>
        <?php
        $eNotes = metadata('item', array('MODS', 'Exhibitions note(s)'));
        if ($eNotes != '') {
            echo "<tr><td>Exhibition Notes:</td><td>$eNotes</td></tr>";
        } 
        ?>
        <?php
        $tgmh = metadata('item', array('MODS', 'TGM headings (topic)'));
        if ($tgmh != '') {
            $tURI = metadata('item', array('MODS', 'TGM headings (topic) Value URI'));
            echo "<tr><td>TGM Headings:</td><td><a href=\"$tURI\" target=\"_blank\">$tgmh</td></a></tr>";
        } 
        ?>
        <?php
        $LCSH = metadata('item', array('MODS', 'LCSH (topic)'), array('delimiter' => '<br> '));
        if (strpos($LCSH, '<br> ') == TRUE) {     
            echo "<tr><td>LC Subject Headings:</td><td>$LCSH</td></tr>";
        } elseif ($LCSH != ''){
            $lcURI = metadata('item', array('MODS', 'LCSH (topic) Value URI'));
            echo "<tr><td>LC Subject Heading:</td><td>$LCSH</td></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $pnSubject = metadata('item', array('MODS', 'Proper name subject'), array('delimiter' => '<br> '));
        if (strpos($pnSubject, '<br> ') == TRUE) {     
            echo "<tr><td>Proper Name Subjects:</td><td>$pnSubject</td></tr>";
        } elseif ($pnSubject != ''){
            $pnsURI = metadata('item', array('MODS', 'Proper name subject Value URI'));
            echo "<tr><td>Proper Name Subject:</td><td>$pnSubject</td></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $tgnID = metadata('item', array('MODS', 'TGN ID (hierarchical geographic)'));
        if ($tgnID != '') {
            echo "<tr><td>Theasaurus for Geographical Names ID:</td><td>$tgnID</td></tr>";
        } 
        ?>
        <?php
        $geoNames = metadata('item', array('MODS', 'GeoNames'));
        if ($geoNames != '') {
            echo "<tr>GeoNames<td>:</td><td>$geoNames</td></tr>";
        } 
        ?>
        <?php
        $lcGeographics = metadata('item', array('MODS', 'LC Geographics'), array('delimiter' => '<br> '));
        if (strpos($lcGeographics, '<br> ') == TRUE) {     
            echo "<tr><td>:</td><td>$lcGeographics</td></tr>";
        } elseif ($lcGeographics != ''){
            $lcgURI = metadata('item', array('MODS', 'LC Geographics: Value URI'));
            echo "<tr><td>LC Geographics:</td><td><a href=\"$lcgURI\" target=\"_blank\">$lcGeographics</td></tr>";
        } else{
            relax();
        }          
        ?>
        <?php
        $cartScale = metadata('item', array('MODS', 'Cartographic scale'));
        if ($cartScale != '') {
            echo "<tr><td>Cartographic Scale:</td><td>$cartScale</td></tr>";
        } 
        ?>
        <?php
        $cartCoord = metadata('item', array('MODS', 'Cartographic coordinates'));
        if ($cartCoord != '') {
            echo "<tr><td>Cartographic coordinates:</td><td>$cartCoord</td></tr>";
        } 
        ?>
        <?php
        $cart = metadata('item', array('MODS', 'Cartographic projection'));
        if ($cart != '') {
            echo "<tr><td>Cartographic projection:</td><td>$cart</td></tr>";
        } 
        ?>
        <?php
        $host = metadata('item', array('MODS', 'Host collection'));
        if ($host != '') {
            echo "<tr><td>Host:</td><td>$host</td></tr>";
        } 
        ?>
        <?php
        $subCollection = metadata('item', array('MODS', 'Subcollection'));
        if ($subCollection != '') {
            echo "<tr><td>Subcollection:</td><td>$subCollection</td></tr>";
        } 
        ?>
        <?php
        $location = metadata('item', array('MODS', 'Physical location (library)'));
        if ($location != '') {
            echo "<tr><td>Library Location:</td><td>$location</td></tr>";
        } 
        ?>
        <?php
        $rights = metadata('item', array('MODS', 'Rights'));
        if ($rights != '') {
            echo "<tr><td>Rights:</td><td>$rights</td></tr>";
        } 
        ?>
        <?php
        $license = metadata('item', array('MODS', 'License'));
        if ($license != '') {
            echo "<tr><td>License:</td><td>$license</td></tr>";
        } 
        ?>
    </table>
    <div class="modal-footer" style="background:#fff;">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>

</section>

                
<ul class="pager">
    <li class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>



  


<?php echo foot(); ?>
