<?php get_header(); ?>

<?php
while (have_posts()) :
    the_post(); ?>

    <main class="blog-bg">
        <div class="container-elastic">
            <div class="single-post">
                <h1 class="post-title"><?php the_title(); ?></h1>
<!--thumbnail-->
                <?php /*if (has_post_thumbnail()) {
                    */?><!--
                    <p>
                        <?php /*the_post_thumbnail();*/?>
                    </p>
                    --><?php
/*                } */?>
<!--thumbnail-->
                <?php the_content(); ?>
                <?php echo do_shortcode('[ssba-buttons]'); ?>
            </div>
        </div>

    </main>
<?php endwhile; // End of the loop
?>

<?php get_footer(); ?>