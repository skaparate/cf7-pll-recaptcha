<?php

namespace Nicomv\Cf7\Polylang\Recaptcha\I18n;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.0.1
 * @package    Nicomv\Cf7\Polylang\Recaptcha
 * @subpackage Nicomv\Cf7\Polylang\Recaptcha\I18n
 * @author     Your Name <email@example.com>
 */
class I18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.0.1
	 */
	public function loadTextDomain() {
		load_plugin_textdomain(
			'nmv-cf7-pll-recaptcha',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
