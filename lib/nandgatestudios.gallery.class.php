<?php
if( !class_exists( 'nandgatestudios_gallery' ) ){

class nandgatestudios_gallery
{
	static function shortcode( $rett, $_attr )
	{
		global $post;

        $attr = shortcode_atts( array(
            'order'                 => 'ASC',
            'orderby'               => 'menu_order ID',
            'id'                    => $post -> ID,
            'ids'                   => '',
            'itemtag'               => 'dl',
            'icontag'               => 'dt',
            'captiontag'            => 'dd',
            'columns'               => 3,
            'size'                  => 'thumbnail',
            'include'               => '',
            'exclude'               => '',
            'nandgatestudios_style'    	=> 'none'
        ) , $_attr );

        /* NO MYTHEM.ES SHORTCODE EMBED */
        if( isset( $attr[ 'nandgatestudios_style' ] ) && $attr[ 'nandgatestudios_style' ] == 'none' ){
            return $rett;
        }


        $cols = $attr[ 'columns' ];
        $ids = array();

        if( empty( $attr[ 'ids' ] ) ){

            $id         = intval( $attr[ 'id' ] );
            $orderby    = $attr[ 'order' ];
            $order      = $attr[ 'order' ];
            $includes   = $attr[ 'include' ];
            $exclude    = $attr[ 'exclude' ];

            if ( 'RAND' == $attr[ 'order' ] ) {
                $orderby = 'none';
            }

            if ( !empty( $includes ) ) {
                $attachments = get_posts( array('include' => $includes, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } elseif ( !empty( $exclude ) ) {
                $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } else {
                $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
            }

            foreach ( $attachments as $key => $val ) {
                $ids[ ] = $val -> ID ;
            }
        }else{
            $ids = explode( ',' , $attr[ 'ids' ] );
        }

        $rett  = '<div class="nandgatestudios-gallery colls-' . $cols . '">';

        foreach( $ids as $id ){

            $p = get_post( $id );

            if( !isset( $p -> ID ) ){
            	continue;
            }

            $media = wp_get_attachment_image_src( $id , 'large' );
            $full = wp_get_attachment_image_src( $id , 'full' );

            $rett .= '<figure class="nandgatestudios-item ' . $attr[ 'nandgatestudios_style' ] . '">';
            $rett .= '<div>';
            $rett .= '<div class="nandgatestudios-thumbnail">';
            $rett .= '<img src="' . $media[ 0 ] . '" alt="' . nandgatestudios_post::title( $p -> ID, true ) . '"/>';
            $rett .= '<figcaption>';
            $rett .= '<div class="nandgatestudios-text">';

            if( !empty( $p -> post_title ) ){
                $rett .= '<div class="nandgatestudios-title">';
                $rett .= '<h2>' . nandgatestudios_post::title( $p -> ID ) . '</h2>';
                $rett .= '</div>';
            }

            $excerpt = strip_tags( $p -> post_excerpt );

            if( !empty( $excerpt ) ){
                $rett .= '<div class="nandgatestudios-caption">';
                $rett .= '<p>' . esc_html( strip_tags( $p -> post_excerpt ) ) . '</p>';
                $rett .= '</div>';
            }

            $rett .= '</div>';
            $rett .= '<a href="' . $full[ 0 ] . '" data-gal="prettyPhoto[pp_gal]" title="' . $excerpt . '" class="waves-effect waves-dark"></a>';
            $rett .= '</figcaption>';
            $rett .= '</div>';
            $rett .= '</div>';
            $rett .= '</figure>';
        }

        $rett .= '<div class="clearfix clear"></div>';
        $rett .= '</div>';

        return $rett;
	}

	static function admin_init()
	{
		add_action( 'wp_enqueue_media', array( 'nandgatestudios_gallery' , 'admin_media' ));
		add_action( 'print_media_templates', array( 'nandgatestudios_gallery' , 'admin_settings' ));
	}

	static function admin_media()
	{
		if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
                return;

		wp_enqueue_script( 'nandgatestudios-gallery-settings',  get_template_directory_uri() . '/media/_backend/js/gallery.js', array( 'media-views' ) );
	}

	static function admin_settings()
	{
        if ( ! isset( get_current_screen() -> id ) || get_current_screen() -> base != 'post' )
            return;
        ?>
        <script type="text/html" id="tmpl-nandgatestudios-gallery-settings">
            <label class="nandgatestudios-gallery-settings">
                <span>myThem.es Style</span>
                <select class="nandgatestudios_style" name="nandgatestudios_style" data-setting="nandgatestudios_style">
                <?php
                    $nandgatestudios_style = array(
                        'none'              => __( 'None', 'materialize' ),
                        'effect-bubba'    	=> __( 'Effect Bubba', 'materialize' )
                    );

                    foreach ( $nandgatestudios_style as $value => $name ) { ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, 'none' ); ?>>
                            <?php echo esc_html( $name ); ?>
                        </option>
                <?php } ?>
                </select>
            </label>
        </script>
        <?php
	}
}

}   /* END IF CLASS EXISTS */
?>
