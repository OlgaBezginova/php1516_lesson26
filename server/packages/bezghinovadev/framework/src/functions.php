<?php

function dump($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function dd($array)
{
    dump($array);
    die();
}