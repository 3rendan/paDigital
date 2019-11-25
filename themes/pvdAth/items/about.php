
<?php echo head(array('bodyid'=>'home')); ?>
    <div id="primary">
    <?php if (get_theme_option('Homepage About')): ?>
        <div class="row">
            <div class="span12">
                <p class="lead"><?php echo get_theme_option('Homepage Text'); ?></p>
            </div>
        </div>
<?php endif; ?>


<!-- ABOUT -->
<div class="about-section">
<p>The Providence Athenæum is an independent, member-supported library and cultural center located on Providence’s historic Benefit Street. Over its nearly 200 years of existence, the library has welcomed illustrious writers, spirited thinkers, and energetic community members through its doors to engage in reading, conversation, and debate. At its heart, the Athenæum encourages a love of reading and learning to all.</p>


<h4>The Project</h4>

<p>This project began as a collaboration with Wheaton College to document the art collection of the Providence Athenaeum in the spring of 2016.  The students from the senior seminar course in art history of Dr. R. Tripp Evans, researched and cataloged one hundred objects over the course of the semester, that resulted in scholarly essays for each item.  In 2017, funding from the Herman H. Rose Civic, Cultural and Media Access Fund (formerly the ADDD Fund) allowed the Athenaeum to photograph over half of these objects, and to create the current searchable database of the art collection connecting objects with descriptions. </p>

 <p>The project staff will continue to add objects and related archival materials to the database until the collection is fully represented. </p>
 <div class="row">
<a href="<?php echo html_escape(url('items')); ?>"  style="float:right;margin:20px;"><?php echo __('View All Items'); ?></a></div>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>