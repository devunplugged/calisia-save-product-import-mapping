<?php
namespace calisia_save_product_import_mapping\utils;

class renderer{
    public static function render($template, $args = array(), $render = true){
        if(!$render)
            ob_start();
        
        include  CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/templates/'.$template.'.php';
        
        if(!$render){
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }

 
}