<?php
/**
 * @package Book-Plugin
 */

namespace Inc\Base;

 /**
  * Undocumented Deactivate class
  */
class Deactivate
{
    public static function deactivate()
    {
        //Flush rewrite rules
        flush_rewrite_rules( );
    }
}