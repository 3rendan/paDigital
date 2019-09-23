<?php
$pageTitle = __('Search');
echo head(
    array(
        'title' => $pageTitle,
        'bodyclass' => 'items advanced-search',
        'bodyid' => 'advanced-search-page'
    )
);

echo $this->partial('items/search-form.php',
    array(
        'formAttributes' => array('id'=>'advanced-search-form'),
        'useSidebar' => false
    )
);
echo foot();
?>