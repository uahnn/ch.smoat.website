<header>
    <nav class="navbar navbar-default navbar-fixed-top banner" role="banner">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
                    <img alt="SMOAT" src="<?= esc_url(home_url('/')); ?>app/themes/sage/dist/images/smoat_new_trans.png"/>
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-primary-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
                endif;
                ?>
            </div>
        </div>
    </nav>
</header>
