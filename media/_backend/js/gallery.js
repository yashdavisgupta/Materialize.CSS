/* CUSTOM GALLERY */
( function( $ ) {
    var media = wp.media;
    
    media.view.Settings.Gallery = media.view.Settings.Gallery.extend({
        render: function() {
            media.view.Settings.prototype.render.apply( this, arguments );

            // Append the custom template
            this.$el.append( media.template( 'nandgatestudios-gallery-settings' ) );

            // Save the setting
            media.gallery.defaults.nandgatestudios_style = 'none';
            this.update.apply( this, [ 'nandgatestudios_style' ] );
            return this;
        }
    });
} )( jQuery );