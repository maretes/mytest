<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://promolod.pp.ua# fb: http://ogp.me/ns/fb# article: http://promolod.pp.ua/article#">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <title> <?php echo get_bloginfo('name');?></title>
    <?php wp_head(); ?>
</head>
<div id="content" class="site-content">
    <div id="#header-lift-anchor"></div>

    <?php if (is_home() || is_front_page()) : ?>


        <header class="site-header" id='sticker'>
            <div class="container-elastic">
                <div class="logo-header">
                    <img src="<?php echo get_theme_mod('image', ''); ?>"/>
                </div>
                <?php my_social_media_icons(); ?>
                <span class="lightbox">
                     <button id="close_modal"
                             class="support-button support-button-pulse"> <?php
                         if (get_locale() == 'uk_UA') {
                             _e('Підтримати', 'promolod');
                         } elseif (get_locale() == 'en_US') {
                             _e('Donate', 'promolod');
                         } ?></button>
                </span>
                <ul class="language-position"><?php pll_the_languages(array('show_flags' => 1, 'show_names' => 1)); ?></ul>

                <div class="button_container" id="toggle">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>

                <?php
                if (get_locale() == 'uk_UA') {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header',
                            'menu_id' => 'head-menu',
                            'container' => 'nav',
                            'menu' => __('Menu(1)')
                        ));
                } elseif (get_locale() == 'en_US') {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header',
                            'menu_id' => 'head-menu-en',
                            'container' => 'nav',
                            'menu' => __('Menu(1)')
                        ));

                } ?>
            </div>

        </header>
        <?php
        if (get_locale() == 'uk_UA') {?>
            <div class="modal-overlay">
                <div class="modal">
                    <a class="close-modal">
                        <i class="fa fa-close"></i>
                    </a>
                    <div class="support-button__modal__content">
                        <?php
                        $my_postid = 95;//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $title = $content_post->post_title;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo '<p class="support-button__modal__title">' . $title . '</p>';
                        echo $content; ?>
                    </div>

                </div>
            </div>
        <?php }
        elseif (get_locale() == 'en_US') { ?>
            <div class="modal-overlay">
                <div class="modal">
                    <a class="close-modal">
                        <i class="fa fa-close"></i>
                    </a>
                    <div class="support-button__modal__content">
                        <?php
                        $my_postid = 1330;//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $title = $content_post->post_title;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo '<p class="support-button__modal__title">' . $title . '</p>';
                        echo $content; ?>
                    </div>

                </div>
            </div>

        <?php } ?>
    <?php
    else : ?>
        <header class="site-header" id='sticker'>
            <div class="container-elastic">
                <div class="logo-header">
                    <a href="
                    <?php
                    if (get_locale() == 'uk_UA') {
                        echo get_site_url();
                    } elseif (get_locale() == 'en_US') {

                        echo get_site_url();
                        print_r('/en');
                    } ?>"><img
                                src="<?php echo get_theme_mod('image', ''); ?>"/></a>
                </div>
                <?php my_social_media_icons(); ?>
                <span class="lightbox">
                    <button id="close_modal"
                            class="support-button support-button-pulse"> <?php
                        if (get_locale() == 'uk_UA') {
                            _e('Підтримати', 'promolod');
                        } elseif (get_locale() == 'en_US') {
                            _e('Donate', 'promolod');
                        } ?></button>
                </span>

                <ul class="language-position"><?php pll_the_languages(array('show_flags' => 1, 'show_names' => 1)); ?></ul>
                <div class="button_container" id="toggle">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>

                <?php
                if (get_locale() == 'uk_UA') {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-2',
                            'menu_id' => 'head-menu',
                            'container' => 'nav',
                            'menu' => __('Menu(2)')
                        ));
                } elseif (get_locale() == 'en_US') {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-2',
                            'menu_id' => 'head-menu-en',
                            'container' => 'nav',
                            'menu' => __('Menu(2)')
                        ));
                } ?>
            </div>
        </header>
        <?php
        if (get_locale() == 'uk_UA') {?>
            <div class="modal-overlay">
                <div class="modal">
                    <a class="close-modal">
                        <i class="fa fa-close"></i>
                    </a>
                    <div class="support-button__modal__content">
                        <?php
                        $my_postid = 95;//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $title = $content_post->post_title;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo '<p class="support-button__modal__title">' . $title . '</p>';
                        echo $content; ?>
                    </div>

                </div>
            </div>
        <?php }
        elseif (get_locale() == 'en_US') { ?>
            <div class="modal-overlay">
                <div class="modal">
                    <a class="close-modal">
                        <i class="fa fa-close"></i>
                    </a>
                    <div class="support-button__modal__content">
                        <?php
                        $my_postid = 1330;//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $title = $content_post->post_title;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo '<p class="support-button__modal__title">' . $title . '</p>';
                        echo $content; ?>
                    </div>

                </div>
            </div>

        <?php } ?>
    <?php endif; ?>



