<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <base href="<?php bloginfo('url'); ?>">

    <?php wp_head(); ?>
</head>
<?php echo '<body class="' . join(' ', get_body_class()) . '">' . PHP_EOL; ?>
<header>
    <div class="navbar navbar-default navbar-fixed-top">
		<?php
		// Fix menu overlap
		if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>';
		?>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name') ?></a></div>
            <?php
            wp_nav_menu( array(
                    'menu'              => 'top-menu',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'navbar-collapse collapse',
                    'container_id'      => 'navbar',
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
            );
            ?>
        </div>
    </div>
    </nav>
</header>
<div id="content" class="site-content">
