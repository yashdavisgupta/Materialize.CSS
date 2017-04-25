<?php
/**
 *
 *  The template for displaying pages
 *
 *  This is the template that displays all pages by default.
 *  Please note that this is the WordPress construct of pages and that
 *  other "pages" on your WordPress site will use a different template.
 *
 *  @package WordPress
 *  @subpackage Materialize.CSS
 *  @since Materialize.CSS 1.0
 */

get_header(); ?>

<?php
    if( have_posts() ){
        while( have_posts() ){
            the_post();

            if( (bool)get_theme_mod( 'nandgatestudios-show-breadcrumbs', true ) ){
        ?>
                <!-- the breadcrumbs content -->
                <div class="nandgatestudios-page-header">

                    <!-- the breadcrumbs container ( align to center ) -->
                    <div class="container">
                        <div class="row">

                            <div class="col s12">

                                <!-- the breadcrumbs navigation path -->
                                <nav class="nandgatestudios-nav-inline">
                                    <ul class="nandgatestudios-menu">

                                        <!-- the home link -->
                                        <?php echo nandgatestudios_breadcrumbs::home(); ?>

                                        <!-- the parent pages ( recursive if exists ) -->
                                        <?php echo nandgatestudios_breadcrumbs::pages( $post ); ?>
                                        
                                        <!-- the last arrow from path -->
                                        <li></li>
                                    </ul>
                                </nav>

                                <!-- the headline -->
                                <h1><?php the_title(); ?></h1>

                            </div>

                        </div>
                    </div>

                </div>
        <?php
            }
        ?>

            <!-- the content -->
            <div class="content">

                <!-- the container ( align to center ) -->
                <div class="container">
                    <div class="row">

                    <?php
                        global $nandgatestudios_layout;

                        $settings = 'page';

                        // check if is special page ( special layout settings )
                        if( get_theme_mod( 'nandgatestudios-special-page' , 2 ) == $post -> ID ){
                            $settings = 'special-page';                            
                        }

                        // get layout details
                        $nandgatestudios_layout = new nandgatestudios_layout( $settings );

                        // left sidebar ( if exists )
                        $nandgatestudios_layout -> sidebar( 'left' );
                    ?>
                        <section class="<?php echo $nandgatestudios_layout -> classes(); ?>">

                            <!-- the page content wrapper -->
                            <div <?php post_class( 'nandgatestudios-page' ); ?>>

                                <?php
                                    // the page thumbnail
                                    $p_thumbnail = get_post( get_post_thumbnail_id( $post -> ID ) );

                                    if( has_post_thumbnail() && isset( $p_thumbnail -> ID ) ){
                                ?>
                                        <!-- the page thumbnail wrapper -->
                                        <div class="post-thumbnail">
                                            <?php

                                                // the page thumbnail
                                                echo get_the_post_thumbnail( $post -> ID , 'nandgatestudios-classic', array(
                                                    'alt' => nandgatestudios_post::title( $post -> ID, true )
                                                ));
                                                
                                                // the page thumbnail caption
                                                $c_thumbanil = isset( $p_thumbnail -> post_excerpt ) ? esc_html( $p_thumbnail -> post_excerpt ) : null;

                                                if( !empty( $c_thumbanil ) ){
                                                    echo '<footer>' . $c_thumbanil . '</footer>';
                                                }
                                            ?>
                                        </div><!-- .post-thumbnail -->
                                <?php
                                    }
                                ?>

                                <!-- the page content -->
                                <?php the_content(); ?>

                                <?php
                                    // the page pagination
                                    wp_link_pages( array( 
                                        'before'        => '<div class="clearfix"></div><div class="nandgatestudios-paged-post"><span class="nandgatestudios-pagination-title">' . __( 'Pages', 'materialize' ) . ': </span>',
                                        'after'         => '</div>',
                                        'link_before'   => '<span class="nandgatestudios-pagination-item">',
                                        'link_after'    => '</span>'
                                    ));
                                ?>

                                <div class="clearfix"></div>

                            </div>

                            <!-- the page comments -->
                            <?php comments_template(); ?>

                        </section>

                    <?php
                        // right sidebar ( if exists )
                        $nandgatestudios_layout -> sidebar( 'right' );
                    ?>
                    
                    </div>
                </div><!-- .container -->
            </div><!-- .content -->
<?php
        } // end of page
    }
?>

<?php get_footer(); ?>