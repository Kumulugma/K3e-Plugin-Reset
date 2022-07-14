<?php

/*
  Plugin name: K3e - Plugin Reset
  Plugin URI: https://www.k3e.pl/
  Description: Przystawka K3e do kasowania konfiguracji K3e-Plugin.
  Author: K3e
  Author URI: https://www.k3e.pl/
  Text Domain:
  Domain Path:
  Version: 0.0.2a
 */
require_once 'updater/K3eUpdater.php';
add_action('init', 'k3e_plugin_init');

Puc_v4_Factory::buildUpdateChecker(
        'http://k3e.pl/?action=get_metadata&slug=k3e-plugin-reset',
        __FILE__, //Full path to the main plugin file or functions.php.
        'k3e-plugin-reset'
);

function k3e_plugin_init() {
    do_action('k3e_plugin_init');
}

function k3e_plugin_activate() {
   update_option('k3e_system_modules', []);
}

register_activation_hook(__FILE__, 'k3e_plugin_activate');

function k3e_plugin_deactivate() {
}

register_deactivation_hook(__FILE__, 'k3e_plugin_deactivate');
