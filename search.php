<?php
/**
 *
 *  The template for displaying search results pages
 *
 *  @package WordPress
 *  @subpackage Materialize.CSS
 *  @since Materialize.CSS 1.0
 */

get_header(); ?>


    <?php
        if( (bool)get_theme_mod( 'nandgatestudios-show-breadcrumbs', true ) ){
    ?>
            <!-- the breadcrumbs content -->
            <div class="nandgatestudios-page-header">

                <!-- the breadcrumbs container ( align to center ) -->
                <div class="container">
                    <div class="row">

                        <div class="col s12 m8 l9">

                            <!-- the breadcrumbs navigation path -->                                                                                                                            
                            <nav class="nandgatestudios-nav-inline">
                                <ul class="nandgatestudios-menu">

                                    <!-- the home link -->
                                    <?php echo nandgatestudios_breadcrumbs::home(); ?>

                                    <!-- the last arrow from path -->
                                    <li></li>

                                </ul>
                            </nav>

                            <!-- the headline -->
                            <h1><?php printf( __( 'Search results for "%s"' , 'materialize' ), get_search_query() ); ?></h1>
                        </div>

                        <!-- the number of posts from search -->
                        <div class="col s12 m4 l3 nandgatestudios-posts-found">
                            <div class="found-details">
                                <?php echo nandgatestudios_breadcrumbs::count( $wp_query ); ?>
                            </div>
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

                    /**
                     *
                     *  Include the posts loop
                     *  If you want to override this in a child theme, then include a file
                     *  called loop.php and that will be used instead.
                     */
                    
                    get_template_part( 'templates/loop' );
                ?>

            </div>
        </div><!-- .container -->
    </div><!-- .content -->


<?php get_footer(); ?>