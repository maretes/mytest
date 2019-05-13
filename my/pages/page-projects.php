<?php
/**
 * Template Name: projects
 */
?>

<?php get_header(); ?>
    <!--get projects-->
    <main id="projects">
        <div class="container-elastic">
            <?php $project = new WP_Query(array('post_type' => 'projects')); ?>
            <h1 class="home-section-title"><?php the_title() ?>
                <span>&#11042;</span></h1>
            <ul class="page-projects" id="home-projects">
                <?php if ($project->have_posts()) : ?>
                    <?php while ($project->have_posts()) :
                        $project->the_post();
                        ?>
                        <li class="lightbox project">
                            <?php
                            $field = get_field_object('project_status_ua');
                            $value = $field['value'];
                            $label = $field['choices'][$value];
                            ?>
                            <div class="project-proces proces-color-<?php echo $value; ?>">
                                <h3><?php echo $label; ?></h3>
                            </div>
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <div class="project-img">
                                    <?php the_post_thumbnail('medium_large');?>
                                    <!--<img src="<?php /*the_post_thumbnail_url() */?>" alt="">-->
                                </div>
                                <span></span>
                                <div class="rollover">
                                    <div class="rollover-container">
                                        <h2> <?php trim_title_chars(35, '...'); ?> </h2>
                                        <p>
                                            <?php
                                            if (get_locale() == 'uk_UA') {
                                                trim_excerpt_chars_ua();
                                            } elseif (get_locale() == 'en_US') {
                                                trim_excerpt_chars_en();
                                            } ?>
                                        </p>
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
    </main> <!-- #projects -->
<?php get_footer(); ?>