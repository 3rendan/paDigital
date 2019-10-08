<?php 
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>
<?php echo js_tag('lightbox', 'javascripts'); ?>

    <div class="row"> <!-- TITLE ROW  -->
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <h2 style="font-variant: small-caps;"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
<div class="col-sm-5 col-md-5 tombstone">
<div class="tombstone">
    <div class="tab-content wrapper">
        <div class="tab-pane fade in active" id="Info">
            
            <table class="category">
<?php
$filename = metadata('item', array('MODS', 'Filename'));
if ($filename != '') {
    echo "<tr><td>:</td><td></td>$filename</tr>";
} 
?>
<?php
$lid = metadata('item', array('MODS', 'LocalID'));
if ($lid != '') {
    echo "<tr><td>:</td><td></td>$lid</tr>";
} 
?>
<?php
$oid = metadata('item', array('MODS', 'OtherID'));
if ($oid != '') {
    echo "<tr><td>:</td><td></td>oid</tr>";
} 
?>
<?php
$lcall = metadata('item', array('MODS', 'LocalCall'));
if ($lcall != '') {
    echo "<tr><td>:</td><td></td>$lcall</tr>";
} 
?>
<?php
$title = metadata('item', array('MODS', 'Title'));
if ($title != '') {
    echo "<tr><td>:</td><td>$title</td></tr>";
} 
?>
<?php
$catcre = metadata('item', array('MODS', 'catalogerCreated'));
if ($catcre != '') {
    echo "<tr><td>:</td><td>$catcre</td></tr>";
} 
?>
<?php
$SOR = metadata('item', array('MODS', 'SOR'));
if ($SOR != '') {
    echo "<tr><td>:</td><td>$SOR</td></tr>";
} 
?>
<?php
$name = metadata('item', array('MODS', 'Name'));
if ($name != '') {
    $nURI = metadata('item', array('MODS', 'nURI'));
    echo "<tr><td>:</td><td><a href=\"$nURI\" target=\"_blank\">$name</td></a></tr>";
} 
?>
<?php
$nType = metadata('item', array('MODS', 'nType'));
if ($nType != '') {
    echo "<tr><td>:</td><td>$nType</td></tr>";
} 
?>
<?php
$nAuthority = metadata('item', array('MODS', 'nAuthority'));
if ($nAuthority != '') {
    echo "<tr><td>:</td><td>$nAuthority</td></tr>";
} 
?>
<?php
$nURI = metadata('item', array('MODS', 'nURI'));
if ($nURI != '') {
    echo "<tr><td>:</td><td>$nURI</td></tr>";
} 
?>

