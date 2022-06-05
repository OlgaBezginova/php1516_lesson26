<?php

namespace BezghinovaDev\Framework\Controllers;

use BezghinovaDev\Framework\Views\View;

abstract class Controller
{
    public $route = [];
    public $view;
    public $layout;
    public $data;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route[1];
    }

    public function getView()
    {
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->render($this->data);
    }

}