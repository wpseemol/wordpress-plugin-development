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
        add_filter("the_content", array($this, "the_content_callback"));

        add_action("wp_footer", array($this, "wp_footer_callback"));
    }

    public static function get_instance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;

    }


    public function the_content_callback($content)
    {

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
