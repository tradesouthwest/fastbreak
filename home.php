<?php
/**
 * The Blog template file
 *
 * It is used to display the blog page when the blog page is set as home.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */

get_header(); ?>

<main id="main" class="container"> 
    <section id="sitecontent" class="row">
        <div class="col col-12-sm col-2-md">

            <?php if ( is_active_sidebar( 'sidebar-first' ) ) : ?>

            <div id="sidebar-first" class="sidebar widget-area" role="complementary">

                <?php dynamic_sidebar( 'sidebar-first' ); ?>

            </div>

            <?php endif; ?>

        </div>

            <div class="col col-9 col-7-md">
            
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope 
              itemtype="https://schema.org/Article">
                <div class="row excerpt-wrapper">
                    <div class="col-4 excerpt-attachment">
                        <?php do_action( 'fastbreak_render_attachment' ); ?>
                    </div>
                    <div class="col-8 inner-content">
                        <header>
                        <h2><?php the_title(
                        sprintf( '<span class="post-title"><a href="%s" rel="bookmark">', 
                            esc_attr( esc_url( get_permalink() ) ) 
                        ), '</a></span>' ); ?></h2>
                        </header>
                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                    </div>
                </div>
            </article>

            <?php endwhile; ?>

            <div class="col col-12">
                <nav class="pagination-nav">
                    <div class="col-3-sm">
                        

                        <div class="nav-previous alignleft">
                            <?php previous_posts_link( '<span class="prvpst-nav"> < </span>' ); ?>
                        </div>
                    </div>
                    <div class="col col-6-sm ">
                        <span class="algn-cntr"><?php do_action( 'fastbreak_check_pagination' ); ?></span>
                    </div>
                        <div class="col-3-sm">
                            <div class="nav-next alignright">
                                <?php next_posts_link( '<span class="nxtpst-nav"> > </span>' ); ?>
                            </div>
                        </div>
                </nav>
            </div>

            <?php else : ?>
              
                <div class="post-content">
                
                    <?php echo esc_url( home_url('/') ); ?>
                
                </div>

	        <?php endif; ?>

        </div>
      
        <div class="col col-3 col-3-md">
            <?php if ( is_active_sidebar( 'sidebar-last' ) ) : ?>
            <div id="sidebar-last" class="sidebar widget-area" role="complementary">
                       
                <?php dynamic_sidebar( 'sidebar-last' ); ?>
                    
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>