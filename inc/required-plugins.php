<?php

if( !function_exists( 'check_and_recommend_plugins' ) ) {

    function check_and_recommend_plugin() {
        $plugin_slug = 'advanced-custom-fields-pro/acf.php';    
        $plugin_name = 'Advanced Custom Fields PRO';

        if ( !is_plugin_active($plugin_slug) ) {

            $installed_plugins = get_plugins();

            if ( !isset($installed_plugins[$plugin_slug]) ) {
            
                add_action('admin_notices', function() use ($plugin_name) {
                    echo '<div class="notice notice-warning is-dismissible">';
                    echo '<p>' . sprintf(__('Для корректной работы темы требуется плагин "%s". Установите его, пожалуйста.', 'text-domain'), $plugin_name) . '</p>';
                    echo '</div>';
                });

            } else {
                
                add_action('admin_notices', function() use ($plugin_name) {
                    echo '<div class="notice notice-warning is-dismissible">';
                    echo '<p>' . sprintf(__('Плагин "%s" установлен, но не активирован. Активируйте его для полной функциональности.', 'text-domain'), $plugin_name) . '</p>';
                    echo '</div>';
                });

            }
        }
    }

    add_action('admin_init', 'check_and_recommend_plugin');

}



