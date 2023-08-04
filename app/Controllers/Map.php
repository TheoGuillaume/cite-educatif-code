<?php
namespace App\Controllers;
class Map extends BaseController
{
    public function map()
    {
        echo view('static/header');
        echo view('map/map');
        echo view('static/footer');
    }
}