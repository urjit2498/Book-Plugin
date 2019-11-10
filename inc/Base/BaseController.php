<?php
/**
 * @package Book-Plugin
 */
namespace Inc\Base;

class BaseController
{
    /**
     * defined Paths and URL's
     *
     * @var public
     */
    public $plugin_path;

    public $plugin_url;

    public $plugin;

    public $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/Book-Plugin.php';

        $this->managers = array(
            'cpt_manager'=>'Activate CPT Manager',
            'taxonomy_manager'=>'Activate Taxonomy Manager',
            'media_widget'=>'Activate Media Widget',
            'gallery_manager'=>'Activate Gallery Manager',
            'testimonial_manager'=>'Activate Testimonial Manager',
            'templates_manager'=>'Activate Tamplates Manager',
            'login_manager'=>'Activate Ajax Login/Signup',
            'membership_manager'=>'Activate Membership Manager',
            'chat_manager'=>'Activate Chat Manager'
        );
    }
}