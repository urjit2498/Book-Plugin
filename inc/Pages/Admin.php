<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 *
 */
class Admin extends BaseController
{
    public $settings;

    public $callbacks;
    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        $this->setSubpages();

        $this->setSettings();
		$this->setSections();
		$this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Book Plugin',
                'menu_title' => 'Book',
                'capability' => 'manage_options',
                'menu_slug' => 'book_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ),
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'book_plugin',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'book_cpt',
                'callback' => function () {echo '<h1>Custom Post Type Manager</h1>';},
            ),
            array(
                'parent_slug' => 'book_plugin',
                'page_title' => 'Custom Texonomy',
                'menu_title' => 'Texonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'book_Texonomies',
                'callback' => function () {echo '<h1>Texonomy Manager</h1>';},
            ),
            array(
                'parent_slug' => 'book_plugin',
                'page_title' => 'Custom Widget',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'book_widget',
                'callback' => function () {echo '<h1>Widget Manager</h1>';},
            ),
        );
    }

    public function setSettings()
    {
        $args = array();

        foreach($this->managers as $key => $value){
            $args[] = array(
                'option_group' => 'book_plugin_settings',
                'option_name' => $key,
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            );
        }
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'book_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'book_plugin'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array();

        foreach($this->managers as $key => $value){
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'book_plugin',
                'section' => 'book_admin_index',
                'args' => array(
                    'label_for' => $key,
                    'class' => 'ui-toggle'
                )
            );
        }
        
        $this->settings->setFields($args);
    }
}