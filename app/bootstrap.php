<?php
    /*
     *------------------------------
     * Loading Config file ->
     * Containing constats 
     * (APP_ROOT,URL_ROOT,SITE_NAME)
     * -------------------------
     */
     require_once 'config/config.php';

     /*
     *------------------------------
     * Autoloading libraries ->
     * Just call the class from your file without a new object
     * -------------------------
     */
     spl_autoload_register(function($className)
     {
         require_once 'libraries/'.$className.'.php';
     });

     /*
      *------------------------------
      *Requiring helper files
      *Containing helper functions
      *----------------------------
      */

      require_once 'helpers/url_helper.php';
      require_once 'helpers/session_helper.php';
