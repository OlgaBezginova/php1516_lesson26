<?php

namespace App\Controllers;

use App\Models\MainModel;

class MainController extends BaseController
{
    public function index()
    {
//        $mainModel = MainModel::getAll();

//        echo $mainModel;

        echo  __CLASS__ . ' ' . __METHOD__;
//        return getView('home-page', []);
    }
}