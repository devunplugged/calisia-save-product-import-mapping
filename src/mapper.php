<?php
namespace calisia_save_product_import_mapping;




class mapper{
    public static function render(){
        
        if(!utils\orientation::is_product_import_mapping())
            return;

        utils\renderer::render(
            'mapper/form',
            array(
                'mappings' => self::get_saved_mappings()
            )
        );
    } 

    public static function get_saved_mappings(){
        return get_option('cspim_mappings');
    }

    public static function save_mapping($name,$mapping){
        $saved_mappings = self::get_saved_mappings();
        $saved_mappings[$name] = $mapping;
        return update_option('cspim_mappings', $saved_mappings);
    }

    public static function delete_mapping($name){
        $saved_mappings = self::get_saved_mappings();
        unset($saved_mappings[$name]);
        return update_option('cspim_mappings', $saved_mappings);
    }

    
}

