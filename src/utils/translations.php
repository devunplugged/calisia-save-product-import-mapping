<?php
namespace calisia_save_product_import_mapping\utils;

class translations{
    /**
     * Load plugin textdomain.
     */
    public static function load_textdomain() {
        load_plugin_textdomain( 'calisia-save-product-import-mapping', false, 'calisia-save-product-import-mapping/languages' );
    }
}