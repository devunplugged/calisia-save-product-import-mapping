<?php
namespace calisia_save_product_import_mapping\utils;



class loader{

    public static function load_css(){
        if(!orientation::is_product_import_mapping())
            return;

        wp_enqueue_style('calisia-save-product-import-mapping-css', CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_URL . 'css/mapper.css');

    }

    public static function load_js(){
 
        if(!orientation::is_product_import_mapping())
            return;

        wp_enqueue_script('calisia-save-product-import-mapping-js', CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_URL . 'js/mapper.js');

    }
}