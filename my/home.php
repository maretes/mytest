<?php
/**
 * Template Name: Test Homepage
 */
?>

<?php get_header() ?>

<!--home content -->

<main class="front-page">
    <a href="#header-lift-anchor" class="go-top"></a>
    <!--get projects-->
    <section class="front-page__hero-section overlay">
        <?php
        $banner_image = get_theme_mod('banner_image_header', '');
        if (!empty($banner_image)) : ?>
            <style>
                .front-page__hero-section::before {
                    background-image: url("<?php print_r( $banner_image)?>");
                }
            </style>
        <?php endif; ?>
        <div class="container-elastic">
            <h1 class="front-page__hero-section__title">
                <?php echo get_the_title(); ?>
            </h1>
            <div class="front-page__hero-section__content-container">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        //
                        // Post Content here
                        the_content();
                        //
                    } // end while
                } // end if
                ?>
                <?php  my_social_media_icons();?>
            </div>
        </div>
    </section>
    <section class="front-page__hero-section__mission__wrapper">
        <h2>
            <?php echo get_field('homepage_mission_title'); ?>
        </h2>
        <p>
            <?php echo get_field('homepage_mission'); ?>
        </p>
    </section>
    <section class="front-page__work-directions">
        <h2 class="front-page__valuables-section__title">
            <?php echo get_field('homepage_work-directions_title'); ?>
        </h2>
        <ul class="container-elastic">
            <?php
            $args = array('post_type' => 'work_directions', 'posts_per_page' => 3);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <li class="front-page__work-directions__item__wrapper">
                    <div class="front-page__work-directions__image__wrapper">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="
                        <?php
                        $thumb_id = get_post_thumbnail_id(get_the_ID());
                        $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
                        ?>">
                    </div>
                    <h2 class="front-page__work-directions__item__title">
                        <?php echo the_title(); ?>
                    </h2>
                    <p class="front-page__work-directions__item__content">
                        <?php echo get_the_content(); ?>
                    </p>
                </li>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    </section>

    <section class="front-page__valuables-section">
        <h2 class="front-page__valuables-section__title">
            <?php echo get_field('homepage_valuables_title'); ?>
        </h2>
        <ul class="container-elastic front-page__valuables-section__container">
            <?php
            $args = array('post_type' => 'valuables', 'posts_per_page' => 6);
            $loop = new WP_Query($args);
            $number_of_valuable = 0;
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <li class="front-page__valuables-section__item__wrapper
                <?php
                /*add class for first post*/
                if ($number_of_valuable == 0) {
                    echo ' front-page__valuables-section__item__content__show';
                    $number_of_valuable++;
                }
                ?>
                ">
                    <div class="front-page__valuables-section__image__wrapper">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="
                        <?php
                        $thumb_id = get_post_thumbnail_id(get_the_ID());
                        $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
                        ?>">
                    </div>
                    <h2>
                        <?php echo the_title(); ?>
                    </h2>
                    <p class="front-page__valuables-section__item__content-wrapper">
                        <?php echo get_the_content(); ?>
                    </p>
                </li>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    </section>

    <section class="front-page__team-section">
        <h2 class="front-page__valuables-section__title">
            <?php echo get_field('homepage_team_title'); ?>
        </h2>
        <ul class="container-elastic front-page__team-section__wrapper">
            <?php
            $args = array('post_type' => 'team');
            $loop = new WP_Query($args);
            $number_of_valuable = 0;
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <li class="front-page__team-section__item__wrapper">
                    <div class="front-page__team-section__item__image__wrapper">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="
                        <?php
                        $thumb_id = get_post_thumbnail_id(get_the_ID());
                        $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
                        ?>">
                    </div>
                    <div class="front-page__team-section__item__text__wrapper">
                        <h2 class="front-page__team-section__item__title">
                            <?php echo the_title(); ?>
                            <?php if (get_field('team_facebook')): ?>
                                <a href="
                            <?php echo get_field('team_facebook'); ?> " class="teammate__facebook" target="_blank">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            <?php endif; ?>
                        </h2>
                        <p class="front-page__team-section__item__content">
                            <?php echo get_the_content(); ?>
                        </p>
                        <?php if (get_field('team_email')): ?>
                            <a href="mailto:<?php echo get_field('team_email'); ?>">
                                <?php echo get_field('team_email'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    </section>
    <section class="front-page__partners-section">
        <h2 class="front-page__valuables-section__title front-page__partners-section__title">
            <?php echo get_field('homepage_partners_title'); ?>
        </h2>
        <div class="front-page__partners-section__slider__wrapper">
            <!-- --------------------------------SLIDER BUTTONS---------------------- -->
            <div class="container-elastic front-page__partners-section__slider__buttons__wrapper">
                <button class="front-page__partners-section__slider__buttons front-page__partners-section__slider__prev">
                    <i class="fa fa-caret-left"></i>
                </button>
                <button class="front-page__partners-section__slider__buttons front-page__partners-section__slider__next">
                    <i class="fa fa-caret-right"></i>
                </button>
            </div>
            <!-- --------------------------------/SLIDER BUTTONS---------------------- -->
            <div class="container-elastic front-page__partners-section__slider">
                <?php
                $args = array('post_type' => 'partners', 'posts_per_page' => 40);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="front-page__partners-section__item__wrapper">
                        <?php $link_partners = get_post_meta(get_the_ID(), 'partner', TRUE); ?>
                        <a href="<?php echo $link_partners; ?>" target="_blank">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php
                            $thumb_id = get_post_thumbnail_id(get_the_ID());
                            $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
                            ?>">
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <!--ANCHOR FOR NAV-->
        <div id="our-partners"></div>
    </section>
    <?php if( get_field('front_page_video') ): ?>
        <section class="front-page__video-section">
            <div class="container-elastic">
                <?php echo get_field('front_page_video');?>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer() ?>
