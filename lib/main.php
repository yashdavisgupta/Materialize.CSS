<?php
/* INCLUDE CLASSES DEBUG, CONFIG AND CORE */
require_once( get_template_directory() . '/lib/nandgatestudios.cfg.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.core.class.php' );


/* INCLUDE INPUT / OUTPUT */
require_once( get_template_directory() . '/lib/nandgatestudios.tools.class.php' );

/* INCLUDE CONFIGS */
require_once( get_template_directory() . '/cfg/main.php' );

if( is_admin() ){

	/* INCLUDE RESOURCES */
	require_once( get_template_directory() . '/lib/nandgatestudios.admin.class.php' );
}

require_once( get_template_directory() . '/lib/nandgatestudios.setup.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.post.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.scripts.class.php' );

require_once( get_template_directory() . '/lib/nandgatestudios.gallery.class.php' );

require_once( get_template_directory() . '/lib/nandgatestudios.layouts.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.header.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.breadcrumbs.class.php' );
require_once( get_template_directory() . '/lib/nandgatestudios.comments.class.php' );

?>
