<?php
    /*
     * Method process option
     * # option 1: config font
     * # option 2: process config theme
    */
    if(!is_admin()):


        add_action('wp_head','plazarttheme_config_theme');

        function plazarttheme_config_theme(){
            $styles ='';
            $styles.='/**
* 1.0 - Reset
* -----------------------------------------------------------------------------
*/
';

            // logo
            $plazarttheme_colorlogo  =   ot_get_option('plazarttheme_logoTextcolor');
            if(isset($plazarttheme_colorlogo) && !empty($plazarttheme_colorlogo)){
                $styles.='.tz_logo .tz-logo-text{ color: '.$plazarttheme_colorlogo.' }';
            }

//  Font Options
            // method body font
            $plazarttheme_body_font_type         =   ot_get_option('plazarttheme_TZFontType','TzFontSquirrel');
            $plazarttheme_body_font_weight      =   ot_get_option('plazarttheme_TzFontFami','300,400,400italic,600,700');
            $plazarttheme_body_font_family        =   ot_get_option('plazarttheme_TzFontFaminy');
            $plazarttheme_body_font_selecter       =   ot_get_option('plazarttheme_TzBodySelecter');
            $plazarttheme_body_font_default      =   ot_get_option('plazarttheme_TzFontDefault','Arial');
            $plazarttheme_body_font_color    = ot_get_option('plazarttheme_TzBodyColor');


            switch($plazarttheme_body_font_type){
                case'Tzgoogle':
                    $plazarttheme_body_font = $plazarttheme_body_font_family;
                    break;
                default:
                    $plazarttheme_body_font = $plazarttheme_body_font_default;
                    break;

            }

//            if ( isset ( $plazarttheme_body_font_weight ) && $plazarttheme_body_font_weight != ""){ wp_enqueue_style( 'plazarttheme-body-font', plazarttheme_slug_fonts_url($plazarttheme_body_font_family,$plazarttheme_body_font_weight), array(), null ); }

            if(!empty($plazarttheme_body_font_selecter) && !empty($plazarttheme_body_font_selecter)){

                if(!empty($plazarttheme_body_font) && !empty($plazarttheme_body_font)) {
                    $styles.=''.esc_attr($plazarttheme_body_font_selecter).'{
                        font-family:"'.esc_attr($plazarttheme_body_font) .'" !important;}';
                }

                if(!empty($plazarttheme_body_font_color) && !empty($plazarttheme_body_font_color)) {
                    $styles.=''.esc_attr($plazarttheme_body_font_selecter).'{color:'.esc_attr($plazarttheme_body_font_color) .' !important;}';
                }

            }


            // Method header font

            $plazarttheme_header_font_type       =   ot_get_option('plazarttheme_TZFontTypeHead','TzFontDefault');               // type font google or defaul
            $plazarttheme_header_font_weight        =   ot_get_option('plazarttheme_TzFontHeadGoodurl','300,400,400italic,600,700');                            //  url google font
            $plazarttheme_header_font_family     =   ot_get_option('plazarttheme_TzFontFaminyHead');                             //  font family google       //  font squireel
            $plazarttheme_header_font_selecter   =   ot_get_option('plazarttheme_TzHeadSelecter');                               //  body selecter
            $plazarttheme_header_font_default     =   ot_get_option('plazarttheme_TzFontHeadDefault','Arial');                     //  font standard
            $plazarttheme_header_font_color  = ot_get_option('plazarttheme_TzHeaderFontColor');

            switch($plazarttheme_header_font_type){
                case'Tzgoogle':
                    $plazarttheme_header_font = $plazarttheme_header_font_family;
                    break;
                default:
                    $plazarttheme_header_font = $plazarttheme_header_font_default;
                    break;
            }

            if(!empty($plazarttheme_header_font_selecter) && !empty($plazarttheme_header_font_selecter)){

                if(!empty($plazarttheme_header_font) && !empty($plazarttheme_header_font)) {
                    $styles.=''.esc_attr($plazarttheme_header_font_selecter).'{
                        font-family:"'.esc_attr($plazarttheme_header_font) .'" !important;}';
                }

                if(!empty($plazarttheme_header_font_color) && !empty($plazarttheme_header_font_color)) {
                    $styles.=''.esc_attr($plazarttheme_header_font_selecter).'{color:'.esc_attr($plazarttheme_header_font_color) .' !important;}';
                }

            }

            // Method Menu font

            $plazarttheme_menu_font_type       =   ot_get_option('plazarttheme_TZFontTypeMenu','TzFontDefault');
            $plazarttheme_menu_font_weight        =   ot_get_option('plazarttheme_TzFontMenuGoodurl','300,400,400italic,600,700');
            $plazarttheme_menu_font_family     =   ot_get_option('plazarttheme_TzFontFaminyMenu');
            $plazarttheme_menu_font_selecter   =   ot_get_option('plazarttheme_TzMenuSelecter');
            $plazarttheme_menu_font_default    =   ot_get_option('plazarttheme_TzFontMenuDefault','Arial');
            $plazarttheme_menu_font_color    = ot_get_option('plazarttheme_TzMenuFontColor');

            switch($plazarttheme_menu_font_type){
                case'Tzgoogle':
                    $plazarttheme_menu_font = $plazarttheme_menu_font_family;
                    break;
                default:
                    $plazarttheme_menu_font = $plazarttheme_menu_font_default;
                    break;

            }

            if(!empty($plazarttheme_menu_font_selecter) && !empty($plazarttheme_menu_font_selecter)){

                if(!empty($plazarttheme_menu_font) && !empty($plazarttheme_menu_font)) {
                    $styles.=''.esc_attr($plazarttheme_menu_font_selecter).'{
                        font-family:"'.esc_attr($plazarttheme_menu_font) .'" !important;}';
                }

                if(!empty($plazarttheme_menu_font_color) && !empty($plazarttheme_menu_font_color)) {
                    $styles.=''.esc_attr($plazarttheme_menu_font_selecter).'{color:'.esc_attr($plazarttheme_menu_font_color) .' !important;}';
                }

            }


            // Method Custom font
            $plazarttheme_custom_font_type      =   ot_get_option('plazarttheme_TZFontTypeCustom','TzFontDefault');
            $plazarttheme_custom_font_weight       =   ot_get_option('plazarttheme_TzFontCustomGoodurl','300,400,400italic,600,700');
            $plazarttheme_custom_font_family    =   ot_get_option('plazarttheme_TzFontFaminyCustom');
            $plazarttheme_custom_font_selecter  =   ot_get_option('plazarttheme_TzCustomSelecter');
            $plazarttheme_custom_font_default  =   ot_get_option('plazarttheme_TzFontCustomDefault','Arial');
            $plazarttheme_custom_font_color     = ot_get_option('plazarttheme_TzCustomFontColor');

            switch($plazarttheme_custom_font_type){
                case'Tzgoogle':
                    $plazarttheme_custom_font = $plazarttheme_custom_font_family;
                    break;
                default:
                    $plazarttheme_custom_font = $plazarttheme_custom_font_default;
                    break;

            }

            if(!empty($plazarttheme_custom_font_selecter) && !empty($plazarttheme_custom_font_selecter)){

                if(!empty($plazarttheme_custom_font) && !empty($plazarttheme_custom_font)) {
                    $styles.=''.esc_attr($plazarttheme_custom_font_selecter).'{
                        font-family:"'.esc_attr($plazarttheme_custom_font) .'" !important;}';
                }

                if(!empty($plazarttheme_custom_font_color) && !empty($plazarttheme_custom_font_color)) {
                    $styles.=''.esc_attr($plazarttheme_custom_font_selecter).'{color:'.esc_attr($plazarttheme_custom_font_color) .' !important;}';
                }

            }
