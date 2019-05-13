<?php
/**
 * Template Name: services
 */
?>
<?php get_header() ?>
    <main class="services">
        <div class="container-elastic">
            <h1 class="home-section-title"><?php the_title() ?><span>&#11042;</span></h1>
            <div class="services_block">

                <?php $service = new WP_Query(array('post_type' => 'services')); ?>
                <?php if ($service->have_posts()) : ?>
                    <?php while ($service->have_posts()) :
                        $service->the_post();
                        ?>
                        <div id='<?php
                        if (get_locale() == 'uk_UA') {
                         print_r('redmo');
                        } elseif (get_locale() == 'en_US') {

                          print_r('redmoen');
                        } ?>'
                             class="services_block_flex ">
                            <div class="services_block_flex-img">
                                <img src="<?php the_post_thumbnail_url() ?>">
                            </div>
                            <div>
                                <div class=" <?php
                                if (get_locale() == 'uk_UA') {
                                    print_r('redmo');
                                } elseif (get_locale() == 'en_US') {

                                    print_r('redmoen');
                                } ?> services_block_flex-text">
                                    <h2><?php the_title() ?></h2>
                                    <?php the_content() ?>
                                </div>
                                <div class="awd">
                                    <?php
                                    $fblink = get_field('link_doc_fb');
                                    if ($fblink): ?>
                                    <a href="<?php echo $fblink; ?>" target="_blank">
                                        <?php endif; ?>
                                        <?php
                                        $freport = get_field('document_services');
                                        if ($freport): ?>
                                        <a href="<?php print_r($freport); ?>" target="_blank">
                                            <?php endif; ?>
                                            <?php
                                            $image = get_field('icon_services');
                                            if( !empty($image) ): ?>
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            <?php endif; ?>
                                        </a>
                                    </a>
                                </div>
                            </div>

                        </div>


                    <?php endwhile; ?>
                <?php else :
                    get_template_part('template-parts/content', 'none');
                endif; ?>
            </div>
        </div>
    </main>
<?php get_footer();
