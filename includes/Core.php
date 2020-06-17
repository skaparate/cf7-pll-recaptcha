<?php

namespace Nicomv\Cf7\Polylang\Recaptcha\Includes;

/**
 * The main functionalaty of this plugin.
 *
 * @version 1.0.1
 */
class Core
{
    /**
     * Retrieves the recaptcha api for the current polylang language.
     * @param  string $src    The script src.
     * @param  string $handle The script handle, as defined in wp_register_script.
     * @return string         A modified version of the api uri or the unmodified one
     * if the $handle doesn't match with the one defined by contact forms 7.
     */
    public function getScriptSrc($src, $handle)
    {   
        if ($handle !== 'google-recaptcha') {
            return $src;
        }
        
        $lang = strtolower(pll_current_language());
        if ('en' === $lang) {
            return $src;
        }
        if (false !== strpos($src, '&hl=')) {
            return str_replace('/&hl=../', "&hl=$lang", $src);
        }
        if (false !== strpos($src, '?hl=')) {
            return str_replace('/\\?hl=../', "?hl=$lang", $src);
        }
        
        return $src . '&hl=' . $lang;
    }

    public function run()
    {
        $this->loadLang();
        if (is_admin()) {
            add_action('admin_init', array($this, 'checkRequiredPlugins'));
        } else {
            $this->addFilters();
        }
    }
    
    private function loadLang()
    {
        require_once NMV_CF7_PLL_RECAPTCHA_PATH . 'i18n/I18n.php';
        $i18n = new \Nicomv\Cf7\Polylang\Recaptcha\I18n\I18n;
        add_action('plugins_loaded', array($i18n, 'loadTextDomain'));
    }
    
    public function noPluginsNotice()
    {
        include_once NMV_CF7_PLL_RECAPTCHA_PATH . 'includes/no-plugins.php';
    }
    
    public function checkRequiredPlugins()
    {
        if (!is_plugin_active('contact-form-7/wp-contact-form-7.php') || !is_plugin_active('polylang/polylang.php')) {
            add_action('admin_notices', array($this, 'noPluginsNotice'));
            return false;
        }
        return true;
    }
    
    public function addFilters()
    {
        add_filter('script_loader_src', array($this, 'getScriptSrc'), 10, 2);
    }
}
