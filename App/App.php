<?php
class App {
    /**
     * Run
     */
    public function run() {
        $this->route();
    }

    /**
     * Register Route
     */
    public function route() {
        Route::get('/', 'HomeController', 'index');
    }
}
