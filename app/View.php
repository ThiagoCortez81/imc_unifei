<?php

namespace App;

class View
{

    public static function make($viewName, array $customVars = array())
    {
        extract($customVars);

        if ($customVars['visualizar']) {
            require_once viewsPath() . 'templateGallery.php';
        } else {
            require_once viewsPath() . 'template.php';
        }
    }

}