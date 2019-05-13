<?php
/** This is navigation. You can jump to section with ctrl+f */
/**  1. Navs registration */
/**      1.1 Register header menu */
/**      1.2 Register sidebar  */
/**  2. Styles and scripts registration  */
/**      2.1 Main style.css  */
/**      2.2 Font Awesome  */
/**      2.3 Google Fonts */
/**      2.4 jQuery  */
/**      2.5 Accordion  */
/**      2.6 Fancybox */
/**  3. customize excerpt */
/**  4. Post thumbnail support */
/**  5. Theme customizer declaration */
/**  6. Social icons function */
/**  7. Post type registration  */
/** */


/** 1. Navs registration */
/** 1.1 Register header menu */
register_nav_menus(array(
    'header' => esc_html__('Header-menu', 'promolod'),
    'header-2' => esc_html__('Header-2-menu', 'promolod')
));

/**  1.2 Register sidebar*/
add_action('widgets_init', 'promolod_widgets_init');
function promolod_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'promolod'),
        'id' => 'sidebar',
        'description' => 'Sidebar 1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Map', 'promolod'),
        'id' => 'sidebar_1',
        'description' => 'Sidebar for Map on Home page',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

/**  2. Styles and scripts registration  */
function promolod_scripts()
{
    /* 2.1 Main style.css  */
    wp_enqueue_style('promolod-style', get_stylesheet_uri());
    /* 2.2 Font Awesome  */
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');


    /* 2.3 Google Fonts */
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700');
    wp_enqueue_style('Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,300italic,300');

    /* 2.4 jQuery  */
    wp_deregister_script('jquery');
    /*wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');*/
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js',array(),time(),true);
    wp_enqueue_script('jquery');
    /* 2.5 Accordion  */
    //wp_enqueue_script('promolod-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(),
    //'20151215', true);
    wp_enqueue_script('slick_slider', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), time(), true);
    wp_enqueue_script('promolod-accordion', get_template_directory_uri() . '/js/script.js', array(), time(), true);
    wp_enqueue_script('readmore', get_template_directory_uri() . '/js/readmore.js', array(), time(), true);
    wp_enqueue_script('readmore_inz', get_template_directory_uri() . '/js/readmore_inz.js', array(), time(), true);

    /* 2.6 Fancybox */
    //wp_enqueue_script('promolod-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array(),
    // '20151215', true);

    /* Style Fancybox */
    /*wp_enqueue_style('slick_slider_style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js'); */


}
add_action('wp_enqueue_scripts', 'promolod_scripts');
//----------------------урезаем тайтл
function trim_title_chars($count, $after)
{
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title, 0, $count);
    else $after = '';
    echo $title . $after;
}

function trim_excerpt_chars_en()
{
    $excerptt = get_the_content();
    $excerptt = strip_tags($excerptt);
    $excerptt = substr($excerptt, 0, 150);
    $excerptt = rtrim($excerptt, "!,.-");
    $excerptt = substr($excerptt, 0, strrpos($excerptt, ' '));
    echo $excerptt."… ";



}
function trim_excerpt_chars_ua()
{
    $excerptt = get_the_content();
    $excerptt = strip_tags($excerptt);
    $excerptt = substr($excerptt, 0, 250);
    $excerptt = rtrim($excerptt, "!,.-");
    $excerptt = substr($excerptt, 0, strrpos($excerptt, ' '));
    echo $excerptt."… ";

}

/** 3. customize excerpt */
function promolod_excerpt_length()
{
    return 25;
}

add_filter('excerpt_length', 'promolod_excerpt_length');
add_filter('excerpt_more', function ($more) {
    return '';
});


/**  4. Post thumbnail support */
add_theme_support('post-thumbnails');

function promolod_setup()
{

    /*Enable support for Post Formats. */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ));
}





/**
 * Customizer additions.
   5. Theme customizer declaration
 * 6. Social icons function */
require get_template_directory() . '/inc/customizer.php';


/** * 7. Post type registration  */
require get_template_directory() . '/inc/post-type-registrations.php';

/** * 8. Meta-box registration  */
require get_template_directory() . '/inc/meta-box.php';



add_filter( 'page_template', function ( $template )
{
    $page = get_queried_object();

    $alternative_template = locate_template( "pages/page-{$page->post_name}.php" );
    if (  $alternative_template )
        return $template = $alternative_template;
    return $template;
});


function custom_excerpt_length() {
    return 35;
}

add_filter('excerpt_length', 'custom_excerpt_length');
add_filter('excerpt_more', function ($more) {
    return '...';
});




// Creating the widget for Map Events
class map_events extends WP_Widget {
    function __construct() {
        parent::__construct(
            'map_events', __('Map Events', 'promolod'),
            array('description' => __('Sample widget for Map Events', 'promolod'),)
        );
    }


    public function widget($args, $instance) {
        echo do_shortcode(' [wpsl]');
        }


    public function form($instance) { ?>
        <p> This is the widget for Map Events </p>
    <?php }
}


function map_events_load_widget() {
    register_widget('map_events');
}
add_action('widgets_init', 'map_events_load_widget');

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}