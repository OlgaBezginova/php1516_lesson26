<?php

namespace BezghinovaDev\Framework\Views;

class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;

        if($layout === false){
            $this->layout = null;
        } else {
            $this->layout = $layout;
        }

        $this->view = $view;
    }

    public function render($data)
    {
//        if($data){
//
//        }

        $fileView = SERVER . '/App/View/'. $this->layout . '/' . $this->view . '.php';

        if(is_file($fileView)){
            dump(111);
        }else{
            dump(222);
        }
    }
}