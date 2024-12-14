<?php



/**
 * Plugin Name
 *
 * @package           wpseemol
 * @author            Seemol chakroborti
 * @copyright         2024 wpseemol
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       wpSeemol
 * Plugin URI:        #
 * Description:       Learning Wordpress development
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Seemol chakroborti
 * Author URI:        #
 * Text Domain:       wpseemol
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 * 
 */

class Wpseemol_Main
{

    private static $instance = null;

    private function __construct()
    {
        // add_filter("the_content", array($this, "the_content_callback"));

        // add_action("wp_footer", array($this, "wp_footer_callback"));


        $this->define_constants();

        $this->load_classes();


    }

    public static function get_instance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;

    }

    private function define_constants()
    {
        define("WPSEEMOL_PLUGIN_PATH", plugin_dir_path(__FILE__));
    }

    // load all class function
    private function load_classes()
    {
        require_once WPSEEMOL_PLUGIN_PATH . "includes/Admin_Menu.php";

        $admin_menu = new Wpseemol\plugin\Admin_Menu();
    }


    public function the_content_callback($content)
    {

        $is_show = apply_filters("show_add_content", function () {
            return (bool) true;
        }, 10, 1);

        if (!$is_show) {
            return $content;
        }

        $url = get_the_permalink();

        return $content . "<p>$url</p>";
    }


    function wp_footer_callback()
    {
        $home_url = home_url();

        echo "wpSeemol test: " . $home_url;
    }






}

Wpseemol_Main::get_instance();
