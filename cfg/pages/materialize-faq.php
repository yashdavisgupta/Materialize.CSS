<?php
$pages  = nandgatestudios_cfg::get_pages();

$cols   = array();
$boxes  = array();
$sett   = array();


$pages[ 'nandgatestudios-materialize-faq' ] = array(
    'menu' => array(
        'label'     => __( 'Materialize.CSS FAQ' , 'materialize' )
    ),
    'cols'  => & $cols,
    'boxes' => & $boxes,
    'sett'  => & $sett
);

nandgatestudios_cfg::set_pages( $pages );
?>