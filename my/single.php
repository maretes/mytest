<?php get_header(); ?>
<main class="blog-bg">

    <?php if (have_posts()) : ?>

    <?php while (have_posts()) :
    the_post(); ?>

    <div class="container-elastic">


        <div class="single-blog-post">
            <h1 class="blog-open-title"><?php the_title(); ?></h1>
            <!--thumbnail-->
            <?php /*if (has_post_thumbnail()) {
                the_post_thumbnail(array(1000, 650));
            } */?>
            <!--thumbnail-->
            <div class="autor-data-blog">
                <span class="author-blog info">Автор: <?php the_author(); ?></span>
                <span class="shlesh_blg">/</span>
                <span class="date-blog info"><?php the_date(); ?></span>
            </div>
            <?php the_content(); ?>
            <?php echo do_shortcode('[ssba-buttons]'); ?>
            <div class="page-nav">
                <div class="page-nav-next">

                    <?php echo next_post_link('%link') ?>
                </div>
                <div class="page-nav-back">

                    <?php echo previous_post_link('%link') ?>
                </div>
            </div>
        </div>
        <?php endwhile; // End of the loop.
        ?>

        <?php else :

            get_template_part('template-parts/content', 'none');

        endif; ?>


    </div><!-- .container-elastic -->
</main>
<?php get_footer() ?>


