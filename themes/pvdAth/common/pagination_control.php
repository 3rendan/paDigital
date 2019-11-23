<?php if ($this->pageCount > 1): $getParams = $_GET; ?>
    
        <?php if (isset($this->previous)): ?>        
            <?php $getParams['page'] = $previous; ?>   
            <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>">← Previous page</a>           
        <?php endif; ?>
        <?php if (isset($this->next)): ?>        
            <?php $getParams['page'] = $next; ?>           
            <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>">Next page →</a>        
        <?php endif; ?>
    
<?php endif; ?>

