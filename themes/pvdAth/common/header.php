<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_file('lib/bootstrap.min');
        queue_css_file('lib/font-awesome.min');
        // queue_css_file('lib/ekko-lightbox');
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('lib/jquery.min');
        // queue_js_file('ekko-lightbox');
        queue_js_file('globals');
        echo head_js();
    ?>
    
    
    <link rel="shortcut icon" href="favicon.ico" />
    


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header class="banner">
        <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
        <h1 class="text-center"><a href="http://digital.provath.org">The Providence Athenæum</h1>
        <h2 class="text-center"><?php echo __('Digital Art Collection'); ?></a></h2>
        <nav class="navbar navbar-default" role="navigation">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navigation">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            <div class="collapse navbar-collapse" id="primary-navigation">
                <?php echo public_nav_main_bootstrap(); ?>

                <form class="navbar-form navbar-right" style="color:#fff;" action="<?php echo public_url(''); ?>search">
                    <?php echo search_form(array('show_advanced' => false)); ?>
                </form>

        </nav>
</header>
<!--<div class="navbar-fixed-side-left">
<ul class="sidnav" id="myScrollSpy">
    <li><a href="https://facebook.com" target="_blank"><img src="/themes/pvdAth/images/fb.png" alt="Facebook"/></a></li>
    <li><img src="/themes/pvdAth/images/twitter.png" alt="Twitter"/></li>
</ul>
</div>-->
    <main id="content" role="main">
      
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
