<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 *
 */
class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

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
        $args = array(
            array(
                'option_group' => 'book_options_group',
                'option_name' => 'book_example',
                'callback' => array($this->callbacks, 'bookOptionsGroup')
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'book_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'bookAdminSection'),
                'page' => 'book_plugin'
            )
        );

        $this->settings->setSections( $args );
     // $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'book_example',
                'title' => 'Book Example',
                'callback' => array($this->callbacks, 'bookExample'),
                'page' => 'book_plugin',
                'section' => 'book_admin_index',
                'args' => array(
                    'label_for' => 'book_example',
                    'class' => 'example-class'
                )
            ),
        );

        $this->settings->setFields($args);
    }
}
