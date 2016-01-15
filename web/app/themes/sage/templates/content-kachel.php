<?php
/**
 * Created by PhpStorm.
 * User: uahnn
 * Date: 28.11.15
 * Time: 12:52
 */
?>
<?php the_content(); ?>
<div class="row">
    <?php while (have_rows('kachel-repeater', get_the_ID())): the_row();
        $img = get_sub_field('kachel-img');
        $title = get_sub_field('kachel-title');
        $text = get_sub_field('kachel-text');
        ?>
        <div class="kachel col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <img class="img-responsive kachel-imgd" src="<?= $img ?>" />
            <h6 class="kachel-title"><?= $title ?></h6>
            <div class="kachel-text"><?= $text ?: "" ?></div>
        </div>
    <?php endwhile; ?>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
