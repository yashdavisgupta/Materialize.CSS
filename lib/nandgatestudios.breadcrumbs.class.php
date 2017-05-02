<?php
if( !class_exists( 'nandgatestudios_breadcrumbs' ) ){

class nandgatestudios_breadcrumbs
{
	static function home()
    {
        $rett  = '<li id="home-label">';
        $rett .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_theme_mod( 'nandgatestudios-breadcrumbs-home-link-description' , __( 'go to home' , 'materialize' ) ) ) . '">';
        $rett .= '<i class="nandgatestudios-icon-home"></i> <span>' . esc_html( get_theme_mod( 'nandgatestudios-breadcrumbs-home-link-text' , __( 'Home' , 'materialize' ) ) ) . '</span>';
        $rett .= '</a>';
        $rett .= '</li>';

        return $rett;
    }

    static function categories( $c_id )
	{
		$rett = '';

		$c = get_category( $c_id );

		if( isset( $c -> category_parent ) && $c -> category_parent > 0 ){
			$rett .= self::categories( $c -> category_parent );
		}

		$category_link = get_category_link( $c -> term_id );

		if( is_wp_error( $category_link ) ){
			return '';
		}

		if( is_category( $c -> term_id ) ){
			$rett .= '<li>' . esc_html( $c -> name ) . '</li>';
		}
		else{
			$rett .= '<li>';
			$rett .= '<a href="' . esc_url( $category_link ) . '" title="' . sprintf( __( 'See articles from category - %s' , 'materialize' ), esc_attr( $c -> name ) ) . '">' . esc_html( $c -> name ) . '</a>';
			$rett .= '</li>';
		}

		return $rett;
	}

	static function pages( $p )
	{
        $rett = '';

        if( isset( $p -> post_parent ) && $p -> post_parent > 0 ){
            $parent = get_post( $p -> post_parent );
            $rett .= self::pages( $parent );
        }

        if( !is_page( $p -> ID  ) ){
            $rett .= '<li>';
            $rett .= '<a href="' . get_permalink( $p -> ID ) . '" title="' . nandgatestudios_post::title( $p -> ID, true ) . '">' . nandgatestudios_post::title( $p -> ID, true )  . '</a>';
            $rett .= '</li>';
        }

        return $rett;
    }

    static function count( $query )
    {
    	$label = _n( 'One Article' , '%s Articles' ,  absint( $query -> found_posts ) , 'materialize' );
        return '<span>' . sprintf( $label , number_format_i18n( absint( $query -> found_posts ) ) ) . '</span>';
    }
}

}   /* END IF CLASS EXISTS */
?>