<?php
/**
 * Plugin Name: calisia-save-product-import-mapping
 * Author: Tomasz Boroń
 * Text Domain: calisia-save-product-import-mapping
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

define('CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT', __DIR__);
define('CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_URL', plugin_dir_url( __FILE__ ));

require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/utils/loader.php';
require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/utils/renderer.php';
require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/utils/orientation.php';
require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/utils/translations.php';

require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/mapper.php';
require_once CALISIA_SAVE_PRODUCT_IMPORT_MAPPING_ROOT . '/src/mapping_ajax.php';

add_action( 'woocommerce_csv_product_import_mapped_columns', 'calisia_save_product_import_mapping\mapper::render' );

//load css and js files in backend (admin)
add_action('admin_enqueue_scripts', 'calisia_save_product_import_mapping\utils\loader::load_css', 20);
add_action('admin_enqueue_scripts', 'calisia_save_product_import_mapping\utils\loader::load_js', 20);

//ajax
add_action( "wp_ajax_calisia_save_product_import_mapping_crud", 'calisia_save_product_import_mapping\mapping_ajax::crud' );

//load plugin textdomain
add_action( 'init', 'calisia_save_product_import_mapping\utils\translations::load_textdomain' );
