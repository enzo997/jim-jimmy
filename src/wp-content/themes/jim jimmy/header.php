<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <script>
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.4/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.4/build/pannellum.js"></script>
</head>
<body <?php body_class(); ?> >
<div id="page">
    <header class="header-mobile" id="header">
        <div class="container">
            <div class="header-mobile--content-header">
                <div class="header-mobile--content-header--cont-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_header_and_footer','option')['logo_white']?get_field('logo_header_and_footer','option')['logo_white']['url']:DF_IMAGE. '/logo-white.png';?>" alt="logo-white" />
                    </a>
                </div>
                <div class="header-mobile--content-header--cont-logo-1">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_header_and_footer','option')['logo_pink']?get_field('logo_header_and_footer','option')['logo_pink']['url']:DF_IMAGE. '/logo-pink.png';?>" alt="logo-pink" />
                    </a>
                </div>
                <div class="header-mobile--content-header--cont-menu-bar">
                    <div class="btn-bar">
                        <div class="icon-menu"></div>
                        <div class="close-icon-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="header-desktop" id="header">
        <div class="header-desktop--content-header">
            <div class="header-desktop--content-header--col-left">
                <div class="header-desktop--content-header--col-left--cont-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_header_and_footer','option')['logo_white']?get_field('logo_header_and_footer','option')['logo_white']['url']:DF_IMAGE. '/logo-white.png';?>" alt="logo-white" />
                    </a>
                </div>
                <div class="header-desktop--content-header--col-left--cont-logo-1">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('logo_header_and_footer','option')['logo_pink']?get_field('logo_header_and_footer','option')['logo_pink']['url']:DF_IMAGE. '/logo-pink.png';?>" alt="logo-pink" />
                    </a>
                </div>
            </div>
            <div class="header-desktop--content-header--col-right">
                <div class="header-desktop--content-header--col-right--main-nav-menu">
                    <?php 
                        wp_nav_menu( 
                            array( 
                                'theme_location' => 'main_menu', 
                                'menu_class' => 'main-nav-menu'
                            ) 
                        );
                    ?>
                    <div class="footer--copyright">
                        <div class="footer--copyright--col-right">
                            <div class="footer--col-right--cont-social-network">
                                <ul class="footer-mobile">
                                <?php
                                    $icon_social_network = get_field('icon_social_network','option');
                                        foreach($icon_social_network as $i=> $item):
                                            $i++;
                                            $content_group = $item['content_group'];
                                            $icon_image = $content_group['icon_image']?$content_group['icon_image']['url']:DF_IMAGE. '/noimage.png';
                                            $link_url = $content_group['link_url']?$content_group['link_url']:"Null";
                                            ?>
                                                <li><a href="<?php echo $link_url; ?>" target="_brank"><img src="<?php echo $icon_image; ?>" alt="icon-social-network" /></a></li>
                                            <?php
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                            <div class="footer--copyright--col-left"> © 2019 by JimJimmy Ltd</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


