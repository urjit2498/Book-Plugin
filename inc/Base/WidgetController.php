<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;


/**
 * 
 */
class WidgetController extends BaseController
{
    public $callbacks;

    public $subpages = array();
    
    public function register()
    {
        
        $option = get_option('book_plugin');
        $activated = isset( $option['media_widget'] ) ? $option['media_widget'] : false;

        if(! $activated){
            return;
        }

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        
        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'book_plugin',
                'page_title' => 'Media Widget Manager',
                'menu_title' => 'Media Widget Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'book_widget',
                'callback' => array( $this->callbacks, 'adminWidget' )
            ),
        );
    }
}