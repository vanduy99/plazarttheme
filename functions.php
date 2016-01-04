<?php

/*
 *constants
 */

define('THEME_PREFIX', 'plazarttheme');
define('THEME_NAME', 'plazarttheme');
define('TEXT_DOMAIN', 'plazarttheme');
define('THEME_VERSION', '1.0');
define('get_template_directory_uri()', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());
define( 'CSS_PATH', get_template_directory_uri().'/css/' );
define( 'JS_PATH', get_template_directory_uri().'/js/');
define( 'IMG_PATH', get_template_directory_uri().'/images/');
define( 'FONT_PATH', get_template_directory_uri().'/fonts/');


load_theme_textdomain( 'plazarttheme', get_template_directory() . '/languages' );



/**
 * Required: include plugin theme scripts
 */
require SERVER_PATH . '/extension/theme-scripts.php';

/**
 * Required: include plugin theme sidebars
 */
require SERVER_PATH . '/extension/theme-functions.php';

/*
 * Required: include plugin theme scripts
 */
require SERVER_PATH . '/extension/tz-process-option.php';


/*
 * Required: widget contact info
 */
require SERVER_PATH . '/extension/widgets/contact-info.php';

/*
 * Required: widget view post
 */
require SERVER_PATH . '/extension/widgets/recent-post.php';


if ( class_exists('OT_Loader') ):
    /*
     * Required: Theme option
     */
    require SERVER_PATH . '/extension/ot-support/theme-options.php';

    /*
     * Required: Metabox
     */
    require SERVER_PATH . '/extension/ot-support/add-meta-boxes.php';
endif;


/*
 *  method add global javascript variable THEME_PREFIX to admin_head
 */
function plazarttheme_theme_prefix_addto_header() {
    ?>
    <script type="text/javascript">
        var themeprefix = '<?php echo esc_js('plazarttheme') ?>';
    </script>
<?php
}
add_action('admin_head', 'plazarttheme_theme_prefix_addto_header');
add_action('wp_head', 'plazarttheme_theme_prefix_addto_header');


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 900;


/*
 * Adds JavaScript to pages with the comment form to support
 * sites with threaded comments (when in use).
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );




if ( ! function_exists( 'plazarttheme_paging_nav' ) ) {
    function plazarttheme_paging_nav() {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }

        $plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $plazarttheme_query_args   = array();
        $plazarttheme_url_parts    = explode( '?', $plazarttheme_pagenum_link );

        if ( isset( $plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $plazarttheme_url_parts[1], $plazarttheme_query_args );
        }

        $plazarttheme_pagenum_link = remove_query_arg( array_keys( $plazarttheme_query_args ), $plazarttheme_pagenum_link );
        $plazarttheme_pagenum_link = trailingslashit( $plazarttheme_pagenum_link ) . '%_%';

        $plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $plazarttheme_links = paginate_links( array(
            'base'     => $plazarttheme_pagenum_link,
            'format'   => $plazarttheme_format,
            'total'    => $wp_query->max_num_pages,
            'current'  => $plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'plazarttheme' ),
        ) );

        if ( $plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo $plazarttheme_links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
        <?php
        endif;
    }
}



if ( ! function_exists( 'plazarttheme_custom_paging_nav' ) ) {
    function plazarttheme_custom_paging_nav($plazarttheme_query_total) {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $plazarttheme_query_total < 2 ) {
            return;
        }

        $plazarttheme_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $plazarttheme_pagenum_link = html_entity_decode( get_pagenum_link() );
        $plazarttheme_query_args   = array();
        $plazarttheme_url_parts    = explode( '?', $plazarttheme_pagenum_link );

        if ( isset( $plazarttheme_url_parts[1] ) ) {
            wp_parse_str( $plazarttheme_url_parts[1], $plazarttheme_query_args );
        }

        $plazarttheme_pagenum_link = remove_query_arg( array_keys( $plazarttheme_query_args ), $plazarttheme_pagenum_link );
        $plazarttheme_pagenum_link = trailingslashit( $plazarttheme_pagenum_link ) . '%_%';

        $plazarttheme_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $plazarttheme_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $plazarttheme_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $plazarttheme_links = paginate_links( array(
            'base'     => $plazarttheme_pagenum_link,
            'format'   => $plazarttheme_format,
            'total'    => $plazarttheme_query_total,
            'current'  => $plazarttheme_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $plazarttheme_query_args ),
            'prev_text' => esc_html__( 'Previous', 'plazarttheme' ),
            'next_text' => esc_html__( 'Next', 'plazarttheme' ),
        ) );

        if ( $plazarttheme_links ) :

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="tzpagination2 loop-pagination">
                    <?php echo $plazarttheme_links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
        <?php
        endif;
    }
}




/*
 * Method add ot_get_option
 */

if(!is_admin()):

    if ( ! function_exists( 'ot_get_option' ) ) {
        function ot_get_option( $plazarttheme_option_id, $plazarttheme_default = '' ) {
            /* get the saved options */
            $plazarttheme_options = get_option( 'option_tree' );
            /* look for the saved value */
            if ( isset( $plazarttheme_options[$plazarttheme_option_id] ) && '' != $plazarttheme_options[$plazarttheme_option_id] ) {
                return $plazarttheme_options[$plazarttheme_option_id];
            }
            return $plazarttheme_default;
        }
    }

endif;



