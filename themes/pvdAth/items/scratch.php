<?php 
            $fs = metadata('item', array('Dublin Core','Identifier')); ?>
            <?php echo link_to_item(
            item_image('square_thumbnail', array(), 0, $item),
                array(
                    'class' => 'kemba'),
                    'onclick' => 'openModal();currentSlide(1)',
                    'show', $item); ?>
            <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                    <div class="mySlides">
                        <img src="uploads/<?=$fs?>.png" style="width:100%">
                    </div>    
                </div>                    
            </div>

            <a href="uploads/<$=fs?>.png" data-lightbox="lightbox" data-title="My caption">