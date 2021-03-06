<?php
/**
 * Template Name: Blog Template
 */
?>
<?php get_template_part('templates/page', 'header'); ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php query_posts(array('category_name' => 'blog')); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content'); ?>
<?php endwhile; ?>
