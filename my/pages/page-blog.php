<?php /* Template Name: page blog*/
get_header() ?>

<div id="fb-root"></div>

<script>(function (d, s, id) {
        let js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<main class="blog-bg">
    <div class="container-elastic">
            <h3 class="home-section-title"><?php the_title() ?>
                <span>&#11042;</span></h3>
            <article class="blog-post">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'paged' => $paged
                );
                $query = new WP_Query($args);

                add_filter('excerpt_length', function () {
                    return 20;
                });
                if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="blog-flex">
                        <a class="link_bloge-post" href="<?php echo get_permalink(); ?>">

                            <div class="bloge-post-img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail(array(620, 400)); ?>
                                <?php endif; ?>
                            </div>
                            <div class="bloge-post-data"><?php echo the_date(); ?></div>
                            <div class="bloge-post-text">
                                <h2><?php trim_title_chars(32, '...'); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>

                        </a>
                    </div>


                <?php endwhile; ?>
            </article>
            <div class="pagination">
                <?php
                print_r( get_next_posts_link());
                ?>
                <div class="prev-posts">
                    <?php echo get_next_posts_link('Наступна сторінка ', $query->max_num_pages); ?>
                </div>
                <div class="next-posts">
                    <?php echo get_previous_posts_link(' Попередня сторінка'); ?>
                </div>
            </div>


            <?php wp_reset_postdata(); ?>

            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
        <?php get_sidebar(); ?>
    </div>
</main>


<?php get_footer() ?>
