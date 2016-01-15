<?php
/**
 * Template Name: Kachel Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'kachel'); ?>
<?php endwhile; ?>
