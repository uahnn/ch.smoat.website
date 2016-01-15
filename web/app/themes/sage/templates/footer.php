<?php
$address = get_field('footer-address', 'option');
$email = get_field('footer-email', 'option');
$copyright = get_field('footer-copyright', 'option');
?>
<footer class="content-info" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                </span>
                <span class="footer-label"><?php echo $address ?: ''; ?></span>
            </div>
            <div class="col-sm-4 col-xs-12">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                </span>
                <span class="footer-label"><?php echo $email ?: ''; ?></span>
            </div>
            <div class="col-sm-4 col-xs-12 socialmedialinks">
                <ul>
                    <?php while (have_rows('footer-socialmedia-repeater', 'option')): the_row();
                        $img = get_sub_field('socialmedia-img');
                        $url = get_sub_field('socialmedia-url');
                        $linklabel = get_sub_field('socialmedia-label');
                        ?>
                        <li>
                            <a href="<?php echo $url; ?>">
                                <i class="fa fa-<?php echo $img; ?> fa-2x"></i>
                                <span><?php echo $linklabel; ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="col-xs-12 centered-text">
                <span class="text-sm"><?php echo $copyright ?: ''; ?></span>
            </div>
        </div>
    </div>
</footer>