<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Api\Callbacks;

class CptCallbacks
{
    public function cptSectionManager(){
        echo 'Manage Custom Post Types.';
    }

    public function cptSanitize($input)
    {
        $output = get_option('book_plugin_cpt');

        if(count($output)==0){
            $output[$input['post_type']] = $input;

            return $output;
        }
                
        foreach ($output as $key => $value) {
            if($input['post_type']===$key){
                $output[$key] = $input;
            }else{
                $output[$input['post_type']] = $input;
            }
        }

        return $output;
    }

    public function textField( $args )
    {
        $name = $args['label_for'];
		$option_name = $args['option_name'];
		$input = get_option( $option_name );
		//$value = $input[$name];
        
        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="" placeholder="' . $args['placeholder'] . '" required>';
    }
    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);

        
        echo '<input type="checkbox" id="'.$name.'" name="' .$option_name.'['. $name . ']" value="1" class="">';
    }
}