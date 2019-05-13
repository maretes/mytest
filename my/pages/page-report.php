<?php /** Template Name: Report */ ?>
<?php get_header(); ?>

<main id="reports">
    <div class="container-elastic">
        <?php $report = new WP_Query(array('post_type' => 'report')); ?>
        <h1 class="home-section-title report-section-title"><?php the_title() ?>
            <span>&#11042;</span></h1>
        <span class="reports__content">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();

                    }
                }
                ?>
        </span>
        <ul class="page-reports" id="home-reports">
            <?php if ($report->have_posts()) : ?>
                <?php while ($report->have_posts()) :
                    $report->the_post();
                    ?>
                    <li class="lightbox report">
                        <?php
                        $fblink = get_field('facebook_link');
                        if ($fblink): ?>
                        <a href="<?php echo $fblink; ?>" target="_blank">
                            <?php endif; ?>
                            <?php
                            $freport = get_field('file_report');
                            if ($freport): ?>
                            <a href="<?php print_r($freport); ?>" target="_blank">
                                <?php endif; ?>
                                <div class="report-img">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                                </div>
                                <span></span>
                                <div class="rollover">
                                    <div class="rollover-container">
                                        <h2> <?php trim_title_chars(40, '...'); ?> </h2>
<!--                                        <p>--><?php //trim_excerpt_chars(130, '...'); ?><!--</p>-->
                                    </div>
                                </div>
                            </a>
                    </li>
                <?php endwhile; ?>
            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>
</main>
<?php get_footer() ?>
