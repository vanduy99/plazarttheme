<?php
    /*
     * Template Name: Template portfolio
     */
?>
<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php
// OPTION FOR PAGE PORFOLIO
$plazarttheme_catid          =  get_post_meta( get_the_ID(), 'plazarttheme_portfolio_catid', true ) ;
$plazarttheme_filter         =  get_post_meta( get_the_ID() , 'plazarttheme_porfolio_filter', true ) ;
$plazarttheme_filter_status  =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_filter_status', true ) ;
$plazarttheme_limit          =  get_post_meta( get_the_ID(), 'plazarttheme_portfolio_limit', true ) ;
$plazarttheme_orderby        =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_orderby', true ) ;
$plazarttheme_order          =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_order', true ) ;
$plazarttheme_paging         =  get_post_meta( get_the_ID(), 'plazarttheme_paging', true ) ;
$plazarttheme_sidebar        =  get_post_meta( get_the_ID(), 'plazarttheme_porfolio_sidebar', true ) ;


$plazarttheme_class_sidebar = 'col-md-12';
if($plazarttheme_sidebar == 1){
    $plazarttheme_class_sidebar = 'col-md-9';
}
?>
<div class="tzPortfolio_Container">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($plazarttheme_class_sidebar);?>">
                <?php if ( $plazarttheme_filter_status == 'show' ) : ?>
                    <div class="tzFilter" data-option-key="filter">
                        <button data-option-value="*" class="selected">Show all</button>
                        <?php
                            $plazarttheme_terms = get_terms($plazarttheme_filter) ;
                            if ( isset ( $plazarttheme_terms ) && $plazarttheme_terms != false && $plazarttheme_terms != '' ):
                                foreach ( $plazarttheme_terms as $plazarttheme_term ) :
                        ?>
                                    <button class="TZHide" id="<?php echo 'plazarttheme-'.$plazarttheme_term -> slug; ?>" data-option-value=".<?php echo 'plazarttheme-'.$plazarttheme_term -> slug; ?>"><?php echo $plazarttheme_term -> name; ?></button>
                        <?php
                                endforeach ;
                            endif ;
                        ?>
                    </div><!--end class tzFilter-->
                <?php endif; ?>
                <div class="tzPortfolio">
                    <?php
                        if ( get_query_var('paged') ):
                            $plazarttheme_paged = get_query_var('paged');
                        else:
                            $plazarttheme_paged = 1;
                        endif;
                        if( isset($plazarttheme_catid) && !empty($plazarttheme_catid)){
                            $plazarttheme_cat = array();
                            if(is_array($plazarttheme_catid)){
                                sort($plazarttheme_catid);
                                $plazarttheme_count_cat  =   count($plazarttheme_catid);

                                for($plazarttheme_i=0; $plazarttheme_i<$plazarttheme_count_cat; $plazarttheme_i++){
                                    $plazarttheme_cat[]  =   (int)$plazarttheme_catid[$plazarttheme_i];
                                }

                            }else{
                                $plazarttheme_cat[]    = (int)$plazarttheme_catid;
                            }
                            $plazarttheme_args = array(
                                'post_type'         =>  'portfolio',
                                'paged'             =>  $plazarttheme_paged,
                                'posts_per_page'    =>  $plazarttheme_limit,
                                'orderby'           =>  $plazarttheme_orderby,
                                'order'             =>  $plazarttheme_order,
                                'tax_query'         =>  array(
                                    array(
                                        'taxonomy'  =>  'portfolio-category',
                                        'filed'     =>  'id',
                                        'terms'      =>  $plazarttheme_cat
                                    )
                                )
                            );
                        }else{
                            $args = array(
                                'post_type'         =>  'portfolio',
                                'paged'             =>  $plazarttheme_paged,
                                'posts_per_page'    =>  $plazarttheme_limit,
                                'orderby'           =>  $plazarttheme_orderby,
                                'order'             =>  $plazarttheme_order,
                            );
                        }

                        $plazarttheme_query = new WP_Query( $plazarttheme_args ) ;
                        if ( $plazarttheme_query -> have_posts() ): while ( $plazarttheme_query -> have_posts() ): $plazarttheme_query -> the_post() ;
                            $plazarttheme_terms_post = get_the_terms( $post -> ID, $plazarttheme_filter );
                            $plazarttheme_feature    = get_post_meta( $post -> ID, 'plazarttheme_portfolio_featured', true );
                            $plazarttheme_class_filter  = '';
                            $plazarttheme_class_feature = '';
                             if ( isset ( $plazarttheme_terms_post ) && $plazarttheme_terms_post != false && $plazarttheme_terms_post != '' ):
                                 foreach ( $plazarttheme_terms_post as $plazarttheme_term_item ):
                                     $plazarttheme_class_filter .= 'plazarttheme-'.$plazarttheme_term_item -> slug .' ';
                                 endforeach;
                             endif;
                            if ( $plazarttheme_feature == 'yes' ) :
                                $plazarttheme_class_feature = 'tz_feature_item';
                            endif;


                    ?>
                        <div id="post-<?php the_ID() ; ?>" <?php post_class("portfolio-item $plazarttheme_class_filter $plazarttheme_class_feature") ; ?>>
                            <div class="tz-inner">
                                <div class="item-img">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php if ( get_the_terms( $post->ID, 'portfolio-tags' ) !=  false ): ?>
                                    <div class="tztag">
                                        TAG: <?php the_terms( $post -> ID, 'portfolio-tags','',',' ) ; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="tzcat">
                                    CATEGORY : <?php the_terms( $post -> ID, 'portfolio-category','',',' ) ; ?>
                                </div>
                                <div class="description">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                            endwhile; // end while have posts
                        endif;  // end if have posts
                        wp_reset_postdata();
                    ?>
                </div><!--end class tzPortfolio-->
                <?php
                $plazarttheme_load_class = '';

                if ( $plazarttheme_paging != 'pagenavi'  ):

                    $plazarttheme_load_class = "class ='not_pagenavi'" ;
                endif;

                $plazarttheme_ajaxbutton_class = '';
                if ( $plazarttheme_paging != 'ajaxbutton'  ):
                    $plazarttheme_ajaxbutton_class = "class ='not_pagenavi'" ;
                endif;
                ?>
                    <div id="tz_append" <?php echo $plazarttheme_ajaxbutton_class ?>>
                        <a href="#tz_append">Load More Projects</a>
                    </div><!--end id tz_append-->
                <div id="loadajax" <?php echo $plazarttheme_load_class ?>>
                    <?php plazarttheme_custom_paging_nav($plazarttheme_query->max_num_pages);  ?>
                </div>
            </div><!--end class col-md-9-->
            <?php
            if($plazarttheme_sidebar == 1){
                get_sidebar();
            }
            ?>
        </div>
    </div><!--end class container-->
</div>
<?php get_footer(); ?>