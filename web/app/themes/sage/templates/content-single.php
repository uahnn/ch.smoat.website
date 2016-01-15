<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php get_template_part('templates/entry-meta'); ?>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <div class="post-author">
            <?php $authorImage = get_field('benutzerfoto', 'user_' . get_the_author_meta('ID'));
            if ($authorImage) : ?>
                <div class="author-image">
                    <img class="img-responsive" src="<?php echo $authorImage["sizes"]["thumbnail"]; ?>"
                         alt="<?php echo get_the_author(); ?>">
                </div>
            <?php endif; ?>
            <div class="author-info">
                <div class="author-name"><?php echo get_the_author(); ?></div>
                <div class="author-description"><?php the_author_meta('description'); ?></div>
            </div>
        </div>
        <div class="fb-comments" data-width="100%" data-href="<?php the_permalink(); ?>" data-numposts="5"
             data-order-by="reverse_time"></div>
        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
    </article>
<?php endwhile; ?>