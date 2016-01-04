<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>

<section class="container">
        <?php
        while (have_posts()) : the_post() ;
            ?>
            <div <?php post_class('tz_page_content') ?>>
                <?php the_content();
                      wp_link_pages() ;
                ?>
            </div>
            <?php
             comments_template();
        endwhile;
        ?>
</section>
<?php
get_template_part('template_inc/inc','footer');
get_footer();
?>