if ( function_exists( 'ot_get_option' ) ) {
    /*
     * Google Analytics
     */
    $plazarttheme_googAnlytice   =   ot_get_option('plazarttheme_google_analytics');
    if (isset($plazarttheme_googAnlytice) && $plazarttheme_googAnlytice != '') {
        function plazarttheme_add_google_analytics_code() {
            $plazarttheme_googAnlytice   =   ot_get_option('plazarttheme_google_analytics');
            echo '<script type="text/javascript">';
            echo esc_attr($plazarttheme_googAnlytice);
            echo '</script>';
        }
        add_action('wp_footer', 'plazarttheme_add_google_analytics_code');
    }

    /*
     *  Method show or hide toolbar admin
     */
    $showtootbaradmin     =   ot_get_option('plazarttheme_TzGlobalOptionAdmin',1);
    if(isset($showtootbaradmin) && $showtootbaradmin==0){
        add_filter('show_admin_bar', '__return_false');
    }

    /*
     * Method limit excerpt
     */
    function limitexcerpt($lenght){
        return ot_get_option('plazarttheme_porlimitexcerpt',50) ;
    }
    add_filter('excerpt_length','limitexcerpt');
}


/*
 * ADD GOOGLE FONT
 */
if ( ! function_exists( 'plazarttheme_slug_fonts_url' ) ) {
    function plazarttheme_slug_fonts_url($plazarttheme_name,$plazarttheme_fontweight) {
        $plazarttheme_fonts_url = '';

        if ( 'off' !== _x( 'on', $plazarttheme_name.' font: on or off', 'liona' ) ) {
            $plazarttheme_font_families = array();
            $plazarttheme_font_families[] = $plazarttheme_name.':'.$plazarttheme_fontweight;

            $plazarttheme_query_args = array(
                'family' => urlencode( implode( '|', $plazarttheme_font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $plazarttheme_fonts_url = add_query_arg( $plazarttheme_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $plazarttheme_fonts_url );
    }
}


/*   Creat File Css   */
if ( ! function_exists( 'plazarttheme_CustomCss' ) ) {
    function plazarttheme_CustomCss($data='', $prefix='css') {
        $tem_path = get_template_directory();
        $folder_path=$tem_path."/css/custom";
        if (!is_dir($folder_path)) {
            wp_mkdir_p($folder_path);
            @chmod($folder_path, 0755);
        }
        $filename_css = $prefix.'-' . substr(md5($data), 0, 15) . '.css';
        $filename ='custom_options_css.css';
        $filepart = $folder_path . '/' . $filename;
        $filepart_css = $folder_path . '/' . $filename_css;

        $filetime = file_exists($filepart_css);
        if($filetime==false){

            foreach (glob(''.$folder_path.'/*.css') as $filenames) {
                if($filenames != $filepart_css){
//                unlink($filenames);
                }
            }
            global $wp_filesystem;
// Initialize the WP filesystem, no more using 'file-put-contents' function
            if (empty($wp_filesystem)) {
                require_once (ABSPATH . '/wp-admin/includes/file.php');
                WP_Filesystem();
            }

            if(!$wp_filesystem->put_contents( $filepart, $data, 0644) ) {
                return esc_html__('Failed to create css file', 'plazarttheme');
            }

            if(!$wp_filesystem->put_contents( $filepart_css, $data, 0644) ) {
                return esc_html__('Failed to create css file', 'plazarttheme');
            }
        }
    }
}

/*  Post Type   */
function plazarttheme_vafpress_setup() {
    add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );
}
add_action( 'after_setup_theme', 'plazarttheme_vafpress_setup' );

/*method activie plugin*/
require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'plazarttheme_register_required_plugins' );
function plazarttheme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plazarttheme_plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'     				=> 'Plazart', // The plugin name
            'slug'     				=> 'tz-plazart', // The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/tz-plazart.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> 'Vafpress Post Formats UI', // The plugin name
            'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
            'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => 'OptionTree',
            'slug'      => 'option-tree',
            'required'  => true,
        ),
        array(
            'name'      => 'Max Mega Menu',
            'slug'      => 'megamenu',
            'required'  => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $plazarttheme_config = array(
        'domain'       		=> 'plazarttheme',         	// Text domain - likely want to be the same as your theme.
        'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
        'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
        'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
        'menu'         		=> 'install-required-plugins', 	// Menu slug
        'has_notices'      	=> true,                       	// Show admin notices or not
        'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
        'message' 			=> '',							// Message to output right before the plugins table
        'strings'      		=> array(
            'page_title'                       			=> esc_html__( 'Install Required Plugins', 'plazarttheme' ),
            'menu_title'                       			=> esc_html__( 'Install Plugins', 'plazarttheme' ),
            'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'plazarttheme' ),
            'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'plazarttheme' ),
            'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'plazarttheme' ),
            'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'plazarttheme' ),
            'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'plazarttheme' ),
            'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'plazarttheme' ),
            'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'plazarttheme' ),
            'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'plazarttheme' ),
            'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'plazarttheme' ),
            'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'plazarttheme' ),
            'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'plazarttheme' ),
            'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'plazarttheme' ),
            'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'plazarttheme' ),
            'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'plazarttheme' ),
            'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'plazarttheme' ),
            'nag_type'									=> 'updated'
        )
    );

    tgmpa( $plazarttheme_plugins, $plazarttheme_config );

}
?>