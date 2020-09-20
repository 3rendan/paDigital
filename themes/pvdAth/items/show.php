<?php queue_css_file('lightbox.min'); ?>
<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>


<div class="container">
    <div class="row col-sm-12">
        <h3 class='item-title'><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h3>
            <?php if (metadata('item', 'Collection Name')): ?>
            <div id="collection">
                <p class="collection"><?php echo link_to_collection_for_item(); ?></p>
            </div>
    </div>
<div class="container">
  <div id='mobileLightbox' type='button'>

      <?php
      echo link_to_item(item_image('square_thumbnail', array(), 0, $item), array('class' => 'kemba'),'show', $item); ?>
  </div>
        <!-- <div class="col-sm-7 tombstone"> -->
            <div class="col-sm-7">
                <ul id="noMobile" class="nav nav-tabs nav-justified">
                    <li class='nav-item'><a href="#info" data-toggle="tab" class="nav-link active">INFO</a></li>
                    <li class='nav-item'><a href="#story" data-toggle="tab" class="nav-link">STORY</a></li>
                    <li class='nav-item' id='cpu'><a href="#resources" data-toggle="tab" class="nav-link">RESOURCES</a></li>
                </ul>
                <!-- <div class="phone-nav">
                  <span><a href="#info" data-toggle="tab">INFO</a></span>
                  <span><a href="#story" data-toggle="tab">STORY</a></span>
                </div> -->
                <div class="tab-content tombstone">
                    <div role="tabpane" class="tab-pane fade in active"  id='info'>
                        <table class="category">
                        <tbody>
                            <tr>
                            <td class='mtdt'>TITLE</th>
                                <td><?php echo metadata($item, array('Dublin Core', 'Title')); ?></td>
                            </tr>
                            <?php
                            $creator = metadata($item, array('MODS', 'Name'), array('delimiter' => '<br> '));
                            if (strpos($creator, '<br> ') == TRUE) {
                                echo "<td class='mtdt'>CREATORS</th><td>$creator</td></tr>";
                            } elseif ($creator != ''){
                                echo "<tr><td class='mtdt'>CREATOR</th><td>$creator</td></tr>";
                            } else{
                                echo "<tr><td class='mtdt'>CREATOR</th><td>unknown</td></tr>";
                            }
                            $date = metadata($item, array('Dublin Core', 'Date'));
                            if ($date != '') {
                                echo "<tr><td class='mtdt'>DATE </th><td>$date</td></tr>";
                            }
                            $dimensions = metadata($item, array('Item Type Metadata', 'Dimensions'));
                            if ($dimensions != '') {
                                echo "<tr><td class='mtdt'>DIMENSIONS </><td>$dimensions</td></tDIMENSIONS>";
                            }
                            $original_format = metadata($item, array('Item Type Metadata', 'Original Format'));
                            if ($original_format != '') {
                              echo "<tr><td class='mtdt'>ORIGINAL FORMAT </td><td>$original_format</td></tr>";
                            }
                            $medium = metadata($item, array('Item Type Metadata', 'Medium'));
                            if ($medium != '') {
                                echo "<tr><td class='mtdt'>MEDIUM </td><td>$medium</td></tr>";
                            }
                            $pnote = metadata($item, array('Item Type Metadata', 'Physical Note'));
                            if  ($pnote != '') {
                                echo "<tr><td class='mtdt'>PHYSICAL NOTE </td><td>$pnote</td></tr>";
                            }
                            $donor = metadata($item, array('MODS', 'Acquisition note(s)'));
                            if ($donor != '') {
                                echo "<tr><td class='mtdt'>DONOR </td><td>$donor</td></tr>";
                            }
                            $x = metadata($item, array('MODS', 'Local accession'));
                            $xx = $x . ".jpg";
                            $y = trim($x, "PA-");
                            $accession = substr($y, 0, -3);
                            if (stripos($x,'9999') == FALSE) {
                                echo "<tr><td class='mtdt'>DATE OF ACCESSION </td><td>$accession</td></tr>";
                            }
                            $library = metadata($item, array('MODS', 'Host collection'));
                            $location = metadata($item, array('MODS', 'Physical location (library)'));
                            $llocation = $library . ": " . $location;
                            if ($location != '') {
                                echo "<tr><td class='mtdt'>LOCATION </td><td>$llocation</td></tr>";
                            }
                            ?>
                            <script>
                                const localAccession = <?php echo json_encode($xx); ?> ;
                            </script>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpane" class="tab-pane" id="story">
                        <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
                    </div>
                    <div role="tabpane" class="tab-pane" id="resources">
                        <?php
                        $date = metadata($item, array('Item Type Metadata', 'Resources'));
                        if ($date != '') {
                            echo $date;
                        }
                        ?>
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

        <div class="col-sm-5" type='button' style="padding-top:15px">
        <!-- img-fluid modal resize -->
        <!-- <a type="button" data-toggle="modal" data-target="#full-size"> -->
            <?php
            $fs = metadata('item', array('Dublin Core','Identifier'));
            $fsz = metadata('item', array('Dublin Core','Identifier')) . ".zip";
            $fileImgName = BASE_DIR . "/uploads/" . $fs . ".jpg";
            echo link_to_item(
                item_image('square_thumbnail', array('id' => 'lightbox'), 0, $item),
                array(
                    'class' => 'kemba'),
                    'show', $item); ?>
        </div>
        <div class="modal" id="imageModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <?php
                    $title = metadata($item, array('Dublin Core', 'Title'));
                    echo "<h5 class='modal-title'>$title</h5>";
                    ?>
                    </div>
                    <div class="modal-body">
                      <?php
                      $popup = $fs . ".jpg";
                      echo "<img src='http://digital.provath.org/uploads/$popup' style='width: 100%;' >";
                      ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-sm-7">
            <h3 style="padding-left:20px">TAGS</h3>
            <div class="container tag-text col-sm-12" style='justify-content:space-around;'>
                <?php if (metadata('item', 'has tags')): ?>
                <?php echo tag_string('item'); ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 license">
                <p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>. Please credit the Providence Athenæum when using this content.</p>
            </div>
        </div>


        <div class="col-sm-5 dwnlds">
            <?php
                $fileName = BASE_DIR . "/uploads/" . $fs . ".zip";
                if (file_exists($fileName) == TRUE) {
                        echo "<a href=\"/uploads/$fsz\"><button class=\"btn-dwnld\" title=\"A compressed TIF download of the image\">Download (TIF)</button></a>";
                    }     ?>
                <a href="/uploads/<?=$fs?>.jpg" download><button type="button" class="btn-dwnld" title="A full resolution image of the item in JPEG format">Download (JPEG)</button></a>
                <button type="button" class="btn-dwnld" data-toggle="modal" data-target="#cite">Citation</button><br>
                <br />
                    <?php
                    $url = $_SERVER['REQUEST_URI']; ?>
        </div>
        <div id="cite" class="modal" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
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

        <div class="social col-sm-3 col-sm-offset-1">
          <a href="http://www.facebook.com/share.php?u=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/facebook.png" alt="Facebook"></a>
          <a href="https://twitter.com/share?text=https://digital.provath.org<?=$url?>" target="_blank"><img src="/uploads/twit.jpeg" alt="Twitter" /></a>
          <!-- <a href="https://twitter.com/share?text=https://digital.provath.org<?=$url?>" id="noDesktop" target="_blank"><img src="/uploads/inst.png" alt="Instagram" /></a> -->
          <!--<a href="#" onclick="window.print();return false;"><img src="/uploads/print.svg"  alt="Print"/></a>-->
        </div>
        </div>


        </div>
    </div>
</div>
</div>
<div class="container"  style="padding-bottom:20px">
    <?php echo link_to_previous_item_show(); ?>
    <?php echo link_to_next_item_show(); ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);
});

</script>


<?php endif; ?>

    <?php echo foot(); ?>
