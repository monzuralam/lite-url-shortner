<?php
class Route {
    /**
     * Handle function
     *
     * @param string $method
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function handle($method = "GET", $path = "/", $controller = "", $action = null) {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        if ($currentMethod != $method) {
            return false;
        }

        $pattern = "#^" . $path . "$#siD";
        if (preg_match($pattern, $currentUri)) {
            if (is_callable($controller)) {
                $controller();
            } else {
                $file = "App/controllers/$controller.php";
                if (file_exists($file)) {
                    require_once $file;
                    $controller = new $controller;
                    if ($action != null) {
                        $controller->$action();
                    }
                }
            }
            exit();
        }
        return false;
    }

    /**
     * Get 
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function get($path = "/", $controller = "", $action = null) {
        return self::handle("GET", $path, $controller, $action);
    }

    /**
     * Post
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function post($path = "/", $controller = "", $action = null) {
        return self::handle("POST", $path, $controller, $action);
    }

    /**
     * Put
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function put($path = "/", $controller = "", $action = null) {
        return self::handle("PUT", $path, $controller, $action);
    }

    /**
     * FETCH
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function fetch($path = "/", $controller = "", $action = null) {
        return self::handle("FETCH", $path, $controller, $action);
    }

    /**
     * Delete
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public static function delete($path = "/", $controller = "", $action = null) {
        return self::handle("DELETE", $path, $controller, $action);
    }
}
