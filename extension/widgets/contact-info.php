<?php
 /* *
  * widgets contact info
  **/
  class plazarttheme_contact_info extends WP_Widget{

      /*function construct*/
      public function __construct() {
          parent::__construct(
            'contact_info',esc_html__('Contact info','plazarttheme'),
             array('description'=>esc_html__('Display Contact info', 'plazarttheme'))
          );
      }

      /**
       * font-end widgets
      */
      public function widget($args, $instance) {
          extract($args);
          $plazarttheme_title = apply_filters('widget_title', $instance['title']);

          echo balanceTags($plazarttheme_before_widget);

          if($plazarttheme_title) {
              echo balanceTags($plazarttheme_before_title.$plazarttheme_title.$plazarttheme_after_title);
          }

      ?>
          <div class="tzwidget-contact">
            <?php  if($instance['address']): ?>
              <address> <?php  echo $instance['address'];  ?> </address>
            <?php  endif; ?>
            <?php  if($instance['phone']): ?>
              <span> <?php echo $instance['phone'] ?> </span>
            <?php  endif; ?>
            <?php if($instance['mobile']): ?>
              <span> <?php echo $instance['mobile']; ?> </span>
            <?php endif; ?>
            <?php if($instance['fax']): ?>
                <span><?php echo $instance['fax']; ?></span>
            <?php endif; ?>
            <?php if($instance['email']): ?>
                <span class="wemail" href="#"><?php echo $instance['email']; ?></span>
            <?php endif; ?>
            <?php if($instance['website']): ?>
                <span><?php echo $instance['website']; ?></span>
            <?php endif; ?>
            <span class="tzwidget-social">
                <?php if ( $instance['facebook'] ) : ?>
                    <a href="<?php echo $instance['facebook']; ?>"><i class="fa fa-facebook"></i></a>
                <?php endif; ?>
                <?php if ( $instance['twitter'] ): ?>
                    <a href="<?php echo $instance['twitter']; ?>"><i class="fa fa-twitter"></i></a>
                <?php endif; ?>
                <?php if ( $instance['google'] ) : ?>
                    <a href="<?php echo $instance['google'] ; ?>"><i class="fa fa-google-plus"></i></a>
                <?php endif; ?>
            </span>
          </div>
      <?php
          echo balanceTags($plazarttheme_after_widget);
      }

      /**
       * Back-end widgets form
      */
      public function form($instance){
          $instance =   wp_parse_args($instance,array(
              'title'   =>  'Contact info',
              'address' =>  '',
              'phone'   =>  '',
              'mobile'  =>  '',
              'fax'     =>  '',
              'email'   =>  '',
              'website' =>  '',
              'facebook' =>  '',
              'twitter' =>  '',
              'google' =>  ''
          ));
          ?>
          <p>
              <label for=<?php echo $this->get_field_id('title'); ?>><?php esc_html_e('Title:','plazarttheme') ; ?></label>
              <input type="text" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('address'); ?>"><?php esc_html_e('Address:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('address') ?>" class="widefat" name="<?php echo $this->get_field_name('address') ?>" value="<?php echo $instance['address']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('phone'); ?>"><?php esc_html_e( 'Phone:','plazarttheme' ); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('phone'); ?>" class="widefat" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('mobile'); ?>"><?php esc_html_e( 'Mobile:','plazarttheme' ); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('mobile'); ?>" class="widefat" name="<?php echo $this->get_field_name('mobile'); ?>" value="<?php echo $instance['mobile']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('fax'); ?>"><?php esc_html_e('Fax:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" class="widefat" value="<?php echo $instance['fax']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('email') ?>"><?php esc_html_e('Email:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" class="widefat" value="<?php echo $instance['email']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" class="widefat" value="<?php echo $instance['facebook']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Twitter:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" class="widefat" value="<?php echo $instance['twitter']; ?>" />
          </p>
          <p>
              <label for="<?php echo $this->get_field_id('google'); ?>"><?php esc_html_e('Google:','plazarttheme'); ?></label>
              <input type="text" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" class="widefat" value="<?php echo $instance['google']; ?>" />
          </p>
      <?php
      }

      /**
      * function update widget
      */
      public function update( $new_instance, $old_instance ) {
          $instance             =   $old_instance;
          $instance['title']    =   $new_instance['title'];
          $instance['address']  =   $new_instance['address'];
          $instance['phone']    =   $new_instance['phone'];
          $instance['mobile']   =   $new_instance['mobile'];
          $instance['fax']      =   $new_instance['fax'];
          $instance['email']    =   $new_instance['email'];
          $instance['website']  =   $new_instance['website'];
          $instance['facebook'] =   $new_instance['facebook'];
          $instance['twitter']  =   $new_instance['twitter'];
          $instance['google']   =   $new_instance['google'];
          return $instance;
      }
  }
  function register_plazarttheme_contact_info(){
      register_widget('plazarttheme_contact_info');
  }
  add_action('widgets_init','register_plazarttheme_contact_info');
?>