//  End - Font Options

            // add Custom css
            $plazarttheme_customcss = ot_get_option('plazarttheme_TzCustomCss','');
            if(isset($plazarttheme_customcss) && !empty($plazarttheme_customcss)){
                $styles.= esc_attr($plazarttheme_customcss);
            }
            // end custom css

//            if ( isset ( $plazarttheme_body_fontbodyurl ) && $plazarttheme_body_fontbodyurl != ""){ wp_enqueue_style('google-font', $plazarttheme_body_fontbodyurl, false); }
//            if ( isset ( $plazarttheme_headerurl ) && $plazarttheme_headerurl != ""){ wp_enqueue_style('header-font', $plazarttheme_headerurl, false); }
//            if ( isset ( $plazarttheme_menuurl ) && $plazarttheme_menuurl != ""){ wp_enqueue_style('menu-font', $plazarttheme_menuurl, false); }
//            if( isset ( $plazarttheme_customurl ) && $plazarttheme_customurl != ""){ wp_enqueue_style('custom-font', $plazarttheme_customurl, false); }


           //Background
            $plazarttheme_default_background_type    =   ot_get_option('plazarttheme_background_type');
            $plazarttheme_default_color              =   ot_get_option('plazarttheme_TZBackgroundColor','#ffffff');
            $plazarttheme_default_pattern            =   ot_get_option('plazarttheme_background_pattern');
            $plazarttheme_default_single_image       =   ot_get_option('plazarttheme_background_single_image');

            switch($plazarttheme_default_background_type){
                case 'pattern':
                    $styles.= 'body#bd {background: url("' . get_template_directory_uri() .'/images/patterns/' . $plazarttheme_default_pattern . '") repeat scroll 0 0 transparent !important;}';
                    break;
                case 'single_image':
                    $styles.= 'body#bd {background: url("' . $plazarttheme_default_single_image . '") no-repeat fixed center center / cover transparent !important;}';
                    break;
                case 'default':
                    $styles.= 'body#bd {background: '.$plazarttheme_default_color.' !important;}';
                    break;
                default:
                    $styles.= 'body#bd {background: '.$plazarttheme_default_color.' !important;}';
                    break;
            }

            ?>

            <?php
            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
                if(ot_get_option( 'plazarttheme_favicon_onoff','no') == 'yes'){
                    $plazarttheme_favicon = ot_get_option('plazarttheme_favicon');
                    if( $plazarttheme_favicon ){
                        echo '<link rel="shortcut icon" href="' . $plazarttheme_favicon . '" type="image/x-icon" />';
                    }
                }
            }
            ?>

        <?php
            plazarttheme_CustomCss($styles,'custom');
        }

    endif

?>