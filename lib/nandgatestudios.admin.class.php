<?php
if( !class_exists( 'nandgatestudios_admin') ){

class nandgatestudios_admin
{
    static function pageHeader( $pageSlug )
    {

        echo '<div class="nandgatestudios-panel-header">';
        echo '<div class="nandgatestudios-topper"></div>';
        echo '<div class="nandgatestudios-middle nandgatestudios-row">';

        echo '<div class="nandgatestudios-col-3">';
        echo '<h1 class="nandgatestudios-brand"><a href="' . nandgatestudios_core::author( 'url' ) . '" title="' . nandgatestudios_core::author( 'name' ) .' - ' . nandgatestudios_core::author( 'description' ) . '">' . nandgatestudios_core::author( 'name' ) . '</a></h1>';
        echo '</div>';

        echo '<div class="nandgatestudios-col-9">';
        echo '<nav class="nandgatestudios-nav">';

        echo '<ul class="nandgatestudios-list nandgatestudios-inline">';


        echo '<ul class="nandgatestudios-list nandgatestudios-inline special nandgatestudios-free-theme">';

        /* WILL BE A TAB OR A PAGE WITH UPGRADE SYSTEM */
        if( nandgatestudios_core::exists_premium() ){
            echo '<li>';
            echo '<a href="' . esc_url( nandgatestudios_core::theme( 'premium' ) ) . '"><i class="nandgatestudios-icon-publish"></i> <span>Upgrade to Premium</span></a>';
            echo '</li>';
        }
        
        echo '</ul>';

        echo '</nav>';
        echo '</div>';

        echo '<div class="clear clearfix"></div>';
        echo '</div>';
        echo '<div class="nandgatestudios-poor"></div>';
        echo '</div>';


        /* BLANK SPACE */
        echo '<div class="nandgatestudios-blank">';
        echo '<span class="nandgatestudios-author-description"><a href="' . nandgatestudios_core::author( 'url' ) . '" title="' . nandgatestudios_core::author( 'name' ) .' - ' . nandgatestudios_core::author( 'description' ) . '">' . nandgatestudios_core::author( 'description' ) . '</a></span>';
        echo '<a href="' . esc_url( nandgatestudios_core::theme( 'ThemeURI' ) ) . '"><strong>' . nandgatestudios_core::theme( 'Name' ) . '</strong> - ' . nandgatestudios_core::version() . '</a>';
        echo '</div>';


        /* CONTENT */
        echo '<div class="nandgatestudios-panel-wrapper">';
    }
    
    static function pageMenu()
    {
        $parent     = '';
        $pages      = nandgatestudios_cfg::get_pages();
        $pageCB     = array( 'nandgatestudios_admin', 'displayPage' );

        foreach( $pages as $slug => &$d ) {
            if( isset( $d[ 'menu' ] ) ) {
                $m = $d[ 'menu' ];
                if( strlen( $parent ) == 0 ) {
                    add_theme_page(
                        $m[ 'label' ]                                           /* page_title   */
                        , $m[ 'label' ]                                         /* menu_title   */
                        , 'administrator'                                       /* capability   */
                        , $slug                                                 /* menu_slug    */
                        , $pageCB                                               /* function     */
                    );
                    $parent = $slug;
                }
            }
        }
    }

    static function displayPage()
    {   
        if( !isset( $_GET ) || !isset( $_GET[ 'page' ] ) ){
            wp_die( 'Invalid page name', 'materialize' );
            return;
        }

        $pageSlug = $_GET[ 'page' ];

        echo '<div class="nandgatestudios-admin-page">';

        echo self::pageHeader( $pageSlug );

        echo '</div>';

        $faqs = nandgatestudios_cfg::get( 'faqs' );


        if( !empty( $faqs ) ){
            foreach( $faqs as $faq ){
                echo '<div class="nandgatestudios-content">';
                echo '<div class="nandgatestudios-box">';
                echo '<div class="nandgatestudios-box-header">';
                echo '<h3>' . $faq[ 'title' ] . '</h3>';
                echo '</div>';
                echo '<div class="nandgatestudios-box-content">';
                echo $faq[ 'content' ];
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
}

}	/* END IF CLASS EXISTS */
?>