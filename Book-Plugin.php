<?php
/**
 * @package Book-Plugin
 */

/*
Plugin Name: Book Plugin
Plugin URI: http://BookPlugin.com
Description: This is my first attemp for plugin development for RTcamp placement process
Version: 1.10.3
Requires at least: 5.2
Requires PHP: 7.2
Author: Urjit Shah
Author URI: http://urjitshah.com
License: GPLv2 or Later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Book-Plugin
 */

/*
This program is free software; you can reditribute it and/or
modified it under the terms of the GNU General Public License
as published by the free software Foundation; either version 2
of the license, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PERTICULAR PROCESS. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the free software
foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA

Copyright (C) 1989, 1991 Free Software Foundation, Inc.
 */

/**
 * If this file is called firectly, abort!!!
 */
defined('ABSPATH') or die('You can not access this file!');

/**
 * Require once the composer autoload
 */
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Define CONSTANTS
 */

/**
 * Use namespaces
 */
use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * The code that runs during plugin activation
 *
 * @return void
 */
function activate_book_plugin()
{
    Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 *
 * @return void
 */
function deactivate_book_plugin()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_book_plugin');
register_deactivation_hook(__FILE__, 'deactivate_book_plugin');

/**
 * Initialize all the core classes og the plugin
 */
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}