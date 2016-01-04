<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<section class="container home-post">
    <div class="row">
        <div class="col-md-9">

            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;
                ?>
                <article id='post-<?php the_ID(); ?>' class="post-item">
                    <h1><?php  the_title(); ?></h1>
                    <?php the_post_thumbnail(); ?>
                    <?php if ( get_the_terms( $post->ID, 'portfolio-tags' ) !=  false ): ?>
                    <div class="tztag">
                        TAG: <?php the_terms( $post -> ID, 'portfolio-tags','',',' ) ; ?>
                    </div>
                    <?php endif; ?>
                    <div class="tzcat">
                        CATEGORY : <?php the_terms( $post -> ID, 'portfolio-category','',',' ) ; ?>
                    </div>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile; // end while ( have_posts )
            endif; // end if ( have_posts )
            ?>

        </div>
        <div class="col-md-3 tzsidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>

