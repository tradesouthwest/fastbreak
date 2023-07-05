<?php
/**
 * Template Name: Full Width Page
 *
 * This template file has not sidebar and will show the full width of the page with content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
          itemtype="https://schema.org/Article">

            <header>
                <?php the_title(
                sprintf( '<span class="post-title"><a href="%s" rel="bookmark">', 
                        esc_attr( esc_url( get_permalink() ) ) 
                      ), '</a></span>' ); ?>
            </header>
              
                <div class="inner-content">
              
                    <?php the_content(); ?>
                  
                </div>
        </article>
    
    <?php endwhile; ?>
    
    <?php else : ?>
              
        <div class="post-content">
              
            <?php echo esc_url( home_url('/') ); ?>
              
        </div>

	<?php endif; ?>

    </section>
</main>

<?php get_footer(); ?>