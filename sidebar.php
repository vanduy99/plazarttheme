
<?php
if ( is_active_sidebar( 'Sidebar left' ) ) :
    if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar left') )  :
    endif;
endif;

?>