<?php
/**
 * @package Book-Plugin
 */

 namespace Inc\Base;

 class Activate
 {
     public static function activate()
     {
         //Flush rewrite rules
         flush_rewrite_rules();
     }
 }