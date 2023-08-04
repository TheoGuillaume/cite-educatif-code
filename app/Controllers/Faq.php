<?php
namespace App\Controllers;
class Faq extends BaseController
{
    public function faq()
    {
        echo view('static/faq/header');
        echo view('faq/faq');
        echo view('static/faq/footer');
    }
}