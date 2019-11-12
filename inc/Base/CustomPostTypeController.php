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
class CustomPostTypeController extends BaseController
{
    public $subpages = array();
    public $callbacks;
    public function register()
    {
        if(! $this->activated('cpt_manager')) return;
        
        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();
        
        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
        
        add_action('init', array($this, 'activate'));
        
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'book_plugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'book_cpt',
                'callback' => array($this->callbacks,'adminCpt')
            )
        );
    }

    public function activate()
    {
        register_post_type('book_product',
            array(
                'labels' => array(
                    'name'=>'Products',
                    'singular_name'=>'Products' 
                ),
                'public'=>true,
                'has_archive'=>true,
            )
        );
    }
}