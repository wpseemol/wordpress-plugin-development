# Wordpress Plugin

-   plugin main file and dir name same is best practice.

<h2><a href="https://developer.wordpress.org/plugins/plugin-basics/header-requirements/">wordpress plugin requirements</a> </h2>

-   <b>Plugin Name: </b>(required) The name of your plugin, which will be displayed in the Plugins list in the WordPress Admin.

-   <b>Plugin URI: </b>(required) The name of your plugin, which will be displayed in the Plugins list in the WordPress Admin.

-   <b>Description:</b> A short description of the plugin, as displayed in the Plugins section in the WordPress Admin. Keep this description to fewer than 140 characters.

```bash


/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Name
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Your Name
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 * Requires Plugins:  my-plugin, yet-another-plugin
 */

```
