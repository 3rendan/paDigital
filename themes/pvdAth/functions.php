<?php

function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}
function setDefaultItemCountPerPage($count = 9)
    {
        self::$_defaultItemCountPerPage = (int) $count;
    }

function get_collection_image($id){
		$collectionImages=array(
			1=>WEB_ROOT.'/uploads/PA-1964-01.jpg', // collection 1
			2=>WEB_ROOT.'/themes/YOURTHEME/images/2.png', // collection 2
		);
		if(isset($collectionImages[$id])){
			return $collectionImages[$id];
		}else{
			$fallbackImage=WEB_ROOT.'/themes/YOURTHEME/images/fallback.png'; //fallback
			return $fallbackImage;
		}
}
