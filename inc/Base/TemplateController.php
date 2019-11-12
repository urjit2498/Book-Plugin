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
class TemplateController extends BaseController
{
    public $callbacks;

    public $subpages = array();
    
    public function register()
    {
        
        if(! $this->activated('templates_manager')) return;

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
                'page_title' => 'Template Manager',
                'menu_title' => 'Template Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'book_template',
                'callback' => array( $this->callbacks, 'adminTemplates' )
            ),
        );
    }
}