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
class CustomTaxonomyController extends BaseController
{
    public $callbacks;

    public $subpages = array();
    
    public function register()
    {
        
        $option = get_option('book_plugin');
        $activated = isset( $option['taxonomy_manager'] ) ? $option['taxonomy_manager'] : false;

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
                'page_title' => 'Custom Texonomy',
                'menu_title' => 'Texonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'book_Texonomies',
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            ),
        );
    }
}