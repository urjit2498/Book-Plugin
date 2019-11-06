<?php
/**
* @package Book-Plugin
*/

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link') );
    }
    
    /**
    * Setting up custom setting links for admin
    *
    * @param $links   Which passes all the links
    * @return $links   all the setting links
    */
    public function settings_link( $links )
    {
        //add custom setting links
        $settings_link1 = '<a href="admin.php?page=book_plugin">Edit</a>';
        $settings_link2 = '<a href="admin.php?page=book_plugin">Settings</a>';
        array_push( $links, $settings_link1, $settings_link2 );
        return $links;
    }
} 