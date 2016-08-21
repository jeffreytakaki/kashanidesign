<?php

/**
 * The Tourist Travel Plugin
 * @package TouristTravel
 * @subpackage Main
 */

/**
 * Plugin Name: Tourist Travel
 * Plugin URI: http://touristtravel.com
 * Description: Tourist Travel with WooCommerce is software with a twist from the creators of WordPress.
 * Author: The Tourist Travel Community
 * Author URI: http://touristtravel.com
 * Version: 1.0.0
 * Text Domain: touristtravel
 * Domain Path: /languages/
 */
if (! defined('ABSPATH')) {
    exit(); // Exit if accessed directly
}
define('TOURISTTRAVEL_NAME', 'touristtravel');
define('TOURISTTRAVEL_URL', plugin_dir_url(__FILE__));
define('TOURISTTRAVEL_DIR', plugin_dir_path(__FILE__));

if (! class_exists('TouristTravel')) :

    final class TouristTravel
    {

        function __construct()
        {
            $this->includes_dir = TOURISTTRAVEL_DIR . 'includes/';
            $this->admin_dir = TOURISTTRAVEL_DIR . 'admin/';
            $this->includes();
            add_action('admin_notices', array(
                $this,
                'admin_notice'
            ));
            register_activation_hook(__FILE__, array(
                $this,
                'table_install'
            ));
            // Display Fields
            add_action('woocommerce_product_options_general_product_data', array(
                $this,
                'woo_add_custom_general_fields'
            ));
            // Save Fields
            add_action('woocommerce_process_product_meta', array(
                $this,
                'woo_add_custom_general_fields_save'
            ));
        }

        /**
         * includes file.
         */
        private function includes()
        {
            require_once $this->admin_dir . 'admin.options.php';
            require_once $this->includes_dir . 'common/shortcodes.php';
            require_once $this->includes_dir . 'core/base.functions.php';
            if (class_exists('Vc_Manager')) {
                require_once $this->includes_dir . 'common/vc_options.php';
            }
        }

        /**
         * admin notice
         */
        function admin_notice()
        {
            if (! class_exists('WooCommerce')) {
                ?>
                <div class="updated">
                	<p><?php _e( 'Install Woocommerce Plugin', TOURISTTRAVEL_NAME ); ?> <a
                			href="http://www.woothemes.com/woocommerce"><?php _e('here', TOURISTTRAVEL_NAME); ?></a>
                	</p>
                </div>
                <?php
            }
        }

        /**
         * Active Plugin Create Table.
         */
        function table_install()
        {
            global $wpdb;
            
            $charset_collate = '';
            
            if (! empty($wpdb->charset)) {
                $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
            }
            
            if (! empty($wpdb->collate)) {
                $charset_collate .= " COLLATE {$wpdb->collate}";
            }
            require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
            /**
             * table auto_evanto
             */
            $table_name = $wpdb->prefix . 'touristtravel';
            if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") !== $table_name) {
                $sql = "CREATE TABLE $table_name (
                id int(11) NOT NULL AUTO_INCREMENT,
                post_id int(11) NOT NULL,
                budgets int(11),
                tourday int(5),
                startdate date,
                location varchar(255),
                address varchar(255),
                city varchar(255),
                state varchar(255),
                UNIQUE KEY id (id)
                ) $charset_collate;";
                
                dbDelta($sql);
            }
        }

        function woo_add_custom_general_fields()
        {
            global $post;
            $meta_data = touristtravel_get_metadata($post->ID);
            ob_start();
            ?>
            <div class="options_group">
            <?php
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_days',
                'label' => __('Days (*)', TOURISTTRAVEL_NAME),
                'placeholder' => '',
                'desc_tip' => 'true',
                'type' => 'number',
                'value' => $meta_data['tourday'],
                'custom_attributes' => array(
                    'step' => 'any',
                    'min' => '0'
                ),
                'description' => __('Enter days of tour.', TOURISTTRAVEL_NAME)
            ));
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_start_tour',
                'label' => __('Start Tour (*)', TOURISTTRAVEL_NAME),
                'desc_tip' => 'true',
                'placeholder' => 'dd/mm/yyyy',
                'value' => $meta_data['startdate'],
                'type' => 'date',
                'description' => __('Select Start days of tour.', TOURISTTRAVEL_NAME)
            ));
            ?>
            </div>
            <div>
            <?php
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_location_name',
                'label' => __('Location', TOURISTTRAVEL_NAME),
                'value' => $meta_data['location'],
                'desc_tip' => 'true'
            ));
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_location_address',
                'label' => __('Address', TOURISTTRAVEL_NAME),
                'value' => $meta_data['address'],
                'desc_tip' => 'true'
            ));
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_location_city',
                'label' => __('City', TOURISTTRAVEL_NAME),
                'value' => $meta_data['city'],
                'desc_tip' => 'true'
            ));
            woocommerce_wp_text_input(array(
                'id' => '_touristtravel_location_state',
                'label' => __('State', TOURISTTRAVEL_NAME),
                'value' => $meta_data['state'],
                'desc_tip' => 'true'
            ));
            ?>
            </div>
            <?php
            echo ob_get_clean();
        }

        function woo_add_custom_general_fields_save($post_id)
        {
            global $wpdb;
            //$wpdb->query("ALTER TABLE {$wpdb->prefix}touristtravel ADD budgets int(11)");
            $woocommerce_touristtravel_price = null;
            if(!empty($_POST['_regular_price'])){
                $woocommerce_touristtravel_price = $_POST['_regular_price'];
            } else {
                if(!empty($_POST['_sale_price'])){
                    $woocommerce_touristtravel_price = $_POST['_sale_price'];
                }
            }
            
            $woocommerce_touristtravel_days = !empty($_POST['_touristtravel_days']) ? $_POST['_touristtravel_days'] : null;
            $woocommerce_touristtravel_start_tour = !empty($_POST['_touristtravel_start_tour']) ? $_POST['_touristtravel_start_tour'] :null;
            $woocommerce_touristtravel_location_name = !empty($_POST['_touristtravel_location_name']) ? $_POST['_touristtravel_location_name'] : null;
            $woocommerce_touristtravel_location_address = !empty($_POST['_touristtravel_location_address']) ? $_POST['_touristtravel_location_address'] : null;
            $woocommerce_touristtravel_location_city = !empty($_POST['_touristtravel_location_city']) ? $_POST['_touristtravel_location_city'] : null;
            $woocommerce_touristtravel_location_state = !empty($_POST['_touristtravel_location_state']) ? $_POST['_touristtravel_location_state'] : null;
            $_post_id = $wpdb->get_var("SELECT id FROM {$wpdb->prefix}touristtravel as t WHERE t.post_id= {$post_id}");
            
            if($woocommerce_touristtravel_days && $woocommerce_touristtravel_start_tour){
                
                update_post_meta($post_id, '_touristtravel_days', $woocommerce_touristtravel_days);
                
                if (!empty($_post_id)) {
                    $wpdb->update("{$wpdb->prefix}touristtravel", array(
                        'budgets' => $woocommerce_touristtravel_price,
                        'tourday' => $woocommerce_touristtravel_days,
                        'startdate' => $woocommerce_touristtravel_start_tour,
                        'location' => $woocommerce_touristtravel_location_name,
                        'address' => $woocommerce_touristtravel_location_address,
                        'city' => $woocommerce_touristtravel_location_city,
                        'state' => $woocommerce_touristtravel_location_state
                    ), array(
                        'post_id' => $post_id
                    ));
                } else {
                    $wpdb->insert("{$wpdb->prefix}touristtravel", array(
                        'post_id' => $post_id,
                        'budgets' => $woocommerce_touristtravel_price,
                        'tourday' => $woocommerce_touristtravel_days,
                        'startdate' => $woocommerce_touristtravel_start_tour,
                        'location' => $woocommerce_touristtravel_location_name,
                        'address' => $woocommerce_touristtravel_location_address,
                        'city' => $woocommerce_touristtravel_location_city,
                        'state' => $woocommerce_touristtravel_location_state
                    ));
                }
            }
        }
    }
    new TouristTravel();

endif;
