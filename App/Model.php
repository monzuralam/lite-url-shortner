<?php
class Model {
    private $pdo;
    protected $table = '';

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
}
