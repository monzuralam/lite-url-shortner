<?php
class Controller {
    /**
     * Load view file
     *
     * @param string $fileName
     * @param array $data
     */
    public function view($fileName = "", $data = []) {
        $file = "App/views/$fileName.view.php";
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
