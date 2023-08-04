<?php

namespace App\Controllers\Admin;

class Admin extends \App\Controllers\BaseController
{
    public function index()
    {
        return view('admin/template');
    }
    public function password()
    {
        return password_hash('admin', PASSWORD_DEFAULT);
    }
}
