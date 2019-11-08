<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)                    
    {
        // return filter_var($input, FILTER_SENITIZE_NUMBER_INT);
        return ( isset($input) ? true : false );
    }

    public function adminSectionManager(){
        echo 'Manage the Section and Features of the Plugin by activating the checkboxes from the following list.';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];

        $checkbox = get_option($name);
        echo '<input type="checkbox" name="'.$name.'" value="1" class="'.$classes.'"'.($checkbox ? 'checked' : '').'>';
    }
}