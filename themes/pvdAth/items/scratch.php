<?php 
            $fs = metadata('item', array('Dublin Core','Identifier')); ?>
            <?php 
            $img = link_to_item(
                item_image('square_thumbnail', array(), 0, $item),
                array(
                    'class' => 'kemba'),
                    'show', $item); ?>
            <img src="uploads/<?=$img?>.png" onclick="openModal();currentSlide(1)" class="hover-shadow">
                <!-- <a href="/uploads/.png" data-lightbox="lightbox" data-title="Click to see a full size image"> -->
                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">

                        <div class="mySlides">
                        <div class="numbertext">1 / 4</div>
                        <img src="img1_wide.jpg" style="width:100%">
                        </div>                        
                            </div>