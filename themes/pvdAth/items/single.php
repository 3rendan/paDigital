
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    ?>
    <?php if (metadata($item, 'has files')) ?>
    

  
    <?php echo link_to_item(
            item_image('square_thumbnail', array(), 0, $item), 
            array(
                'class' => 'image'), 
                'show', $item

    );
    ?>

            

    