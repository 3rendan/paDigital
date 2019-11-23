<?php if ($item->Tags): ?>
    <nav>
        <?php foreach( $item->Tags as $key => $tag ): ?>

            <a class='tagged' href="<?php echo html_escape(url('items/browse/tag/' . urlencode($tag->name)));?>" rel="<?php echo html_escape($tag->id); ?>"><?php echo html_escape($tag); ?></a>
            
        
        <?php endforeach; ?>
    </nav>
<?php endif; ?>
