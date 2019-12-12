
<?php 
        foreach(loop('tags') as $tag) {
                echo $tag;
        }
?>
<?php
sort($tags);
echo tag_cloud($tags, 'items/browse');
?>

