<?php
namespace calisia_save_product_import_mapping;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class mapping_ajax{
    public static function crud(){
        switch($_POST['crud']){
            case 'create': 
                self::has_permission();
                self::check_data(array('name','mapping'));
                self::create(); 
                break;
            case 'read': 
                self::check_data(array('name'));
                self::read(); 
                break;
            case 'delete': 
                self::has_permission();
                self::check_data(array('name'));
                self::delete(); 
                break;
        }
    } 

    public static function create(){
        $response = array();
        $response['result'] = mapper::save_mapping($_POST['name'],$_POST['mapping']);
        $response['mappings'] = mapper::get_saved_mappings();

        if(!$response['result'])
            $response['error'] = __('Error while saving data.','calisia-save-product-import-mapping');
        echo json_encode($response);
        wp_die();
    }

    public static function read(){
        $response = array(); 
        foreach(mapper::get_saved_mappings() as $name => $mapping){
            if($name == $_POST['name']){
                $response['result'] = true;
                $response['mapping'] = $mapping;
                echo json_encode($response);
                wp_die();
            }
        }
        $response['result'] = false;
        $response['error'] = __('Error reading data.','calisia-save-product-import-mapping');
        echo json_encode($response);
        wp_die();
    }

    public static function delete(){
        $response = array();
        $response['result'] = mapper::delete_mapping($_POST['name']);
        $response['mappings'] = mapper::get_saved_mappings();

        if(!$response['result'])
            $response['error'] = __('Error while deleting data.','calisia-save-product-import-mapping');
        echo json_encode($response);
        wp_die();
    }

    public static function error($msg){
        $response = array();
        $response['result'] = false;
        $response['error'] = $msg;
        echo json_encode($response);
        wp_die();
    }

    public static function has_permission(){
        if( current_user_can('manage_options') )
            return;
        self::error(__('You do not have permissions to do that.','calisia-save-product-import-mapping'));
    }

    public static function check_data($data_to_check){
        foreach($data_to_check as $required_data){
            if(!isset($_POST[$required_data]) || empty($_POST[$required_data]))
                self::error(__('Not enough data or data corrupted','calisia-save-product-import-mapping'));
        }
    }
}

