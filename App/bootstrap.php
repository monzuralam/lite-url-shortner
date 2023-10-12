<?php

/**
 * Load class
 */

spl_autoload_register(function ($classname) {
    $folders = [
        'App',
        'App/models'
    ];

    foreach ($folders as $folder) {
        $fileName = "$folder/$classname.php";
        if (file_exists($fileName)) {
            require_once $fileName;
        }
    }
});
