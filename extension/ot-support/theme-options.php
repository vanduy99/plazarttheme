<?php


update_option( 'ot_hide_cleanup', 1 );
/*
 * Initialize the options before anything else.
 */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

add_action('admin_init','plazarttheme_theme_options',1);

/*
 * Build the custom settings & update OptionTree.
*/

function plazarttheme_theme_options()
{

    /**
     * Get a copy of the saved settings array.
     */
    $plazarttheme_saved_settings = get_option('option_tree_settings', array());

    // Pattern
    $plazarttheme_patterns = array();
    if ($plazarttheme_dir = opendir(get_template_directory() . '/images/patterns/')) {
        while (false !== ($plazarttheme_file = readdir($plazarttheme_dir))) {
            if ($plazarttheme_file != '..' && $plazarttheme_file != '.') {
                $plazarttheme_patterns[] = array(
                    'value' => trim($plazarttheme_file),
                    'label' => 'Click on pattern to preview',
                    'src'   => get_template_directory_uri() . '/images/patterns/' . $plazarttheme_file, 40, 40, true
                );
            }
        }
        // Close directory handle
        closedir($plazarttheme_dir);
    }
    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $plazarttheme_custom_settings = array(
        'contextual_help' => array(
            'content' => array(
                array(
                    'id'      => 'general_help',
                    'title'   => 'General',
                    'content' => '<p>Help content goes here!</p>'
                ),
            ),
            'sidebar' => '<p>Sidebar content goes here!</p>'
        ),
        'sections'        => array(
            array(
                'id'    => 'logo',
                'title' => esc_html__('Logo & Favicon', 'plazarttheme'),
            ),
            array(
                'id'    => 'footeroption',
                'title' => esc_html__('Footer Options', 'plazarttheme'),
            ),
            array(
                'id'    => 'copyright',
                'title' => esc_html__('Copyright', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TzGlobalOption',
                'title' =>  esc_html__('General Options','plazarttheme'),
            ),
            array(
                'id'    => '404',
                'title' => esc_html__('404 Page', 'plazarttheme'),
            ),
            array(
                'id'    =>  'google_analytics',
                'title' =>  esc_html__('Google Analytics', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TzSyle',
                'title' =>  esc_html__('Font Option', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TZBody',
                'title' =>  esc_html__('Body Style', 'plazarttheme'),
            ),

            array(
                'id'    =>  'TzFontHeader',
                'title' =>  esc_html__('Header Style', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TzFontMenu',
                'title' =>  esc_html__('Menu Style', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TzFontCustom',
                'title' =>  esc_html__('Custom Style', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TzCustomCss',
                'title' =>  esc_html__('Custom CSS', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TZBackground',
                'title' =>  esc_html__('Theme style', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TZBlog',
                'title' =>  esc_html__('Blog Option', 'plazarttheme'),
            ),
            array(
                'id'    =>  'TZSingle',
                'title' =>  esc_html__('Single Option','plazarttheme'),
            ),
        ),

        'settings'        => array(

            array(
                'id'        => 'plazarttheme_logotype',
                'label'     => esc_html__('Logo Type', 'plazarttheme'),
                'desc'      => esc_html__('select type for logo text or image', 'plazarttheme'),
                'std'       => '1',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Logo image', 'plazarttheme'),
                    ),
                    array(
                        'value' => 0,
                        'label' => esc_html__('Logo text', 'plazarttheme'),
                    )
                ),
            ),
            array(
                'id'        => 'plazarttheme_logoText',
                'label'     => esc_html__('Logo Text', 'plazarttheme'),
                'desc'      => esc_html__('logo name for your website', 'plazarttheme'),
                'std'       => '',
                'type'      => 'text',
                'section'   => 'logo',
            ),

            array(
                'id'        =>  'plazarttheme_logoTextcolor',
                'label'     => esc_html__('Color logo', 'plazarttheme'),
                'desc'      => esc_html__('logo text color', 'plazarttheme'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'plazarttheme_logo',
                'label'     => esc_html__('Upload Logo', 'plazarttheme'),
                'desc'      => esc_html__('Logo using for home page and page shop', 'plazarttheme'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'plazarttheme_favicon_onoff',
                'label'     => esc_html__('Enable Favicon', 'plazarttheme'),
                'desc'      => esc_html__('Show or hide Favicon', 'plazarttheme'),
                'std'       => 'no',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'plazarttheme'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'plazarttheme'),
                        'src'   => ''
                    )
                ),
            ),

            array(
                'id'        => 'plazarttheme_favicon',
                'label'     => esc_html__('Upload Favicon Icon', 'plazarttheme'),
                'desc'      => esc_html__('Please choose an image  to use for favicon.', 'plazarttheme'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),

            /* ==========================================
            *  footer option
            ==========================================*/
            array(
                'id'        =>  'plazartthemefooter_description',
                'label'     =>  esc_html__('Footer Widgets', 'plazarttheme'),
                'desc'      =>  esc_html__('Config footer', 'plazarttheme'),
                'std'       =>  '',
                'type'      => 'textblock-titled',
                'section'   => 'footeroption',
                'rows'      => '5',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'plazartthemefooter_image',
                'label'     => '',
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'footeroption',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'footer1',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' =>  'footer2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' =>  'footer3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' =>  'footer4',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label'     =>  esc_html__('Number of Footer Columns.', 'plazarttheme'),
                'id'        =>  'plazarttheme_footer_columns',
                'desc'      =>  esc_html__('Select the number of columns to display in the footer.', 'plazarttheme'),
                'section'   =>  'footeroption',
                'std'       =>  '4',
                'type'      =>  'select',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3'
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2'
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1'
                    ),
                )
            ),
            array(
                'id'      =>    'plazartthemefooterwidth1',
                'label'   =>    esc_html__('Footer width 1', 'plazarttheme'),
                'desc'    =>    esc_html__('config width for footer', 'plazarttheme'),
                'section' =>    'footeroption',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'plazartthemefooterwidth2',
                'label'   =>    esc_html__('Footer width 2', 'plazarttheme'),
                'desc'    =>    esc_html__('config width for footer', 'plazarttheme'),
                'section' =>    'footeroption',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'plazartthemefooterwidth3',
                'label'   =>    esc_html__('Footer width 3', 'plazarttheme'),
                'desc'    =>    esc_html__('config width for footer', 'plazarttheme'),
                'section' =>    'footeroption',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'plazartthemefooterwidth4',
                'label'   =>    esc_html__('Footer width 4', 'plazarttheme'),
                'desc'    =>    esc_html__('config width for footer', 'plazarttheme'),
                'section' =>    'footeroption',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),

            // Copyright Settings
            array(
                'id'        => 'plazarttheme_copyright',
                'label'     => esc_html__('Copyright','plazarttheme'),
                'desc'      => '',
                'std'       => 'Copyright &copy; Templaza',
                'type'      => 'textarea',
                'section'   => 'copyright',
                'rows'      => '15',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // General options

            array(
                'label'     => 'Limit excerpt',
                'id'        => 'plazarttheme_porlimitexcerpt',
                'type'      => esc_html__('text','plazarttheme'),
                'desc'      => esc_html__('Limit text for excerpt','plazarttheme'),
                'std'       => '',
                'section'   => 'TzGlobalOption',
            ),

            array(
                'id'        =>  'plazarttheme_TzGlobalOptionLoading',
                'label'     =>  esc_html__('Show loading','plazarttheme'),
                'desc'      =>  esc_html__('Show or hide loading','plazarttheme'),
                'std'       =>  '1',
                'type'      =>  'select',
                'section'   =>  'TzGlobalOption',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide','plazarttheme'),
                    ),

                ),
            ),
            array(
                'id'        => 'plazarttheme_TzGlobalOptionUploadLoading',
                'label'     => 'Upload images loading',
                'desc'      => 'Upload <a target="_blank" href="http://preloaders.net/">images</a> .gif',
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'TzGlobalOption',
            ),

            // 404

            array(
                'id'        => 'plazarttheme_404_bk',
                'label'     => __('404 Background', 'plazarttheme'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'upload',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'plazarttheme_404_title',
                'label'     => __('404 Title', 'plazarttheme'),
                'desc'      => '',
                'std'       => __('404 ERROR!', 'plazarttheme'),
                'type'      => 'text',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'plazarttheme_404_content',
                'label'     => esc_html__('404 Content', 'plazarttheme'),
                'desc'      => '',
                'std'       => 'Look like something went wrong! The page you were looking for is not here. Go Home or try a search.',
                'type'      => 'textarea-simple',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),



            // Google Analytics
            array(
                'id'        => 'plazarttheme_google_analytics',
                'label'     => esc_html__('Google Analytics', 'plazarttheme'),
                'desc'      => 'Place the code you get from google here. This should be something like:<br /><br /><code>   // Google analytics <br /> var _gaq = _gaq || []; <br />_gaq.push(["_setAccount", "UA-XXXXXXX-XX"]); <br /> ...</code>',
                'std'       => '',
                'type'      => 'textarea-simple',
                'section'   => 'google_analytics',
                'rows'      => '4',
            ),


            // style option
            array(
                'id' =>  'plazarttheme_TzSyle',
                'label'     => esc_html__('StyleConfig', 'plazarttheme'),
                'desc'      => '<p>'.esc_html__('Config for body style, header style, menu style, custom style, background', 'plazarttheme').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TzSyle',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // font style body -----------------------------------------------------------------------
            array(
                'id'        =>  'plazarttheme_TZFontType',
                'label'     =>  esc_html__('Font Type', 'plazarttheme'),
                'desc'      =>  esc_html__('option font type', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TZBody',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  'btn-group',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'plazarttheme'),
                    ),


                ),
            ),

            //  font
            array(
                'id'       =>   'plazarttheme_TzFontDefault',
                'label'    =>   esc_html__('Select Standard Font', 'plazarttheme'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'plazarttheme'),
                'type'     =>   'select',
                'section'  =>   'TZBody',
                'class'    =>   'TzFontStylet',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'plazarttheme'),
                    ),
                )
            ),

            // body font family
            array(
                'id'    =>  'plazarttheme_TzFontFaminy',
                'label' =>  esc_html__('Font Family', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody',
            ),

            // body font weight
            array(
                'id'    =>  'plazarttheme_TzFontFami',
                'label' =>  esc_html__('Font Weight', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody'
            ),

            array(
                'id'        =>  'plazarttheme_TzBodySelecter',
                'label'     =>  esc_html__('Body Selectors', 'plazarttheme'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#description', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TZBody',
                'rows'      =>  '10',
            ),
            // color code

            array(
                'id'        =>  'plazarttheme_TzBodyColor',
                'label'     => esc_html__('Color code', 'plazarttheme'),
                'desc'      => esc_html__('Color for text', 'plazarttheme'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'TZBody',
            ),
            // end font style body


            // font style Header -----------------------------------------------------------------------
            array(
                'id'        =>  'plazarttheme_TZFontTypeHead',
                'label'     =>  esc_html__('Font Type', 'plazarttheme'),
                'desc'      =>  esc_html__('option font type', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'plazarttheme'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'plazarttheme_TzFontHeadDefault',
                'label'    =>   esc_html__('Select Standard Font', 'plazarttheme'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'plazarttheme'),
                'type'     =>   'select',
                'section'  =>   'TzFontHeader',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'plazarttheme'),
                    )
                )
            ),


            // header font famyli
            array(
                'id'    =>  'plazarttheme_TzFontFaminyHead',
                'label' =>  esc_html__('Font Family', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader',
            ),
            // header font weight
            array(
                'id'    =>  'plazarttheme_TzFontHeadGoodurl',
                'label' =>  esc_html__('Font Weight', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader'
            ),
            array(
                'id'        =>  'plazarttheme_TzHeadSelecter',
                'label'     =>  esc_html__('Header Selecter', 'plazarttheme'),
                'desc'      =>  esc_html__('You can specify a selector for font used in the document Header Eg: div#description', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '10',
            ),

            array(
                'id'        =>  'plazarttheme_TzHeaderFontColor',
                'label'     => esc_html__('Color code', 'plazarttheme'),
                'desc'      => esc_html__('Color for text', 'plazarttheme'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'TzFontHeader',
            ),
            // end font header

            // font  Menu -----------------------------------------------------------------------

            array(
                'id'        =>  'plazarttheme_TZFontTypeMenu',
                'label'     =>  esc_html__('Font Type', 'plazarttheme'),
                'desc'      =>  esc_html__('Option font type', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'plazarttheme'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'plazarttheme_TzFontMenuDefault',
                'label'    =>   esc_html__('Select Standard Font', 'plazarttheme'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'plazarttheme'),
                'type'     =>   'select',
                'section'  =>   'TzFontMenu',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'plazarttheme'),
                    )
                )
            ),


            // Menu Font Family
            array(
                'id'    =>  'plazarttheme_TzFontFaminyMenu',
                'label' =>  esc_html__('Font Family', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu',
            ),

            // Menu font weight
            array(
                'id'    =>  'plazarttheme_TzFontMenuGoodurl',
                'label' =>  esc_html__('Font Weight', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu'
            ),

            array(
                'id'        =>  'plazarttheme_TzMenuSelecter',
                'label'     =>  esc_html__('Menu Selectors', 'plazarttheme'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#menu', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '10',
            ),

            array(
                'id'    =>  'plazarttheme_TzMenuFontColor',
                'label'     => esc_html__('Color code', 'plazarttheme'),
                'desc'      => esc_html__('Color for text', 'plazarttheme'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'TzFontMenu',
            ),

            /*---end menu font--*/
            // font style custom -----------------------------------------------------------------------
            array(
                'id'        =>  'plazarttheme_TZFontTypeCustom',
                'label'     =>  esc_html__('Font Type', 'plazarttheme'),
                'desc'      =>  esc_html__('option font type', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'plazarttheme'),
                    ),

                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'plazarttheme_TzFontCustomDefault',
                'label'    =>   esc_html__('Select Standard Font', 'plazarttheme'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'plazarttheme'),
                'type'     =>   'select',
                'section'  =>   'TzFontCustom',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'plazarttheme'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'plazarttheme'),
                    )
                )
            ),

            // body font
            array(
                'id'       =>  'plazarttheme_TzFontFaminyCustom',
                'label'    =>  esc_html__('Font Family', 'plazarttheme'),
                'desc'     =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'plazarttheme'),
                'std'      =>  '',
                'type'     =>  'text',
                'section'  => 'TzFontCustom',
            ),


            // google url
            array(
                'id'    =>  'plazarttheme_TzFontCustomGoodurl',
                'label' =>  esc_html__('Font Weight', 'plazarttheme'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'plazarttheme'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontCustom'
            ),
            array(
                'id'        =>  'plazarttheme_TzCustomSelecter',
                'label'     =>  esc_html__('Custom Selecter', 'plazarttheme'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#custom', 'plazarttheme'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '10',
            ),

            array(
                'id'        =>  'plazarttheme_TzCustomFontColor',
                'label'     =>  esc_html__('Color code', 'plazarttheme'),
                'desc'      =>  esc_html__('Color for text', 'plazarttheme'),
                'std'       =>  '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'TzFontCustom',
            ),
            // end font custom

            /*-------custom css-------*/
            array(
                 'id'        =>  'plazarttheme_TzCustomCss',
                 'label'     =>  esc_html__('Code CSS', 'plazarttheme'),
                 'desc'      =>  esc_html__('Paste your CSS code, do not include any tags or HTML in thie field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', 'plazarttheme'),
                 'std'       =>  '',
                 'type'      => 'textarea-simple',
                 'section'   => 'TzCustomCss',
            ),
            // end custom css

            /* Background */

            array(
                'id'        => 'cbackground',
                'label'     => 'Background',
                'desc'      => '<p>'.esc_html__('Default background for Post, Page, Portfolio, Category, Archive, Seach page.', 'plazarttheme').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'plazarttheme_background_type',
                'label'     => esc_html__('Background Type', 'plazarttheme'),
                'desc'      => esc_html__('You can choose the background you want between our pre-provided pattern and your custom image.', 'plazarttheme'),
                'std'       => 'none',
                'type'      => 'select',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'default',
                        'label' => esc_html__('Default', 'plazarttheme'),
                    ),
                    array(
                        'value' => 'pattern',
                        'label' => esc_html__('Pattern', 'plazarttheme'),
                    ),
                    array(
                        'value' => 'single_image',
                        'label' => esc_html__('Single image', 'plazarttheme'),
                    ),
                ),
            ),
            array(
                'id'        =>  'plazarttheme_TZBackgroundColor',
                'label'     => esc_html__('Color code', 'plazarttheme'),
                'desc'      => esc_html__('Background color code', 'plazarttheme'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'TZBackground',
            ),
            array(
                'id'        => 'plazarttheme_background_pattern',
                'label'     => esc_html__('Choose Pattern', 'plazarttheme'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'radio-image',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'background_pattern',
                'choices'   => $plazarttheme_patterns
            ),
            array(
                'id'        => 'plazarttheme_background_single_image',
                'label'     => esc_html__('Single Image Background', 'plazarttheme'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'TZBackground',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            /* End Background */


            /*=================================
            * Option Blog and Tag and Serach and Author
            ===================================*/

            array(
                'id'        => 'TZBlog',
                'label'     => esc_html__('Option', 'plazarttheme'),
                'desc'      => '<p>'.esc_html__('Option for page blog and tag and search and author','plazarttheme').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TZBlog',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // Show or hide Date
            array(
                'id'        => 'plazarttheme_TZBlogSidebar',
                'label'     => esc_html__('Show Sidebar', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show sidebar left', 'plazarttheme'),
                    )
                ),

            ),

            // Show or hide Date
            array(
                'id'        => 'plazarttheme_TZBlogDate',
                'label'     => esc_html__('Show Date', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),

            // Show or hide Category
            array(
                'id'        => 'plazarttheme_TZBlogCategory',
                'label'     => esc_html__('Show Category', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),

            // Show or hide tag
            array(
                'id'        => 'plazarttheme_TZBlogTag',
                'label'     => esc_html__('Show Tag', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),

            // Show or hide Comments
            array(
                'id'        => 'plazarttheme_TZBlogComments',
                'label'     => esc_html__('Show Comments', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),

            // Show or hide image
            array(
                'id'        => 'plazarttheme_TZBlogthumbnail',
                'label'     => __('Show thumbnail', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),

            // Show or hide excerpt
            array(
                'id'        => 'plazarttheme_TZBlogexcerpt',
                'label'     => esc_html__('Show Excerpt', 'plazarttheme'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                ),

            ),


            //===== Single page
            array(
                'id'        => 'TZSingle',
                'label'     => esc_html__('Option', 'plazarttheme'),
                'desc'      => '<p>'.esc_html__('Option for page single post.','plazarttheme').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TZSingle',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'plazarttheme_singlesidebar',
                'label'     => esc_html__('Show or hide sidebar', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  0,
                'type'      =>  'select',
                'section'   => 'TZSingle',
                'choices'   =>  array(
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    )
                )
            ),
            array(
                'id'        =>'plazarttheme_tzshowdate',
                'label'     =>esc_html__('Show Date?','plazarttheme'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),
            array(
                'id'        =>'plazarttheme_tzshowcategory',
                'label'     =>esc_html__('Show Category?','plazarttheme'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),
            array(
                'id'        =>'plazarttheme_tzshowtag',
                'label'     =>esc_html__('Show Tag?','plazarttheme'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),
            array(
                'id'        =>'plazarttheme_tzshowshare',
                'label'     =>esc_html__('Show Share?','plazarttheme'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),
            array(
                'id'        =>'plazarttheme_tzshowauthor',
                'label'     =>esc_html__('Show Author?','plazarttheme'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),
            array(
                'id'        =>  'plazarttheme_tzshowcomment',
                'label'     =>  esc_html__('Show Comment?','plazarttheme'),
                'type'      =>  'select',
                'std'       =>  '',
                'section'   =>  'TZSingle',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show','plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide','plazarttheme'),
                    ),

                )

            ),

        ) // end setting
    );

    /* allow settings to be filtered before saving */

    $plazarttheme_custom_settings = apply_filters('option_tree_settings_args', $plazarttheme_custom_settings);

    /* settings are not the same update the DB */
    if ($plazarttheme_saved_settings !== $plazarttheme_custom_settings) {
        update_option('option_tree_settings', $plazarttheme_custom_settings);
    }

}


?>
