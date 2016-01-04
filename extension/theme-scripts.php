<?php
add_action('init', 'plazarttheme_register_theme_scripts');
function plazarttheme_register_theme_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php') {

        if (is_admin()) {
            add_action('admin_enqueue_scripts', 'plazarttheme_register_back_end_scripts');
        }else{
            add_action('wp_enqueue_scripts', 'plazarttheme_register_front_end_styles');
            add_action('wp_enqueue_scripts', 'plazarttheme_register_front_end_scripts');
        }
    }
}

//Register Back-End script
function plazarttheme_register_back_end_scripts(){



    wp_enqueue_style('plazarttheme-admin-styles', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
    wp_enqueue_style('plazarttheme-option', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');


    wp_register_script('plazarttheme-portfolio-meta-boxes', get_template_directory_uri() . '/extension/assets/js/portfolio-meta-boxes.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-meta-boxes');

    wp_register_script('plazarttheme-portfolio-theme-option', get_template_directory_uri() . '/extension/assets/js/portfolio-theme-option.js', array(), false, $in_footer=true );
    wp_enqueue_script('plazarttheme-portfolio-theme-option');
}

//Register Front-End Styles
function plazarttheme_register_front_end_styles()
{
    wp_enqueue_style('plazarttheme-bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css', false );
//    wp_enqueue_style( 'plazarttheme-open-sans', plazarttheme_slug_fonts_url('Open Sans','300,400,600,700,400italic'), array(), null );
    wp_enqueue_style('plazarttheme-isotope', get_template_directory_uri().'/css/isotope.css', false );
    wp_enqueue_style('plazarttheme-custom_options_css', get_template_directory_uri().'/css/custom/custom_options_css.css', false );
    wp_enqueue_style('plazarttheme-style', get_template_directory_uri() . '/style.css', false );

    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() ){
        wp_enqueue_style('plazarttheme-flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
    }
}

//Register Front-End Scripts
function plazarttheme_register_front_end_scripts()
{

    wp_enqueue_script( 'plazarttheme-bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, $in_footer=true );

    if( is_single() || is_tag() || is_category() || is_archive() || is_author() || is_search() ){
        wp_deregister_script('plazarttheme-jsflexslider');
        wp_register_script('plazarttheme-jsflexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-jsflexslider');

        wp_deregister_script('plazarttheme-single');
        wp_register_script('plazarttheme-single', get_template_directory_uri().'/js/single.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-single');
    }

    wp_enqueue_script( 'plazarttheme-custom', get_template_directory_uri().'/js/custom.js', array('jquery'), false, $in_footer=true );



    if ( is_page_template('template-portfolio.php') ):

        global $post;
        $plazarttheme_desktop            =  get_post_meta( $post -> ID, 'plazarttheme_desktop_column', true );
        $plazarttheme_tabletportrait     =  get_post_meta( $post -> ID, 'plazarttheme_tabletportrait_column', true );
        $plazarttheme_mobilelandscape    =  get_post_meta( $post -> ID, 'plazarttheme_mobilelandscape_column', true );
        $plazarttheme_mobileportrait     =  get_post_meta( $post -> ID, 'plazarttheme_mobileportrait_column', true );
        $plazarttheme_filter_status      =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_filter_status', true ) ;
        $plazarttheme_paging             =  get_post_meta( $post -> ID, 'plazarttheme_paging', true ) ;
        $plazarttheme_image              =  get_post_meta( $post -> ID, 'plazarttheme_porfolio_loadding', true) ;
        if ( isset ( $plazarttheme_image ) && $plazarttheme_image == '' ):
            $plazarttheme_image =  get_template_directory_uri().'/images/ajax-loader.gif' ;
        endif;

        wp_deregister_script('plazarttheme-jsisotope');
        wp_register_script('plazarttheme-jsisotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-jsisotope');

        if ( $plazarttheme_paging != 'pagenavi' ) :
            wp_deregister_script('plazarttheme-infinitescroll');
            wp_register_script('plazarttheme-infinitescroll', get_template_directory_uri().'/js/jquery.infinitescroll.min.min.js', array(), false,$in_footer=true);
            wp_enqueue_script('plazarttheme-infinitescroll');
        endif;

        wp_deregister_script('plazarttheme-resize');
        wp_register_script('plazarttheme-resize', get_template_directory_uri().'/js/resize.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-resize');

        wp_deregister_script('plazarttheme-portfolio');
        wp_register_script('plazarttheme-portfolio', get_template_directory_uri().'/js/portfolio.js', array(), false,$in_footer=true);
        wp_enqueue_script('plazarttheme-portfolio');

        $plazarttheme_variables_portfolio = array(
            'desktop'         =>    $plazarttheme_desktop,
            'tabletportrait'  =>    $plazarttheme_tabletportrait,
            'mobilelandscape' =>    $plazarttheme_mobilelandscape,
            'mobileportrait'  =>    $plazarttheme_mobileportrait,
            'filter_status'   =>    $plazarttheme_filter_status,
            'paging'          =>    $plazarttheme_paging,
            'image'           =>    $plazarttheme_image
        );
        wp_localize_script( 'portfolio', 'variables_portfolio', $plazarttheme_variables_portfolio ) ;

    endif;

}

?>