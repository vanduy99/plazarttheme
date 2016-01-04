<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'plazarttheme_custom_meta_boxes');

/*
 * Methor add meta boxes for custom post type
 */
function plazarttheme_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */



    $plazarttheme_portfolio_meta_box =   array(
        'id'          =>  'portfolio_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'plazarttheme'),
        'desc'        =>  '',
        'pages'       => array( 'portfolio'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     =>  esc_html__('Post Type', 'plazarttheme'),
                'id'        =>  'plazarttheme_portfolio_type',
                'type'      =>  'select',
                'desc'      =>  esc_html__('Option type Post', 'plazarttheme'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('None', 'plazarttheme')
                    ),
                    array(
                        'value' => 'video',
                        'label' => esc_html__('Video', 'plazarttheme')
                    ),
                    array(
                        'value' => 'audio',
                        'label' => esc_html__('Audio', 'plazarttheme')
                    ),
                    array(
                        'value' => 'quote',
                        'label' => esc_html__('Quote', 'plazarttheme')
                    ),
                    array(
                        'value' => 'image',
                        'label' => esc_html__('Image', 'plazarttheme')
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' => esc_html__('Slideshows', 'plazarttheme')
                    )
                ),

            ),

            array(
                'label'     => esc_html__('Slideshow', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'plazarttheme_portfolio_slideshow_item',
                        'label'     => esc_html__('Image', 'plazarttheme'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(
                'label'     => esc_html__('Image', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_image',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     => esc_html__('SoundCloud ID', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the SoundCloud', 'plazarttheme'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),

            array(
                'label'     => esc_html__('Quote Content', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_Quote_content',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Quote Description', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_Quote_ds',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),

            array(
                'label'     => esc_html__('Video MP4', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_mp4',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video OGV', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_ogv',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video WEBM', 'plazarttheme'),
                'id'        => 'plazarttheme_portfolio_video_webm',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
        )
    );

    $plazarttheme_pageportfolio_meta_box =   array(
        'id'          =>  'page_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'plazarttheme'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'plazarttheme_portfolio_column',
                'label'     => esc_html__('Config Portfolio Column', 'plazarttheme'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'plazarttheme_desktop_column',
                'label'     => esc_html__('Desktop column', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '4',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                    )
                )
            ),
            array(
                'id'        =>  'plazarttheme_tabletportrait_column',
                'label'     =>  esc_html__('tablet portrait column', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'plazarttheme_mobilelandscape_column',
                'label'     =>  esc_html__('mobile landscape column', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'plazarttheme_mobileportrait_column',
                'label'     =>  esc_html__('mobile portrait column', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),

            array(
                'id'        => 'plazarttheme_portfolio_catid',
                'label'     => esc_html__('Category', 'plazarttheme'),
                'desc'      => esc_html__('Choose category portfolio', 'plazarttheme'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'portfolio-category',
                'class'     => ''
            ),
            array(
                'id'        => 'plazarttheme_portfolio_limit',
                'label'     => esc_html__('Limit portfolio', 'plazarttheme'),
                'desc'      => '',
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_orderby',
                'label'     => esc_html__('Orderby', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>  esc_html__('Date', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>  esc_html__('Title', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>  esc_html__('ID', 'plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_order',
                'label'     =>  esc_html__('Order', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>  esc_html__('Z ---> A', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>  esc_html__('A ---> Z', 'plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_paging',
                'label'     =>  esc_html__('Paging', 'plazarttheme'),
                'desc'      =>  esc_html__('choose type paging', 'plazarttheme'),
                'sdt'       =>  'ajaxscroll',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'pagenavi',
                        'label' =>  esc_html__('Default ( 1, 2, 3 ... 8, 9 , 10)', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'ajaxbutton',
                        'label' =>  esc_html__('Ajaxbutton', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'ajaxscroll',
                        'label' =>  esc_html__('Ajax scroll', 'plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_filter_status',
                'label'     =>  esc_html__('Filter Status', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'show',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide', 'plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_filter',
                'label'     =>  esc_html__('Filter Porfolio', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'portfolio-tags',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'portfolio-tags',
                        'label' =>  esc_html__('Portfolio tags', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  'portfolio-category',
                        'label' =>  esc_html__('Portfolio category', 'plazarttheme'),
                    ),
                )
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_loadding',
                'label'     => esc_html__('Image loadding', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'upload',
                'class'     =>  '',
            ),
            array(
                'id'        =>  'plazarttheme_porfolio_sidebar',
                'label'     =>  esc_html__('Sidebar Option', 'plazarttheme'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>   esc_html__('Show', 'plazarttheme'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>   esc_html__('Hide', 'plazarttheme'),
                    ),
                )
            ),
        ) // end fields
    );






    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $plazarttheme_portfolio_meta_box );


    ot_register_meta_box( $plazarttheme_pageportfolio_meta_box );



}
?>