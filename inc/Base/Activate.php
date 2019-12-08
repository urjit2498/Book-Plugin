<?php
/**
* @package Book-Plugin
*/

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        //Flush rewrite rules
        flush_rewrite_rules();
        $default = array();

        if( ! get_option('book_plugin')){
            update_option('book_plugin', $default);
        }

        if( ! get_option('book_plugin_cpt')){
            update_option('book_plugin_cpt', $default);
        }

        if( ! get_option('book_plugin_tax')){
            update_option('book_plugin_tax', $default);
        }
    }
}