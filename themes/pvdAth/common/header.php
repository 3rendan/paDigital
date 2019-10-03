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
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('globals');
        echo head_js();
    ?>
    <link rel="stylesheet" type"text/css" href="http://digital.provath.org/themes/pvdAth/css/print.css" media="print">
    <link rel="shortcut icon" href="favicon.ico" />
    


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header class="banner" role="banner">
        <!-- <div class="container noPrint"> -->
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <h1 class='banner'><a href="http://digital.provath.org"><img src="/uploads/wordmark.png" alt="THE PROVIDENCE ATHENAEUM" style="margin-top:-15px;"></h1>
            <h2><?php echo __('Art Collection'); ?></a></h5>
        <!-- </div> -->
    </header>
    <nav class="navbar" role="navigation">
        <div class="flex-container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navigation">
                <li class="sr-only">Menu</li>
                <li class="icon-bar"></li>
                <li class="icon-bar"></li>
                <li class="icon-bar"></li>
            </button>
            <div class="collapse navbar-collapse" id="primary-navigation">
                <?php echo public_nav_main_bootstrap(); ?>
                <form class="navbar-form navbar-right" action="<?php echo public_url(''); ?>search">
                    <?php echo search_form(array('show_advanced' => false)); ?>
                </form>
            </div>
        </div>
    </nav>
    
<!--<div class="navbar-fixed-side-left">
<ul class="sidnav" id="myScrollSpy">
    <li><a href="https://facebook.com" target="_blank"><img src="/themes/pvdAth/images/fb.png" alt="Facebook"/></a></li>
    <li><img src="/themes/pvdAth/images/twitter.png" alt="Twitter"/></li>
</ul>
</div>-->
    <!-- <main id="content" role="main">
      <div class="container"> -->
          
