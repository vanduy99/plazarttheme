<?php

/*
 * Display posts
 * Widgets display posts by category
 */

class plazarttheme_RecentPost extends WP_Widget{

    /* function construct*/
    function __construct() {
       parent::__construct(
           'tz_view_post',esc_html__('plazarttheme: Recent Post', 'plazarttheme'),
           array('description' => esc_html__(' Display post ', 'plazarttheme'))
       );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);

            $plazarttheme_postargs = array(
                'post_type'         => 'post',
                'posts_per_page'    => $instance['tzlmpost'],
                'ignore_sticky_posts' => 1,
                'post__not_in' => get_option( 'sticky_posts' )
            );


        ?>
            <aside class="tz-recent-w">
                <h3 class="module-title"><span><?php echo $instance['title']; ?></span></h3>
                <ul class="tz-recent-post">
                <?php

                    $plazarttheme_query_post = new WP_Query($plazarttheme_postargs);
                    if( $plazarttheme_query_post->have_posts() ):
                        while( $plazarttheme_query_post->have_posts() ): $plazarttheme_query_post->the_post();
                ?>
                    <li>
                        <?php
                            if ( has_post_thumbnail() ):
                                the_post_thumbnail('large');
                            else:?>
                                <img src="<?php echo esc_attr(''.get_template_directory_uri().'/images/recent.jpg'); ?>" alt="<?php esc_attr_e('no image','plazarttheme'); ?>" />
                            <?php endif;
                        ?>
                        <div class="tz-recent-content">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <span><?php echo get_the_date(); ?></span>
                        </div>
                    </li>
                  <?php
                            endwhile; // end while(have_posts)
                        endif;  // end if(have_posts)
                    wp_reset_postdata();
                    ?>
                </ul>
            </aside>
        <?php
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'             => 'Title',
            'tzlmpost'       =>  5
        ) );

    ?>
         <p>
             <label for="<?php echo $this->get_field_id('title'); ?>">
                 <?php esc_html_e('Title','plazarttheme'); ?>
             </label>
             <br>
             <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php echo $instance['title']; ?>" >
         </p>

         <p>
             <label for="<?php echo $this->get_field_id('tzlmpost'); ?>">
                <?php esc_html_e('Limit post','plazarttheme'); ?>
             </label>
             <input type="text" class="widefat"  id="<?php echo $this->get_field_id('tzlmpost'); ?>" name="<?php echo $this->get_field_name('tzlmpost'); ?>" value="<?php echo $instance['tzlmpost']; ?>" >
         </p>

       <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['tzlmpost']       =   $new_instance['tzlmpost'];
        return $instance;
    }
}
add_action('widgets_init',create_function('','return register_widget("plazarttheme_RecentPost");'));

?>