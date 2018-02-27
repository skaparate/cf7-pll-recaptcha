<?php
namespace Nicomv\Cf7\Polylang\Recaptcha;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://nicomv.com
 * @since             0.0.2
 * @package 					Nicomv\Cf7\Polylang\Recaptcha
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Form 7 Polylang Recaptcha
 * Plugin URI:        https://github.com/skaparate/cf7-pll-recaptcha/
 * Description:       A simple plugin that changes the recaptcha API URI language.
 * Version:           0.0.2
 * Author:            nicomv.com
 * Author URI:        http://nicomv.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nmv-cf7-pll-recaptcha
 * Domain Path:       /languages
 */

if (! defined('WPINC')) {
    die;
}

define('NMV_CF7_PLL_RECAPTCHA_PATH', plugin_dir_path(__FILE__));

function run()
{
    require_once NMV_CF7_PLL_RECAPTCHA_PATH.'includes/Core.php';
    $core = new \Nicomv\Cf7\Polylang\Recaptcha\Includes\Core;
    $core->run();
    return true;
}
run();

