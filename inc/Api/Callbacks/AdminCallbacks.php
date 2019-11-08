<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCpt()
    {
        return require_once("$this->plugin_path/templates/cpt.php");
    }
    public function adminTaxonomy()
    {
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }
    public function adminWidget()
    {
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function bookOptionsGroup($input)                    
    {
        return $input;
    }

    public function bookAdminSection()
    {
        echo 'Check this beautiful section!';
    }

    public function bookExample()
    {
        $value = esc_attr(get_option('book_example'));
        echo '<input type="text" class="regular-text" name="book_example" value="' . $value . '" placeholder="Write Something Here!">';
    }
}