<?php
if( !class_exists( 'nandgatestudios_header' ) ){

class nandgatestudios_header
{
	static function head()
	{
        get_template_part( 'templates/head' );
		get_template_part( 'templates/style' );
	}
}

}	/* END IF CLASS EXISTS */
?>