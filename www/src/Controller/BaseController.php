<?php

declare(strict_types=1);

namespace App\Controller;

class BaseController {

    protected $model;
    protected $view;

    function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    function render() {
    }
}
