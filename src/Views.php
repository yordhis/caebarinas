<?php
  
    namespace App;
    
    class Views {
       
        public static function render($fileView, array $variables = [])
        {
             extract($variables);
             require_once DIRECCION_APP . "views/$fileView.view.php";
        }
    }