<?php
namespace calisia_save_product_import_mapping\utils;

class orientation{
    public static function is_product_import_mapping(){
        if(
            isset($_GET['post_type']) &&
            $_GET['post_type'] == 'product' &&
            isset($_GET['page']) &&
            $_GET['page'] == 'product_importer' &&
            isset($_GET['step']) &&
            $_GET['step'] == 'mapping'
        ){
            return true;
        }
        return false;
    } 
}

